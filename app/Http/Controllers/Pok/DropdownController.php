<?php

namespace App\Http\Controllers\Pok;

use App\Http\Controllers\Controller;
use App\Models\Pok;
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
        $list_akun_input = ['524113', '521213', '524111'];

        $view = view('pok._table-body-pok', compact('data', 'list_akun_input'))->render();
        return response()->json(['view' => $view], 200);
    }

    public function searchPok(Request $request)
    {

        // return $request->search_keyword;
        $pok = new Pok();
        $data = $pok->getViewPok($request->tahun, $request->revisi);
        $list_akun_input = ['524113', '521213', '524111'];

        $view = view('pok._table-body-pok', compact('data', 'list_akun_input'))->render();
        return response()->json(['view' => $view], 200);
    }
}
