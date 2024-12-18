<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Sk;
use App\Models\Pok;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function create(Request $request)
    {
        if (!($request->has('pok_id'))) {
            return redirect()->route('pok');
        }

        $pok = Pok::find($request->pok_id);
        $pok->mak_output = $pok->kode_kegiatan . '.' . $pok->kode_output;
        $pok->mak_suboutput = $pok->kode_kegiatan . '.' . $pok->kode_output . '.' . $pok->kode_suboutput;

        $sk = Sk::all();
        // dd($pok);

        // $mitra = Mitra::orderBy('nama', 'ASC')->get(); // harusnya per year nanti
        // $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
        // $petugas = [];
        // foreach ($pegawai as $p) {
        //     $p->list = '[O] ' . $p->nama;
        //     $p->status = 'O';
        //     $petugas[] = $p;
        // }
        // foreach ($mitra as $m) {
        //     $m->list = '[N] ' . $m->nama;
        //     $m->status = 'N';
        //     $petugas[] = $m;
        // }
        return view('kegiatan.create', compact('pok', 'sk'));
    }

    public function getPetugas(Request $request)
    {
        dd($request);
        return 'oiii';
    }
}
