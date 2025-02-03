<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Kegiatan;
use App\Models\Kegiatan\Sk;
use App\Models\Kegiatan\Spj;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Pok;
use App\Models\Surat\NoSuratTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpjController extends Controller
{
    public function index()
    {
        $data_honor = Spj::select('spjs.id', 'spjs.kode_akun', 'kegiatans.nama as nama_keg', 'spjs.tgl', 'tims.singkatan as nama_tim', 'spjs.tahun')
            ->join('kegiatans', 'spjs.kegiatans_id', '=', 'kegiatans.id')
            ->join('tims', 'kegiatans.tim', '=', 'tims.id')
            ->where('spjs.kode_akun', config('constants.AKUN_HONOR'))
            ->orderBy('spjs.tgl', 'DESC')->get();
        $data_translok = Spj::select('spjs.id', 'spjs.kode_akun', 'kegiatans.nama as nama_keg', 'spjs.tgl', 'tims.singkatan as nama_tim', 'spjs.tahun')
            ->join('kegiatans', 'spjs.kegiatans_id', '=', 'kegiatans.id')
            ->join('tims', 'kegiatans.tim', '=', 'tims.id')
            ->where('kode_akun', config('constants.AKUN_TRANSLOK'))
            ->orderBy('tgl', 'DESC')->get();
        $list_tahun = Spj::distinct()->get('tahun');

        return view('kegiatan.spj.index', compact('data_honor', 'data_translok', 'list_tahun'));
    }

    public function create(Request $request)
    {
        if (!($request->has('kegiatans_id'))) {
            return redirect()->route('kegiatan.index');
        }

        // mengambil data kegiatan
        $keg = Kegiatan::find($request->kegiatans_id);
        $keg->pok = Pok::find($keg->poks_id);

        // mengambil data mak dan pjk
        $keg->mak = $keg->pok->getMak($keg->pok);
        $keg->pjk = Pegawai::find($keg->pjk);

        // mengambil data list petugas
        $sk = new Sk();
        $list_petugas = $sk->getListPetugas($keg->tahun);
        $sk = $sk->where('tahun', $keg->tahun)->get();

        // mengambil data nomor st
        $nomor_st = NoSuratTim::where('tahun', $keg->tahun)
            ->where('tim', $keg->tim)->get();
        foreach ($nomor_st as $n) {
            $n->no_surat = $n->getFormat($n, $n->tim);
        }

        return view('kegiatan.spj.create', compact('keg', 'sk', 'list_petugas', 'nomor_st'));
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

        // jika spj honor 
        if ($request->checkbox == null) {
            // dd($request->all());
            $validator = Validator::make($request->all(), ['checkbox'   => 'required']);
            if ($validator->fails()) return redirect('sk.create')->back()->withErrors(['checkbox' => 'Minimal satu petugas dipilih.'])->withInput();
        }

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
            $res->insertSpjTranslok($res->id, $request->daftar_petugas_translok);
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

        $keg->mak = $keg->pok->getMak($keg->pok);
        $keg->pjk = Pegawai::find($keg->pjk);

        // mengambil data petugas
        $akun = $data->kode_akun;
        $sk = new Sk();
        $list_petugas = $sk->getListPetugas($keg->tahun);
        $data->petugas = $data->getPetugas($data, $akun);

        // mengambil data nomor st
        $nomor_st = NoSuratTim::where('tahun', $keg->tahun)
            ->where('tim', $keg->tim)->get();
        foreach ($nomor_st as $n) {
            $n->no_surat = $n->getFormat($n, $n->tim);
        }

        return view('kegiatan.spj.edit', compact('data', 'keg', 'akun', 'list_petugas', 'nomor_st'));
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
        $spj['tahun'] = $request->tahun;
        $spj['edited_by'] = session('user_id');

        // update data
        $data->update($spj);
        $data->updateSpj($data->id, $request->all());

        return redirect()->route('kegiatan.spj.index');
    }

    public function destroy($id)
    {
        $data = Spj::find($id);
        $data->deleteSpj($data);
        $data->delete();

        return response()->json(array('success' => true));
    }

    public function print($id, $jenis)
    {
        // mengambil data spj 
        $data = Spj::find($id);
        $data->petugas = $data->getPetugas($data, $data->kode_akun);

        // mengambil data referensi
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $ref->kpa = Pegawai::find($ref->kpa);
        $ref->ppk = Pegawai::find($ref->ppk);
        $ref->bend = Pegawai::find($ref->bend);

        // mengambil data kegiatan
        $keg = Kegiatan::find($data->kegiatans_id);
        $keg->pok = Pok::find($keg->poks_id);
        $keg->mak = $keg->pok->getMak($keg->pok);
        $keg->pjk = Pegawai::find($keg->pjk);

        // format tanggal data spj
        $ref->terbilang_tgl = $ref->terbilang_tgl($data->tgl);

        // mengambil view berbeda tergantung akun
        if ($data->kode_akun == config('constants.AKUN_HONOR')) {
            return view('kegiatan.spj.print-honor', compact('data', 'keg', 'ref'));
        } else if ($data->kode_akun == config('constants.AKUN_TRANSLOK')) {
            return view('kegiatan.spj.print-translok', compact('data', 'keg', 'ref', 'jenis'));
        }
    }
}
