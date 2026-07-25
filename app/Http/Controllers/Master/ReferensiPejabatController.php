<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Master\ReferensiPejabat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReferensiPejabatController extends Controller
{
    public function index()
    {
        $data = ReferensiPejabat::with('pegawai')->orderBy('tgl_mulai', 'DESC')->get();
        return view('master.referensi.pejabat.index', compact('data'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        return view('master.referensi.pejabat.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jabatan'       => 'required',
            'pegawai_id'    => 'required',
            'tgl_mulai'     => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['jabatan'] = $request->jabatan;
        $data['pegawai_id'] = $request->pegawai_id;
        $data['tgl_mulai'] = $request->tgl_mulai;
        $data['tgl_selesai'] = $request->tgl_selesai;
        $data['no_sk'] = $request->no_sk;
        $data['tgl_sk'] = $request->tgl_sk;

        ReferensiPejabat::create($data);
        return redirect()->route('master.pejabat.index');
    }

    public function edit($id)
    {
        $data = ReferensiPejabat::with('pegawai')->find($id);
        $pegawai = Pegawai::all();

        return view('master.referensi.pejabat.edit', compact('data', 'pegawai'));
    }

    public function show($id)
    {
        $data = ReferensiPejabat::with('pegawai')->find($id);
        return view('master.referensi.pejabat.show', compact('data'));
    }

    public function update($id, Request $request)
    {
        $find = ReferensiPejabat::find($id);
        $validator = Validator::make($request->all(), [
            'jabatan'       => 'required',
            'pegawai_id'    => 'required',
            'tgl_mulai'     => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['jabatan'] = $request->jabatan;
        $data['pegawai_id'] = $request->pegawai_id;
        $data['tgl_mulai'] = $request->tgl_mulai;
        $data['tgl_selesai'] = $request->tgl_selesai;
        $data['no_sk'] = $request->no_sk;
        $data['tgl_sk'] = $request->tgl_sk;

        $find->update($data);
        return redirect()->route('master.pejabat.index');
    }

    public function destroy($id)
    {
        $data = ReferensiPejabat::find($id);
        $data->delete();

        return response()->json(array('success' => true));
    }
}
