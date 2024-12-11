<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Sk;
use Illuminate\Http\Request;

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
            return view('kegiatan.sk-create', compact('pok'));
        } else {
            return redirect()->route('pok');
        }
    }
}
