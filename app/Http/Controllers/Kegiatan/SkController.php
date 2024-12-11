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

    public function create()
    {
        // $data = Sk::all();
        // foreach ($data as $d) {
        //     $tgl = explode('-', $d->tgl);
        //     $d->no_surat = 'B-' . $d->no . 'A/92800/KU.600/' . $tgl[1] . '/' . $tgl[0];
        // }
        // $last = NoFP::latest('no')->first();
        // dd($last);
        return view('kegiatan.sk-create');
    }
}
