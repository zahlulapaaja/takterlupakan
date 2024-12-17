<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Referensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReferensiController extends Controller
{
    public function index()
    {
        // $data = Referensi::all();
        // foreach ($data as $d) {
        //     $tgl = explode('-', $d->tgl);
        //     $d->no_surat = 'B-' . $d->no . 'A/92800/KU.600/' . $tgl[1] . '/' . $tgl[0];
        // }
        // $last = NoFP::latest('no')->first();
        // dd($last);
        // return view('master.referensi.index', compact('data'));
        return view('master.referensi.index');
    }

    public function create()
    {
        $last_tahun = Referensi::max('tahun');
        if ($last_tahun == null) $last_tahun = explode('-', now())[0];

        // dd($last_tahun);
        return view('master.referensi.create', compact('last_tahun'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun'       => 'required',
            'nama_kpa'    => 'required',
            'nip_kpa'     => 'required',
            'nama_ppk'    => 'required',
            'nip_ppk'     => 'required',
            'nama_bend'   => 'required',
            'nip_bend'    => 'required',
            'no_dipa'     => 'required',
            'tgl_dipa'    => 'required',
            'no_sk_kpa'   => 'required',
            'tgl_sk_kpa'  => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['tahun'] = $request->tahun;
        $data['nama_kpa'] = $request->nama_kpa;
        $data['nip_kpa'] = $request->nip_kpa;
        $data['nama_ppk'] = $request->nama_ppk;
        $data['nip_ppk'] = $request->nip_ppk;
        $data['nama_bend'] = $request->nama_bend;
        $data['nip_bend'] = $request->nip_bend;
        $data['no_dipa'] = $request->no_dipa;
        $data['tgl_dipa'] = $request->tgl_dipa;
        $data['no_sk_kpa'] = $request->no_sk_kpa;
        $data['tgl_sk_kpa'] = $request->tgl_sk_kpa;
        $data['jln'] = $request->jln;
        $data['kab'] = $request->kab;
        $data['kodepos'] = $request->kodepos;
        $data['tlp'] = $request->tlp;
        $data['email'] = $request->email;
        $data['web'] = $request->web;

        $res = Referensi::create($data);
        return redirect()->route('master.referensi.index');
    }
}
