<?php

namespace App\Http\Controllers\Surat;

use App\Exports\Surat\NoFpExport;
use App\Http\Controllers\Controller;
use App\Models\Surat\NoFp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class NoFpController extends Controller
{
    public function index()
    {
        $data = NoFp::all();
        foreach ($data as $d) {
            $tgl = explode('-', $d->tgl);
            $d->no_surat = 'B-' . $d->no . 'A/92800/KU.600/' . $tgl[1] . '/' . $tgl[0];
        }

        return view('no-surat.fp.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required|date'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no'] = $request->no;
        $data['rincian'] = $request->rincian;
        $data['tgl'] = $request->tgl;
        $data['tahun'] = explode('-', $request->tgl)[0];
        $data['edited_by'] = session('user_id');

        $res = NoFp::create($data);
        return redirect()->route('no-surat.fp.index');
    }

    public function edit($id)
    {
        $data = NoFp::find($id);
        return view('no-surat.fp.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $find = NoFp::find($id);

        $validator = Validator::make($request->all(), [
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required|date',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no'] = $request->no;
        $data['rincian'] = $request->rincian;
        $data['tgl'] = $request->tgl;
        $data['tahun'] = explode('-', $request->tgl)[0];
        $data['edited_by'] = session('user_id');

        $find->update($data);
        return redirect()->route('no-surat.fp.index');
    }

    public function destroy($id)
    {
        $data = NoFp::find($id);
        $data->delete();

        return response()->json(array('success' => true));
    }

    public function export($tahun)
    {
        return (new NoFpExport($tahun))->download('no-surat-fp-' . $tahun . '.xlsx');
    }
}
