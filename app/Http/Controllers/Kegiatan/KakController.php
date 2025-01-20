<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Kak;
use App\Models\Kegiatan\Kegiatan;
use App\Models\Kegiatan\Sk;
use App\Models\Kegiatan\Spj;
use App\Models\Master\Mitra;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Master\Tim;
use App\Models\Pok;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Riskihajar\Terbilang\Facades\Terbilang;

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

        if ($request->has('id_pok')) {
            return view('kegiatan.kak.create', compact('pok', 'tim', 'pegawai'));
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
        $data['tahun'] = $request->tahun;
        $data['edited_by'] = session('user_id');

        // insert data
        $res = Kak::create($data);
        $res->insertPoks($res->id, $request->detil);
        if ($request->jenis == 'pengadaan') $res->insertSpesifikasi($res->id, $request->daftar_spesifikasi);
        if ($request->jenis == 'perjadin') $res->insertPeserta($res->id, $request->daftar_peserta_perjadin);
        dd($request->all());

        return redirect()->route('kegiatan.kak.index');
    }

    public function print($id)
    {
        // mengambil data kak 
        $data = Kak::find($id);
        $data->detil = $data->getDetilPok($data->id);
        $data->peserta = $data->getPesertaPerjadin($data->id);

        // mengambil data penanggung jawab 
        if ($data->tim == 0) {
            $data->pj = 'Kepala ' . config('constants.SATKER');
        } else {
            $data->pj = 'Tim ' . Tim::find($data->tim)->nama;
        }

        // mengambil data referensi 
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $ref->kpa = Pegawai::find($ref->kpa);
        $ref->ppk = Pegawai::find($ref->ppk);

        return view('kegiatan.kak.print', compact('data', 'ref'));
    }

    public function print2($id)
    {
        $data = Spj::find($id);
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $ref->kpa = Pegawai::find($ref->kpa);
        $ref->ppk = Pegawai::find($ref->ppk);
        // $data->alokasi_beban = DB::table('spjs_alokasi_beban')->where('spjs_id', $id)->get();
        // $data->petugas = $data->getPetugas($id);

        // generate nomor surat
        $data->no_spj = $data->no . '/SPJ/BPS-1107/' . explode('-', $data->tgl_spj)[0];
        $data->keg = Kegiatan::find($data->kegiatans_id);
        // $data->keg->pok = Pok::find($data->keg->poks_id);
        $data->pok = Pok::find($data->keg->poks_id);
        $data->mak = '054.01.'; // bikin constants
        // $data->pok->kode_program . '.' .
        // $data->pok->kode_kegiatan . '.' .
        // $data->pok->kode_output . '.' .
        // $data->pok->kode_suboutput . '.' .
        // $data->pok->kode_komponen . '.' .
        // $data->pok->kode_subkomponen . '.' .
        // $data->pok->kode_akun;

        // format tanggal data sk
        $ref->terbilang_tgl = $ref->terbilang_tgl($data->tgl);
        $data->tgl_spj = $data->tgl_spj;

        // $data->tgl_mulai = $data->tgl_mulai;
        // mengambil data pjk
        $data->pjk = Pegawai::find($data->pjk);
        // dd($data->pjk);

        // format tanggal data referensi
        $ref->tgl_dipa = $ref->tgl_dipa;
        $ref->tgl_sk_kpa = $ref->tgl_sk_kpa;

        // $views =
        //     view('kegiatan.spj._print.daftar-honor', compact('data', 'ref'))->render() .
        //     view('kegiatan.spj._print.bast', compact('data', 'ref'))->render() .
        //     view('kegiatan.spj._print.pernyataan', compact('data', 'ref'))->render();
        return view('kegiatan.kak.print2', compact('data', 'ref'));
        // return $views;
    }
}
