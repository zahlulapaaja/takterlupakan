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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KakController extends Controller
{

    public function index()
    {
        $data = Kak::select('kaks.id', 'kaks.jenis', 'kaks.judul', 'kaks.tgl', 'kaks.tahun', 'tims.singkatan as nama_tim')
            ->orderBy('kaks.tahun', 'DESC')
            ->join('tims', 'kaks.tim', '=', 'tims.id')
            ->orderBy('kaks.created_at', 'DESC')
            ->get();
        $list_tahun = Kak::distinct()->get('tahun');

        return view('kegiatan.kak.index', compact('data', 'list_tahun'));
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
            ->where('tahun', $pok->tahun)
            ->where('revisi', $pok->revisi)
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
            'detil'             => 'required',
            'vol'               => 'required',
            'harga'             => 'required',
            'jenis'             => 'required',
            'judul'             => 'required',
            'latar_belakang'    => 'required',
            'tujuan'            => 'required',
            'target'            => 'required',
            'tgl'               => 'required',
            'tim'               => 'required',
            'ppk'               => 'required',
            'file_lampiran'     => 'mimes:pdf',
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

        // setor file lampiran 
        if ($request->file_lampiran) {
            $file     = $request->file('file_lampiran');
            $filename   = date('YmdHis') . '_' . $file->getClientOriginalName();
            $path       = 'lampiran-kak/' . $filename;

            // setor 
            Storage::disk('public')->put($path, file_get_contents($file));
            $data['file_lampiran'] = $filename;
        }

        // insert data
        $res = Kak::create($data);
        $res->insertPoks($res->id, $request->detil, $request->id_pok, $request->vol, $request->satuan, $request->harga);
        if ($request->jenis == 'pelatihan') $res->insertPelatihan($res->id, $request->all());
        if ($request->jenis == 'perjadin') $res->insertPeserta($res->id, $request->daftar_peserta_perjadin);
        if ($request->jenis == 'pengadaan') $res->insertSpesifikasi($res->id, $request->daftar_spesifikasi);

        return redirect()->route('kegiatan.kak.index');
    }

    public function edit($id)
    {
        // mengambil data 
        $data = Kak::find($id);
        $data->poks = DB::table('kaks_poks')->where('kaks_id', $data->id)->get();
        $list_pok = [];
        foreach ($data->poks as $p) {
            array_push($list_pok, $p->poks_id);
        }
        $data->list_pok = $list_pok;

        // mengambil data penanggung jawab 
        if ($data->tim == 0) {
            $data->pj = 'Kepala ' . config('constants.SATKER');
        } else {
            $data->pj = 'Tim ' . Tim::find($data->tim)->nama;
        }

        // mengambil pok dan detil kegiatannya
        $pok = Pok::find($data->list_pok[0]);
        $pok->list_detil = Pok::where('kode_program', $pok->kode_program)
            ->where('kode_kegiatan', $pok->kode_kegiatan)
            ->where('kode_output', $pok->kode_output)
            ->where('kode_suboutput', $pok->kode_suboutput)
            ->where('kode_komponen', $pok->kode_komponen)
            ->where('kode_subkomponen', $pok->kode_subkomponen)
            ->where('tahun', $pok->tahun)
            ->where('revisi', $pok->revisi)
            ->orderBy('kode_akun', 'ASC')
            ->get();

        // mengambil data peserta perjadin
        $data->peserta_perjadin = DB::table('kaks_perjadin')->where('kaks_id', $id)->get();
        foreach ($data->peserta_perjadin as $pp) {
            $pp->pegawai = Pegawai::find($pp->pegawais_id);
        }

        // mengambil data pelatihan
        $data->pelatihan = DB::table('kaks_pelatihan')->where('kaks_id', $id)->first();

        // mengambil data spesifikasi
        $data->spesifikasi = DB::table('kaks_spesifikasi')->where('kaks_id', $id)->get();

        // mengambil data pegawai
        $tim = Tim::where('tahun', $data->tahun)->get();
        $pegawai = Pegawai::all();
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $ref->ppk = Pegawai::find($ref->ppk);
        $ref->ppk2 = Pegawai::find($ref->ppk2);

        return view('kegiatan.kak.edit', compact('data', 'pok', 'tim', 'pegawai', 'ref'));
    }

    public function update($id, Request $request)
    {
        $find = Kak::find($id);

        $validator = Validator::make($request->all(), [
            'detil'             => 'required',
            'vol'               => 'required',
            'harga'             => 'required',
            'judul'             => 'required',
            'latar_belakang'    => 'required',
            'tujuan'            => 'required',
            'target'            => 'required',
            'tgl'               => 'required',
            'tim'               => 'required',
            'ppk'               => 'required',
            'file_lampiran'     => 'mimes:pdf',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

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
        $data['edited_by'] = session('user_id');

        // setor file lampiran 
        if ($request->file_lampiran) {
            $file     = $request->file('file_lampiran');
            $filename   = date('YmdHis') . '_' . $file->getClientOriginalName();
            $path       = 'lampiran-kak/' . $filename;

            // hapus file yang udah ada 
            if ($find->file_lampiran != null) {
                Storage::disk('public')->delete('lampiran-kak/' . $find->file_lampiran);
            }

            // setor 
            Storage::disk('public')->put($path, file_get_contents($file));
            $data['file_lampiran'] = $filename;
        }

        // update data
        $find->update($data);
        $find->updatePoks($id, $request->detil, $request->id_pok, $request->vol, $request->satuan, $request->harga);
        if ($find->jenis == 'pelatihan') $find->updatePelatihan($id, $request->all());
        if ($find->jenis == 'perjadin') $find->updatePeserta($id, $request->daftar_peserta_perjadin);
        if ($find->jenis == 'pengadaan') $find->updateSpesifikasi($id, $request->daftar_spesifikasi);

        return redirect()->route('kegiatan.kak.index');
    }

    public function destroy($id)
    {
        $data = Kak::find($id);
        // hapus file yang udah ada 
        if ($data->file_lampiran) {
            Storage::disk('public')->delete('lampiran-kak/' . $data->file_lampiran);
        }
        $data->deleteKak($id);
        $data->delete();

        return response()->json(array('success' => true));
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
            $data->pj = Tim::find($data->tim)->nama;
        }

        // mengambil data referensi 
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $ref->kpa = Pegawai::find($ref->kpa);
        $ref->ppk = Pegawai::find($data->ppk);

        return view('kegiatan.kak.print', compact('data', 'ref'));
    }
}
