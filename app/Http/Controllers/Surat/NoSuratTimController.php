<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Models\Surat\NoSuratTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoSuratTimController extends Controller
{
    public function index()
    {
        $data = NoSuratTim::all();
        foreach ($data as $d) {
            $tgl = explode('-', $d->tgl);
            $d->no_surat = $d->no . '/' . $d->jenis . '/11076/' . $tgl[1] . '/' . $tgl[0];
        }

        return view('no-surat.tim.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tim'       => 'required',
            'jenis'     => 'required',
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['tim'] = $request->tim;
        $data['jenis'] = $request->jenis;
        $data['no'] = $request->no;
        $data['rincian'] = $request->rincian;
        $data['tgl'] = $request->tgl;
        $data['keterangan'] = $request->keterangan;
        $data['tahun'] = explode('-', $request->tgl)[0];
        $data['edited_by'] = session('user_id');

        NoSuratTim::create($data);
        return redirect()->route('no-surat.tim.index')->with('success', 'Nomor Surat berhasil ditambah');
    }

    // public function show($id)
    // {
    //     $data = NoSuratTim::find($id);
    //     return view('no-surat.tim.show', compact('data'));
    // }

    public function edit($id)
    {
        $data = NoSuratTim::find($id);
        return view('no-surat.tim.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $find = NoSuratTim::find($id);
        $validator = Validator::make($request->all(), [
            'tim'       => 'required',
            'jenis'     => 'required',
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['tim'] = $request->tim;
        $data['jenis'] = $request->jenis;
        $data['no'] = $request->no;
        $data['rincian'] = $request->rincian;
        $data['tgl'] = $request->tgl;
        $data['keterangan'] = $request->keterangan;
        $data['tahun'] = explode('-', $request->tgl)[0];
        $data['edited_by'] = session('user_id');

        $find->update($data);
        return redirect()->route('no-surat.fp.index')->with('success', 'Nomor Surat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = NoSuratTim::find($id);
        $data->delete();
        return redirect()->route('no-surat.tim.index')->with('success', 'Nomor Surat berhasil dihapus');
    }
}
