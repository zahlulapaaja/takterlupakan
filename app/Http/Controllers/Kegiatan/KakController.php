<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Kak;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Master\Tim;
use App\Models\Pok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KakController extends Controller
{

    public function index()
    {
        $data = Kak::select('*')
            ->orderBy('tahun', 'DESC')
            ->orderBy('tgl', 'DESC')
            ->get();

        return view('kegiatan.kak.index', compact('data'));
    }

    public function create(Request $request)
    {
        // mengambil pok dan detil kegiatannya
        $pok = Pok::find($request->id_pok);
        $pok->list_detil = Pok::where('kode_program', $pok->kode_program)
            ->where('kode_kegiatan', $pok->kode_kegiatan)
            ->where('kode_output', $pok->kode_output)
            ->where('kode_suboutput', $pok->kode_suboutput)
            ->where('kode_komponen', $pok->kode_komponen)
            ->where('kode_subkomponen', $pok->kode_subkomponen)
            ->orderBy('kode_akun', 'ASC')
            ->get();

        // mengambil data pegawai
        $tim = Tim::where('tahun', $pok->tahun)->get();
        $pegawai = Pegawai::all();
        $ref = Referensi::where('tahun', $pok->tahun)->first();
        $ref->ppk = Pegawai::find($ref->ppk);
        $ref->ppk2 = Pegawai::find($ref->ppk2);

        if ($request->has('id_pok')) {
            return view('kegiatan.kak.create', compact('pok', 'tim', 'pegawai', 'ref'));
        } else {
            return redirect()->route('pok.index');
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis'             => 'required',
            'judul'             => 'required',
            'latar_belakang'    => 'required',
            'tujuan'            => 'required',
            'target'            => 'required',
            'tgl_awal'          => 'required',
            'tempat'            => 'required',
            'tgl'               => 'required',
            'tim'               => 'required',
            'ppk'               => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['jenis'] = $request->jenis;
        $data['judul'] = $request->judul;
        $data['latar_belakang'] = $request->latar_belakang;
        $data['tujuan'] = $request->tujuan;
        $data['target'] = $request->target;
        $data['metode'] = $request->metode;
        $data['tgl_awal'] = $request->tgl_awal;
        $data['tgl_akhir'] = $request->tgl_akhir;
        $data['tempat'] = $request->tempat;
        $data['tgl'] = $request->tgl;
        $data['tim'] = $request->tim;
        $data['ppk'] = $request->ppk;
        $data['tahun'] = $request->tahun;
        $data['edited_by'] = session('user_id');

        // data pelatihan
        $pelatihan['peserta_pelatihan'] = $request->peserta_pelatihan;
        $pelatihan['konsumsi_pelatihan'] = $request->konsumsi_pelatihan;
        $pelatihan['akomodasi_pelatihan'] = $request->akomodasi_pelatihan;
        $pelatihan['translok_pelatihan'] = $request->translok_pelatihan;

        // insert data
        $res = Kak::create($data);
        $res->insertPoks($res->id, $request->detil);
        if ($request->jenis == 'pelatihan') $res->insertPelatihan($res->id, $pelatihan);
        if ($request->jenis == 'perjadin') $res->insertPeserta($res->id, $request->daftar_peserta_perjadin);
        if ($request->jenis == 'pengadaan') $res->insertSpesifikasi($res->id, $request->daftar_spesifikasi);
        dd($request->all());

        return redirect()->route('kegiatan.kak.index');
    }

    public function print($id)
    {
        // mengambil data kak 
        $data = Kak::find($id);
        $data->detil = $data->getDetilPok($data->id);
        $data->peserta = $data->getPesertaPerjadin($data->id);
        $data->spesifikasi = DB::table('kaks_spesifikasi')->where('kaks_id', $data->id)->get();
        $data->pelatihan = DB::table('kaks_pelatihan')->where('kaks_id', $data->id)->first();

        // mengambil data penanggung jawab 
        if ($data->tim == 0) {
            $data->pj = 'Kepala ' . config('constants.SATKER');
        } else {
            $data->pj = 'Tim ' . Tim::find($data->tim)->nama;
        }

        // mengambil data referensi 
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $ref->kpa = Pegawai::find($ref->kpa);
        $ref->ppk = Pegawai::find($data->ppk);

        return view('kegiatan.kak.print', compact('data', 'ref'));
    }
}
