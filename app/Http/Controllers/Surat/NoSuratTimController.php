<?php

namespace App\Http\Controllers\Surat;

use App\Exports\Surat\NoSuratTimExport;
use App\Http\Controllers\Controller;
use App\Models\Master\Tim;
use App\Models\Surat\NoSuratTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoSuratTimController extends Controller
{
    public function index()
    {
        $data = NoSuratTim::all();
        foreach ($data as $d) {
            $tim = Tim::find($d->tim);
            $tgl = explode('-', $d->tgl);
            $d->no_surat = $d->no . '/' . $d->jenis . '/' . $tim->kode . '/' . $tgl[1] . '/' . $d->tahun;
        }
        $last_tahun = NoSuratTim::max('tahun');
        $list_tahun = Tim::distinct()->orderBy('tahun', 'DESC')->get('tahun');
        $list_tim = Tim::distinct()->where('tahun', $last_tahun)->get('tahun');

        return view('no-surat.tim.index', compact('data', 'list_tahun', 'list_tim', 'last_tahun'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tim'       => 'required|numeric',
            'jenis'     => 'required',
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required|date'
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

    public function show($id)
    {
        $data = NoSuratTim::find($id);
        $data->tim = Tim::find($data->tim);
        return view('no-surat.tim.show', compact('data'));
    }

    public function edit($id)
    {
        $data = NoSuratTim::find($id);
        $data->tim = Tim::find($data->tim);
        $list_tahun = Tim::distinct()->get('tahun');
        return view('no-surat.tim.edit', compact('data', 'list_tahun'));
    }

    public function update($id, Request $request)
    {
        $find = NoSuratTim::find($id);
        $validator = Validator::make($request->all(), [
            'tim'       => 'required|numeric',
            'jenis'     => 'required',
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required|date',
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
        return redirect()->route('no-surat.tim.index')->with('success', 'Nomor Surat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = NoSuratTim::find($id);
        $data->delete();

        return response()->json(array('success' => true));
    }

    public function export($tahun)
    {
        return (new NoSuratTimExport($tahun))->download('no-surat-tim-' . $tahun . '.xlsx');
    }
}
