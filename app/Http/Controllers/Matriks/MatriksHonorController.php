<?php

namespace App\Http\Controllers\Matriks;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Kegiatan;
use App\Models\Master\Tim;
use App\Models\Pok;
use Illuminate\Http\Request;

class MatriksHonorController extends Controller
{
    public function index()
    {
        $data = Kegiatan::select('*')
            ->orderBy('tahun', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->get();
        foreach ($data as $d) {
            $pok = Pok::find($d->poks_id);
            $d->mak = $pok->kode_kegiatan . '.' .
                $pok->kode_output . '.' .
                $pok->kode_suboutput . '.' .
                $pok->kode_komponen . '.' .
                $pok->kode_subkomponen . '.' .
                $pok->kode_akun;
            $d->harga = $pok->harga;
            $d->volume = $pok->volume;

            $d->tim = Tim::find($d->tim);
        }
        return view('matriks.honor.index', compact('data'));
    }
}
