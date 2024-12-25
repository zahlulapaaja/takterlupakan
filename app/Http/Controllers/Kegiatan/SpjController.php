<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Kegiatan;
use App\Models\Kegiatan\Sk;
use App\Models\Kegiatan\Spj;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Pok;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Riskihajar\Terbilang\Facades\Terbilang;

class SpjController extends Controller
{
    public function index()
    {
        $data_honor = Spj::where('kode_akun', config('constants.AKUN_HONOR'))
            ->orderBy('tgl', 'DESC')->get();
        foreach ($data_honor as $d) {
            $keg = Kegiatan::find($d->kegiatans_id);
            $keg->nama = Str::limit($keg->nama, 25);
            $d->keg = $keg;
            $d->tgl = date_indo($d->tgl);
        }

        $data_translok = Spj::where('kode_akun', config('constants.AKUN_TRANSLOK'))
            ->orderBy('tgl', 'DESC')->get();
        foreach ($data_translok as $d) {
            $keg = Kegiatan::find($d->kegiatans_id);
            $keg->nama = Str::limit($keg->nama, 25);
            $d->keg = $keg;
            $d->tgl = date_indo($d->tgl);
        }

        return view('kegiatan.spj.index', compact('data_honor', 'data_translok'));
    }

    public function create(Request $request)
    {
        if (!($request->has('kegiatans_id'))) {
            return redirect()->route('kegiatan.index');
        }

        // mengambil data
        $keg = Kegiatan::find($request->kegiatans_id);
        $keg->pok = Pok::find($keg->poks_id);
        $keg->tgl_mulai = date_indo($keg->tgl_mulai);
        $keg->tgl_akhir = date_indo($keg->tgl_akhir);

        $keg->mak = $keg->pok->getMak($keg->pok);
        $keg->pjk = Pegawai::find($keg->pjk);
        $sk = Sk::where('tahun', $keg->tahun)->get();

        return view('kegiatan.spj.create', compact('keg', 'sk'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kegiatans_id'   => 'required',
            'tgl'            => 'required',
            'akun'           => 'required',
            'tahun'          => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $spj['kegiatans_id'] = $request->kegiatans_id;
        $spj['tgl'] = $request->tgl;
        $spj['no_st'] = $request->no_st;
        $spj['tgl_st'] = $request->tgl_st;
        $spj['kode_akun'] = $request->akun;
        $spj['tahun'] = $request->tahun;
        $spj['edited_by'] = session('user_id');

        // insert data
        $res =  Spj::create($spj);
        if ($request->akun == config('constants.AKUN_HONOR')) {
            $res->insertSpjHonor($res->id, $request->all());
        } else if ($request->akun == config('constants.AKUN_TRANSLOK')) {
            $res->insertSpjTranslok($res->id, $request->all());
        }

        return redirect()->route('kegiatan.spj.index');
    }

    public function edit($id)
    {
        // mengambil data
        $data = Spj::find($id);

        // mengambil data detail kegiatan
        $keg = Kegiatan::find($data->kegiatans_id);
        $keg->pok = Pok::find($keg->poks_id);
        $keg->tgl_mulai = date_indo($keg->tgl_mulai);
        $keg->tgl_akhir = date_indo($keg->tgl_akhir);

        $keg->mak = $keg->pok->getMak($keg->pok);
        $keg->pjk = Pegawai::find($keg->pjk);

        // mengambil data petugas
        $akun = $data->kode_akun;
        $list_petugas = $data->getPetugas($data, $akun);

        return view('kegiatan.spj.edit', compact('data', 'keg', 'akun', 'list_petugas'));
    }

    public function update($id, Request $request)
    {
        $data = Spj::find($id);
        $validator = Validator::make($request->all(), [
            'tgl'            => 'required',
            'akun'           => 'required',
            'tahun'          => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $spj['tgl'] = $request->tgl;
        $spj['no_st'] = $request->no_st;
        $spj['tgl_st'] = $request->tgl_st;
        $spj['edited_by'] = session('user_id');

        // update data
        $data->update($spj);
        $data->updateSpj($request->all());

        return redirect()->route('kegiatan.spj.index');
    }

    public function destroy($id)
    {
        $data = Spj::find($id);
        $data->deleteSpj($data);
        $data->delete();
        return redirect()->route('kegiatan.spj.index')->with('success', 'SPJ berhasil dihapus');
    }

    public function print($id)
    {
        // mengambil data spj 
        $data = Spj::find($id);
        $data->petugas = $data->getPetugas($data, $data->kode_akun);

        // mengambil data referensi
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $ref->kpa = Pegawai::find($ref->kpa);
        $ref->ppk = Pegawai::find($ref->ppk);
        $ref->bend = Pegawai::find($ref->bend);
        $ref->tgl_dipa = date_indo($ref->tgl_dipa);
        $ref->tgl_sk_kpa = date_indo($ref->tgl_sk_kpa);

        // mengambil data kegiatan
        $keg = Kegiatan::find($data->kegiatans_id);
        $keg->pok = Pok::find($keg->poks_id);
        $keg->mak = $keg->pok->getMak($keg->pok);
        $keg->pjk = Pegawai::find($keg->pjk);

        // format tanggal data spj
        $tgl = new Carbon;
        $data->terbilang_tgl =
            $tgl->isoFormat('dddd', $data->tgl)
            . ' Tanggal ' . Terbilang::make(explode('-', $data->tgl)[2])
            . ' Bulan ' . Terbilang::make(explode('-', $data->tgl)[1])
            . ' Tahun ' . Terbilang::make(explode('-', $data->tgl)[0]);

        // mengambil view berbeda tergantung akun
        if ($data->kode_akun == config('constants.AKUN_HONOR')) {
            return view('kegiatan.spj.print-honor', compact('data', 'keg', 'ref'));
        } else if ($data->kode_akun == config('constants.AKUN_TRANSLOK')) {
            return view('kegiatan.spj.print-translok', compact('data', 'keg', 'ref'));
        }
    }
}
