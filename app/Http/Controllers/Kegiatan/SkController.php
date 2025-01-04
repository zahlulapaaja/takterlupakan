<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Sk;
use App\Models\Master\Mitra;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Master\Tim;
use App\Models\Pok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SkController extends Controller
{
    public function index()
    {
        $data = Sk::select('*')
            ->orderBy('tahun', 'DESC')
            ->orderBy('tgl_ditetapkan', 'DESC')
            ->get();
        foreach ($data as $d) {
            $tgl = explode('-', $d->tgl_ditetapkan);
            $d->no_sk = $d->no . '/SK/BPS-1107/' . $tgl[0];
            $d->rincian = $d->tentang;
        }
        return view('kegiatan.sk.index', compact('data'));
    }

    public function create(Request $request)
    {

        // mengecek referensi tahun terakhir
        $pok = Pok::find($request->id_pok);
        $ref = Referensi::where('tahun', $pok->tahun)->first();
        $tim = Tim::where('tahun', $pok->tahun)->first();
        $mitra = Mitra::where('tahun', $pok->tahun)->first();
        if ($ref == null) return redirect()->back()->with('error', 'Belum ada master referensi tahun ' . $pok->tahun);
        if ($tim == null) return redirect()->back()->with('error', 'Belum ada master tim tahun ' . $pok->tahun);
        if ($mitra == null) return redirect()->back()->with('error', 'Belum ada master mitra tahun ' . $pok->tahun);

        // mengambil data
        $sk = new Sk();
        $last_no = $sk->where('tahun', $pok->tahun)->max('no');

        if ($request->has('kode_output')) {
            $mitra = Mitra::orderBy('nama', 'ASC')->where('tahun', $pok->tahun)->get();
            $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
            $list_petugas = $sk->getListPetugas($pok->tahun);
            return view('kegiatan.sk.create', compact('pok', 'list_petugas', 'last_no'));
        } else {
            return redirect()->route('pok.index');
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'no'             => 'required',
            'tentang'        => 'required',
            'tgl_mulai'      => 'required',
            'tgl_akhir'      => 'required',
            'tgl_berlaku'    => 'required',
            'tgl_ditetapkan' => 'required',
            'daftar_honor'   => 'required',
            'daftar_petugas' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no'] = $request->no;
        $data['mak'] = $request->kode_kegiatan . '.' . $request->kode_output . '.' . $request->kode_suboutput . '.' . $request->kode_komponen;
        $data['tentang'] = $request->tentang;
        $data['tgl_mulai'] = $request->tgl_mulai;
        $data['tgl_akhir'] = $request->tgl_akhir;
        $data['tgl_berlaku'] = $request->tgl_berlaku;
        $data['tgl_ditetapkan'] = $request->tgl_ditetapkan;
        $data['tahun'] = explode('-', $request->tgl_ditetapkan)[0];
        $data['edited_by'] = session('user_id');

        // insert data
        $res = Sk::create($data);
        $res->insertHonor($res->id, $request->daftar_honor);
        $res->insertPetugas($res->id, $request->daftar_petugas);

        return redirect()->route('kegiatan.sk.index');
    }

    public function edit($id, Request $request)
    {
        // mengambil data
        $data = Sk::find($id);
        $mak = explode('.', $data->mak);
        $pok = Pok::where('kode_kegiatan', $mak[0])
            ->where('kode_output', $mak[1])
            ->where('kode_suboutput', $mak[2])
            ->where('kode_komponen', $mak[3])
            ->where('tahun', $data->tahun)
            ->first();

        $last_no = Sk::where('tahun', $pok->tahun)->max('no');

        if ($pok->kode_output) {
            // mengambil data petugas dan honor
            $data->honor = DB::table('sks_honor')->where('sks_id', $id)->get();
            $data->petugas = $data->getPetugas($id);
            $list_petugas = $data->getListPetugas($pok->tahun);

            return view('kegiatan.sk.edit', compact('data', 'pok', 'list_petugas', 'last_no'));
        } else {
            return redirect()->route('kegiatan.sk.index');
        }
    }

    public function update($id, Request $request)
    {
        $find = Sk::find($id);
        $validator = Validator::make($request->all(), [
            'no'             => 'required',
            'tentang'        => 'required',
            'tgl_mulai'      => 'required',
            'tgl_akhir'      => 'required',
            'tgl_berlaku'    => 'required',
            'tgl_ditetapkan' => 'required',
            'daftar_honor'   => 'required',
            'daftar_petugas' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no'] = $request->no;
        $data['mak'] = $request->kode_kegiatan . '.' . $request->kode_output . '.' . $request->kode_suboutput . '.' . $request->kode_komponen;
        $data['tentang'] = $request->tentang;
        $data['tgl_mulai'] = $request->tgl_mulai;
        $data['tgl_akhir'] = $request->tgl_akhir;
        $data['tgl_berlaku'] = $request->tgl_berlaku;
        $data['tgl_ditetapkan'] = $request->tgl_ditetapkan;
        $data['tahun'] = explode('-', $request->tgl_ditetapkan)[0];
        $data['edited_by'] = session('user_id');

        // update data
        $find->update($data);
        $find->updateHonor($id, $request->daftar_honor);
        $find->updatePetugas($id, $request->daftar_petugas);
        return redirect()->route('kegiatan.sk.index');
    }

    public function destroy($id)
    {
        $data = Sk::find($id);
        $data->deleteSk($data->id);
        $data->delete();

        return response()->json(array('success' => true));
    }

    public function print($id)
    {
        $data = Sk::find($id);
        $data->no_sk = $data->no . '/SK/BPS-11070/' . explode('-', $data->tgl_ditetapkan)[0];
        $data->honor = DB::table('sks_honor')->where('sks_id', $id)->get();
        $data->petugas = $data->getPetugas($id);

        // mengambil referensi
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $ref->kpa = Pegawai::find($ref->kpa);

        // format tanggal data sk
        $data->tgl_ditetapkan = date_indo($data->tgl_ditetapkan);
        $data->tgl_berlaku = date_indo($data->tgl_berlaku);

        // format tanggal data referensi
        $ref->tgl_dipa = date_indo($ref->tgl_dipa);
        $ref->tgl_sk_kpa = date_indo($ref->tgl_sk_kpa);

        return view('kegiatan.sk.print', compact('data', 'ref'));
    }
}
