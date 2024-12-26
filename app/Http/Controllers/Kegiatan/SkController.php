<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Sk;
use App\Models\Master\Mitra;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Pok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SkController extends Controller
{
    public function index()
    {
        $data = Sk::all();
        foreach ($data as $d) {
            $tgl = explode('-', $d->tgl_ditetapkan);
            $d->no_sk = $d->no . '/SK/BPS-1107/' . $tgl[0];
            $d->rincian = Str::limit($d->tentang, 25);
        }
        return view('kegiatan.sk.index', compact('data'));
    }

    public function create(Request $request)
    {
        $pok = Pok::find($request->id_pok);
        $sk = new Sk();
        $last_no = $sk->where('tahun', $pok->tahun)->max('no');

        if ($request->has('kode_output')) {
            $mitra = Mitra::orderBy('nama', 'ASC')->where('tahun', $pok->tahun)->get();
            $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
            $list_petugas = $sk->getListPetugas($pok->tahun);
            return view('kegiatan.sk.create', compact('pok', 'list_petugas', 'last_no'));
        } else {
            return redirect()->route('pok');
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'no'             => 'required',
            'tentang'        => 'required',
            'tgl_mulai'      => 'required',
            'tgl_akhir'      => 'required',
            'tgl_berlaku'    => 'required',
            'tgl_ditetapkan' => 'required',
            'daftar_petugas' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);


        $sk['no'] = $request->no;
        $sk['mak'] = $request->kode_kegiatan . '.' . $request->kode_output . '.' . $request->kode_suboutput . '.' . $request->kode_komponen;
        $sk['tentang'] = $request->tentang;
        $sk['tgl_mulai'] = $request->tgl_mulai;
        $sk['tgl_akhir'] = $request->tgl_akhir;
        $sk['tgl_berlaku'] = $request->tgl_berlaku;
        $sk['tgl_ditetapkan'] = $request->tgl_ditetapkan;
        $sk['tahun'] = explode('-', $request->tgl_ditetapkan)[0];

        // insert data
        $res_sk = Sk::create($sk);
        $res_sk->insertHonor($res_sk->id, $request->uraian_honor, $request->honor);
        $res_sk->insertPetugas($res_sk->id, $request->daftar_petugas);

        return redirect()->route('kegiatan.sk.index');
    }

    public function edit($id, Request $request)
    {
        // mengambil data
        $sk = Sk::find($id);
        $mak = explode('.', $sk->mak);
        $pok = Pok::where('kode_kegiatan', $mak[0])
            ->where('kode_output', $mak[1])
            ->where('kode_suboutput', $mak[2])
            ->where('kode_komponen', $mak[3])
            ->where('tahun', $sk->tahun)
            ->first();

        $last_no = Sk::where('tahun', $pok->tahun)->max('no');

        if ($pok->kode_output) {
            // mengambil data petugas dan honor
            $sk->honor = DB::table('sks_honor')->where('sks_id', $id)->get();
            $list_petugas = $sk->getListPetugas($pok->tahun);
            $petugas = $sk->getPetugas($id);

            return view('kegiatan.sk.edit', compact('sk', 'pok', 'petugas', 'list_petugas', 'last_no'));
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

        // update data
        $find->update($data);
        $find->updateHonor($id, $request->uraian_honor, $request->honor);
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
        $data->no_sk = $data->no . '/SK/BPS-1107/' . explode('-', $data->tgl_ditetapkan)[0];
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
