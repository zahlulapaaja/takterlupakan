<?php

namespace App\Http\Controllers\Pok;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Sk;
use App\Models\Master\Tim;
use App\Models\Pok;
use App\Models\Surat\NoSuratMasukKeluar;
use App\Models\Surat\NoSuratTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{

    public function fetchRevisi(Request $request)
    {
        $data['revisi'] = DB::table('poks')->distinct()
            ->where("tahun", $request->tahun)
            ->get('revisi');

        return response()->json($data);
    }

    public function getPok(Request $request)
    {

        $pok = new Pok();
        $data = $pok->getViewPok($request->tahun, $request->revisi);

        $view = view('pok._table-body-pok', compact('data'))->render();
        return response()->json(['view' => $view], 200);
    }

    public function searchPok(Request $request)
    {

        // return $request->search_keyword;
        $pok = new Pok();
        $data = $pok->getViewPok($request->tahun, $request->revisi, $request->search_keyword);

        $view = view('pok._table-body-pok', compact('data'))->render();
        return response()->json(['view' => $view], 200);
    }

    public function fetchBebanSpj(Request $request)
    {
        $sk = Sk::find($request->id_sk);
        $list_petugas = $sk->getPetugas($sk->id);
        $satuan = $request->satuan;

        $view = view('kegiatan.spj._table-alokasi-beban', compact('list_petugas', 'satuan'))->render();
        return response()->json(['view' => $view], 200);
    }

    public function fetchBebanHonor(Request $request)
    {
        $sk = Sk::find($request->id_sk);
        $list_petugas = $sk->getPetugas($sk->id);
        $pok = Pok::find($request->pok_id);

        $view = view('matriks.honor._table-alokasi-beban', compact('list_petugas', 'pok'))->render();
        return response()->json(['view' => $view], 200);
    }

    public function fetchTim(Request $request)
    {
        $data['tim'] = Tim::where("tahun", $request->tahun)->get();
        return response()->json($data);
    }

    public function fetchJenisSurat(Request $request)
    {
        $data = NoSuratTim::distinct()->where('tahun', $request->tahun)
            ->where('tim', $request->tim)->get('jenis');

        return response()->json($data);
    }
}
