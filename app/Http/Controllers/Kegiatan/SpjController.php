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
        $data = Spj::orderBy('tgl', 'DESC')->get();
        foreach ($data as $d) {
            $d->keg = Kegiatan::find($d->kegiatans_id);
            //     $tgl = explode('-', $d->tgl_spj);
            //     $d->no_spj = $d->no . '/SPJ/BPS-1107/' . $tgl[0];
            //     $d->rincian = Str::limit($d->nama_kegiatan, 25);
        }
        // dd($data);
        return view('kegiatan.spj.index', compact('data'));
    }

    public function create(Request $request)
    {
        if (!($request->has('kegiatans_id'))) {
            return redirect()->route('kegiatan.index');
        }

        // mengambil data
        $data = Kegiatan::find($request->kegiatans_id);
        $data->pok = Pok::find($data->poks_id);
        $data->tgl_mulai = date_indo($data->tgl_mulai);
        $data->tgl_akhir = date_indo($data->tgl_akhir);

        $data->mak = $data->pok->kode_kegiatan . '.' .
            $data->pok->kode_output . '.' .
            $data->pok->kode_suboutput . '.' .
            $data->pok->kode_komponen . '.' .
            $data->pok->kode_subkomponen . '.' .
            $data->pok->kode_akun;

        $data->pjk = Pegawai::find($data->pjk);
        $sk = Sk::where('tahun', $data->tahun)->get();

        return view('kegiatan.spj.create', compact('data', 'sk'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kegiatans_id'   => 'required',
            'tgl'            => 'required',
            'no_st'          => 'required',
            'tgl_st'         => 'required',
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
        return $id;
    }

    public function update($id)
    {
        return $id;
    }

    public function print($id)
    {
        $data = Spj::find($id);
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $data->alokasi_beban = DB::table('spjs_alokasi_beban')->where('spjs_id', $id)->get();
        // $data->petugas = $data->getPetugas($id);

        // generate nomor surat
        $data->no_spj = $data->no . '/SPJ/BPS-1107/' . explode('-', $data->tgl_spj)[0];
        $data->pok = Pok::find($data->poks_id);
        $data->mak = '054.01.' . // bikin constants
            $data->pok->kode_program . '.' .
            $data->pok->kode_kegiatan . '.' .
            $data->pok->kode_output . '.' .
            $data->pok->kode_suboutput . '.' .
            $data->pok->kode_komponen . '.' .
            $data->pok->kode_subkomponen . '.' .
            $data->pok->kode_akun;

        // format tanggal data sk
        $tgl = new Carbon;
        // Config::set('terbilang.locale', 'id');
        $data->terbilang_tgl =
            $tgl->isoFormat('dddd', $data->tgl_spj)
            . ' Tanggal ' . Terbilang::make(explode('-', $data->tgl_spj)[2])
            . ' Bulan ' . Terbilang::make(explode('-', $data->tgl_spj)[1])
            . ' Tahun ' . Terbilang::make(explode('-', $data->tgl_spj)[0]);
        $data->tgl_spj = date_indo($data->tgl_spj);

        // $data->tgl_mulai = date_indo($data->tgl_mulai);
        // mengambil data pjk
        $data->pjk = Pegawai::find($data->pjk);
        // dd($data->pjk);

        // format tanggal data referensi
        $ref->tgl_dipa = date_indo($ref->tgl_dipa);
        $ref->tgl_sk_kpa = date_indo($ref->tgl_sk_kpa);

        // $views =
        //     view('kegiatan.spj._print.daftar-honor', compact('data', 'ref'))->render() .
        //     view('kegiatan.spj._print.bast', compact('data', 'ref'))->render() .
        //     view('kegiatan.spj._print.pernyataan', compact('data', 'ref'))->render();
        return view('kegiatan.spj.print', compact('data', 'ref'));
        // return $views;
    }
}
