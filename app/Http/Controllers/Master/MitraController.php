<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Imports\MitraImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MitraController extends Controller
{
    public function impor()
    {
        return view('master.mitra.impor');
    }
    public function proses_impor(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // dd($request->file('file'));
        $res = Excel::import(new MitraImport, $request->file('file'));
        return redirect()->back()->with('success', 'Data pok berhasil di import');
    }
}
