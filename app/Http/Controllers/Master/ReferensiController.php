<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Master\ReferensiPejabat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReferensiController extends Controller
{
    public function index()
    {
        $data = Referensi::select('id', 'tahun')->orderBy('tahun', 'ASC')->get();
        return view('master.referensi.index', compact('data'));
    }

    public function create()
    {
        $last_tahun = Referensi::max('tahun');
        $pegawai = Pegawai::all();

        if ($last_tahun == null) {
            $last_tahun = explode('-', now())[0];
        } else {
            $last_tahun++;
        }

        return view('master.referensi.create', compact('last_tahun', 'pegawai'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun'       => 'required',
            'no_dipa'     => 'required',
            'tgl_dipa'    => 'required',
            'no_sk_kpa'   => 'required',
            'tgl_sk_kpa'  => 'required',
            'pmk'         => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['tahun'] = $request->tahun;
        $data['no_dipa'] = $request->no_dipa;
        $data['tgl_dipa'] = $request->tgl_dipa;
        $data['no_sk_kpa'] = $request->no_sk_kpa;
        $data['tgl_sk_kpa'] = $request->tgl_sk_kpa;
        $data['pmk'] = $request->pmk;

        Referensi::create($data);
        return redirect()->route('master.referensi.index');
    }

    public function edit($id)
    {
        $data = Referensi::find($id);
        $pegawai = Pegawai::all();

        return view('master.referensi.edit', compact('data', 'pegawai'));
    }

    public function show($id)
    {
        $data = Referensi::find($id);
        $data->kpa  = ReferensiPejabat::getPejabat('KPA', $data->tgl);
        $data->ppk  = ReferensiPejabat::getPejabat('PPK', $data->tgl);
        $data->ppk2  = ReferensiPejabat::getPejabat('PPK2', $data->tgl);
        $data->bend = ReferensiPejabat::getPejabat('BEND', $data->tgl);

        return view('master.referensi.show', compact('data'));
    }

    public function update($id, Request $request)
    {
        $find = Referensi::find($id);
        $validator = Validator::make($request->all(), [
            'no_dipa'     => 'required',
            'tgl_dipa'    => 'required',
            'no_sk_kpa'   => 'required',
            'tgl_sk_kpa'  => 'required',
            'pmk'         => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no_dipa'] = $request->no_dipa;
        $data['tgl_dipa'] = $request->tgl_dipa;
        $data['no_sk_kpa'] = $request->no_sk_kpa;
        $data['tgl_sk_kpa'] = $request->tgl_sk_kpa;
        $data['pmk'] = $request->pmk;

        $find->update($data);
        return redirect()->route('master.referensi.index');
    }

    public function destroy($id)
    {
        $data = Referensi::find($id);
        $data->delete();

        return response()->json(array('success' => true));
    }
}
