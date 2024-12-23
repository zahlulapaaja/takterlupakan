<?php

namespace App\Http\Controllers\Pok;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Sk;
use App\Models\Master\Tim;
use App\Models\Pok;
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
        $list_akun_input = ['524113', '521213', '524111'];

        $view = view('pok._table-body-pok', compact('data', 'list_akun_input'))->render();
        return response()->json(['view' => $view], 200);
    }

    public function searchPok(Request $request)
    {

        // return $request->search_keyword;
        $pok = new Pok();
        $data = $pok->getViewPok($request->tahun, $request->revisi, $request->search_keyword);
        $list_akun_input = ['524113', '521213', '524111'];

        $view = view('pok._table-body-pok', compact('data', 'list_akun_input'))->render();
        return response()->json(['view' => $view], 200);
    }

    public function fetchBeban(Request $request)
    {
        $sk = Sk::find($request->id_sk);
        $list_petugas = $sk->getPetugas($sk->id);

        $view = view('kegiatan.spj._table-alokasi-beban', compact('list_petugas'))->render();
        return response()->json(['view' => $view], 200);
    }

    public function fetchTim(Request $request)
    {
        $data['tim'] = Tim::where("tahun", $request->tahun)->get();

        return response()->json($data);
    }

    public function getNoSuratByTim(Request $request)
    {
        $data = NoSuratTim::where('tahun', $request->tahun)
            ->where('tim', $request->tim)
            ->orderBy('no', 'DESC')->get();
        foreach ($data as $d) {
            $tim = Tim::find($d->tim);
            $tgl = explode('-', $d->tgl);
            $d->no_surat = $d->no . '/' . $d->jenis . '/' . $tim->kode . '/' . $tgl[1] . '/' . $d->tahun;
        }
        $list_jenis = NoSuratTim::distinct()
            ->where('tahun', $request->tahun)
            ->where('tim', $request->tim)
            ->get('jenis');

        $view = view('no-surat.tim._table-no-surat', compact('data'))->render();
        return response()->json([
            'view' => $view,
            'list_jenis' => $list_jenis,
        ], 200);
    }

    public function getNoSuratByJenis(Request $request)
    {
        $data = NoSuratTim::where('tahun', $request->tahun)
            ->where('tim', $request->tim)
            ->where('jenis', $request->jenis)
            ->orderBy('no', 'DESC')->get();
        foreach ($data as $d) {
            $tim = Tim::find($d->tim);
            $tgl = explode('-', $d->tgl);
            $d->no_surat = $d->no . '/' . $d->jenis . '/' . $tim->kode . '/' . $tgl[1] . '/' . $d->tahun;
        }

        $view = view('no-surat.tim._table-no-surat', compact('data'))->render();
        return response()->json(['view' => $view], 200);
    }
}
