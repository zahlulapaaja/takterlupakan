<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Pegawai;
use App\Models\Master\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimController extends Controller
{
    public function index()
    {
        $list_tahun = Tim::distinct()->get('tahun');
        return view('master.tim.index', compact('list_tahun'));
    }

    public function list($tahun)
    {
        $data = Tim::where('tahun', $tahun)->get();
        foreach ($data as $d) {
            $d->ketua = Pegawai::find($d->ketua);
        }
        $data->tahun = $tahun;

        return view('master.tim.list', compact('data'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        return view('master.tim.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'        => 'required',
            'kode'        => 'required',
            'ketua'       => 'required',
            'singkatan'   => 'required',
            'tahun'       => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama'] = $request->nama;
        $data['kode'] = $request->kode;
        $data['ketua'] = $request->ketua;
        $data['singkatan'] = $request->singkatan;
        $data['tahun'] = $request->tahun;

        Tim::create($data);
        return redirect()->route('master.tim.index')->with('success', 'Tim berhasil ditambah');
    }

    public function show($id)
    {
        $data = Tim::find($id);
        $data->ketua = Pegawai::find($data->ketua);
        return view('master.tim.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Tim::find($id);
        $data->ketua = Pegawai::find($data->ketua);
        $pegawai = Pegawai::all();
        return view('master.tim.edit', compact('data', 'pegawai'));
    }


    public function update($id, Request $request)
    {
        $find = Tim::find($id);
        $validator = Validator::make($request->all(), [
            'nama'        => 'required',
            'kode'        => 'required',
            'ketua'       => 'required',
            'singkatan'   => 'required',
            'tahun'       => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama'] = $request->nama;
        $data['kode'] = $request->kode;
        $data['ketua'] = $request->ketua;
        $data['singkatan'] = $request->singkatan;
        $data['tahun'] = $request->tahun;

        $find->update($data);
        return redirect()->route('master.tim.index')->with('success', 'Tim berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Tim::find($id);
        $data->delete();

        return response()->json(array('success' => true));
    }
}
