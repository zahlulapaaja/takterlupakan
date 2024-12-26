<?php

namespace App\Http\Controllers\Pok;

use App\Http\Controllers\Controller;
use App\Imports\PokImport;
use App\Models\Pok;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PokController extends Controller
{
    public function index()
    {
        // mengambil data tahun dan revisi terbaru
        $tahun = Pok::max('tahun');
        $revisi = Pok::where('tahun', $tahun)->max('revisi');

        // membuat tampilan pok
        $pok = new Pok();
        $data = $pok->getViewPok($tahun, $revisi);

        // list untuk tampilan
        $list_tahun = Pok::distinct()->orderBy('tahun', 'DESC')->get('tahun');
        $list_revisi = Pok::distinct()->orderBy('revisi', 'DESC')->where('tahun', $tahun)->get('revisi');

        return view('pok.index', compact('data', 'list_tahun', 'list_revisi',));
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

        // inisiasi data session
        session([
            'tahun' => $request->tahun,
            'revisi' => $request->revisi,
        ]);

        // import file
        Excel::import(new PokImport, $request->file('file'));

        // hapus data session
        session()->pull('kode_pro');
        session()->pull('pro');
        session()->pull('kode_keg');
        session()->pull('keg');
        session()->pull('kode_out');
        session()->pull('out');
        session()->pull('kode_subout');
        session()->pull('subout');
        session()->pull('kode_komp');
        session()->pull('komp');
        session()->pull('kode_subkomp');
        session()->pull('subkomp');
        session()->pull('kode_akun');
        session()->pull('akun');
        session()->pull('tahun');
        session()->pull('revisi');
        // dd(session()->all());

        return redirect()->back()->with('success', 'Data pok berhasil di import');
    }

    public function list()
    {
        $data = Pok::select('tahun', 'revisi')
            ->groupBy('tahun')->groupBy('revisi')
            ->orderBy('tahun', 'DESC')
            ->orderBy('revisi', 'DESC')
            ->get();

        return view('pok.list', compact('data'));
    }

    public function destroy(Request $request)
    {
        $data = Pok::where('tahun', $request->tahun)
            ->where('revisi', $request->revisi);
        $data->delete();

        return response()->json(array('success' => true));
    }
}
