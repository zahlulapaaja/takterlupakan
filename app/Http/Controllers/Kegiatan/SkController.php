<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\Pegawai;
use App\Models\Sk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkController extends Controller
{
    public function index()
    {
        // $data = Sk::all();
        // foreach ($data as $d) {
        //     $tgl = explode('-', $d->tgl);
        //     $d->no_surat = 'B-' . $d->no . 'A/92800/KU.600/' . $tgl[1] . '/' . $tgl[0];
        // }
        // $last = NoFP::latest('no')->first();
        // dd($last);
        return view('no-surat.fp', compact('data'));
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
            foreach ($mitra as $m) {
                $m->list = '[N] ' . $m->nama;
                $m->status = '[N]';
                $petugas[] = $m;
            }
            foreach ($pegawai as $p) {
                $p->list = '[O] ' . $p->nama;
                $p->status = '[O]';
                $petugas[] = $p;
            }
            return view('kegiatan.sk-create', compact('pok', 'petugas'));
        } else {
            return redirect()->route('pok');
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
            'daftar_petugas' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);


        $data['no'] = $request->no;
        $data['tentang'] = $request->tentang;
        $data['tgl_mulai'] = $request->tgl_mulai;
        $data['tgl_akhir'] = $request->tgl_akhir;
        $data['tgl_berlaku'] = $request->tgl_berlaku;
        $data['tgl_ditetapkan'] = $request->tgl_ditetapkan;
        $data['daftar_petugas'] = $request->daftar_petugas; // hapus

        dd($data);
        // $res = User::create($data);
        // return redirect()->route('user-management.users.index');
    }
}
