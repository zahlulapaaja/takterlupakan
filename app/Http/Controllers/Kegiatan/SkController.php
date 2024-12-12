<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\Pegawai;
use App\Models\Sk;
use Carbon\Carbon;
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
        $pok['kode_kegiatan'] = substr($request->kode_kegiatan, 1, 4);
        $pok['kode_output'] = substr($request->kode_output, 1, 3);
        $pok['output'] = $request->output;
        $pok['kode_suboutput'] = substr($request->kode_suboutput, 1, 3);
        $pok['suboutput'] = $request->suboutput;
        $pok['kode_komponen'] = substr($request->kode_komponen, 1, 3);
        $pok['komponen'] = $request->komponen;


        if ($request->has('kode_output')) {
            $mitra = Mitra::orderBy('nama', 'ASC')->get(); // harusnya per year nanti
            $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
            $petugas = [];
            foreach ($pegawai as $p) {
                $p->list = '[O] ' . $p->nama;
                $p->status = 'O';
                $petugas[] = $p;
            }
            foreach ($mitra as $m) {
                $m->list = '[N] ' . $m->nama;
                $m->status = 'N';
                $petugas[] = $m;
            }
            return view('kegiatan.sk.create', compact('pok', 'petugas'));
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

        // insert data
        $res_sk = Sk::create($sk);
        $res_sk->insertHonor($res_sk->id, $request->uraian_honor, $request->honor);
        $res_sk->insertPetugas($res_sk->id, $request->daftar_petugas);

        return redirect()->route('kegiatan.sk.index');
    }

    public function print($id)
    {
        $data = Sk::find($id);
        $data->no_sk = $data->no . '/SK/BPS-1107/' . explode('-', $data->tgl_ditetapkan)[0];
        $data->honor = DB::table('sks_honor')->where('sks_id', $id)->get();
        $data->petugas = $data->getPetugas($id);
        // dd($data);

        $data->tgl_ditetapkan = $data->dateIndonesia($data->tgl_ditetapkan);
        $data->tgl_berlaku = $data->dateIndonesia($data->tgl_berlaku);

        return view('kegiatan.sk.print', compact('data'));
    }
}
