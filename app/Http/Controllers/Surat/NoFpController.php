<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Models\Surat\NoFp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoFpController extends Controller
{
    public function index()
    {
        $data = NoFp::all();
        foreach ($data as $d) {
            $tgl = explode('-', $d->tgl);
            $d->no_surat = 'B-' . $d->no . 'A/92800/KU.600/' . $tgl[1] . '/' . $tgl[0];
        }
        // $last = NoFP::latest('no')->first();
        // dd($last);
        return view('no-surat.fp', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no'] = $request->no;
        $data['rincian'] = $request->rincian;
        $data['tgl'] = $request->tgl;

        $res = NoFp::create($data);
        return redirect()->route('no-surat.fp.index');
    }

    public function edit($id)
    {
        $data = NoFp::find($id);
        return view('no-surat.fp-edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $find = NoFp::find($id);
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no'] = $request->no;
        $data['rincian'] = $request->rincian;
        $data['tgl'] = $request->tgl;

        $find->update($data);
        return redirect()->route('no-surat.fp.index');
    }

    public function destroy($id)
    {
        $user = NoFp::find($id);
        $user->delete();
        return redirect()->route('no-surat.fp.index');
    }
}
