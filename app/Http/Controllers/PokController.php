<?php

namespace App\Http\Controllers;

use App\Imports\PokImport;
use App\Models\Pok;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PokController extends Controller
{
    public function index()
    {
        return view('pok.index');
    }

    public function impor()
    {
        return view('pok.impor');
    }

    public function proses_impor(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // dd($request->file('file'));
        $res = Excel::import(new PokImport, $request->file('file'));
        // dd(session()->all());
        // dd($res);
        return redirect()->back()->with('success', 'Data pok berhasil di import');
    }
}
