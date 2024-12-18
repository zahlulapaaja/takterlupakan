<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Sk;
use App\Models\Kegiatan\Spj;
use App\Models\Master\Pegawai;
use App\Models\Pok;
use Illuminate\Http\Request;

class SpjController extends Controller
{
    public function create(Request $request)
    {
        if (!($request->has('pok_id'))) {
            return redirect()->route('pok');
        }

        $pok = Pok::find($request->pok_id);
        $pok->mak = '054.01.' . // bikin constants
            $pok->kode_program . '.' .
            $pok->kode_kegiatan . '.' .
            $pok->kode_output . '.' .
            $pok->kode_suboutput . '.' .
            $pok->kode_komponen . '.' .
            $pok->kode_subkomponen . '.' .
            $pok->kode_akun;

        $sk = Sk::all();
        $last_no = Spj::where('tahun', $pok->tahun)->max('no');
        $list_pegawai = Pegawai::all();


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
        return view('kegiatan.spj.create', compact('pok', 'sk', 'list_pegawai'));
    }

    public function getPetugas(Request $request)
    {
        dd($request);
        return 'oiii';
    }
}
