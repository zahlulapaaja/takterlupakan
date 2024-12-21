<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Spj;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Pok;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Riskihajar\Terbilang\Facades\Terbilang;

class SpkController extends Controller
{
    public function print($id)
    {
        $data = Spj::find($id);
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $data->alokasi_beban = DB::table('spjs_alokasi_beban')->where('spjs_id', $id)->get();
        // $data->petugas = $data->getPetugas($id);

        // generate nomor surat
        $data->no_spj = $data->no . '/SPJ/BPS-1107/' . explode('-', $data->tgl_spj)[0];
        $data->pok = Pok::find($data->poks_id);
        $data->mak = '054.01.' . // bikin constants
            $data->pok->kode_program . '.' .
            $data->pok->kode_kegiatan . '.' .
            $data->pok->kode_output . '.' .
            $data->pok->kode_suboutput . '.' .
            $data->pok->kode_komponen . '.' .
            $data->pok->kode_subkomponen . '.' .
            $data->pok->kode_akun;

        // format tanggal data sk
        $tgl = new Carbon();
        // Config::set('terbilang.locale', 'id');
        // dd($data->tgl_spj);
        $data->terbilang_tgl =
            $tgl->isoFormat('dddd', $data->tgl_spj)
            . ' Tanggal ' . Terbilang::make(explode('-', $data->tgl_spj)[2])
            . ', Bulan ' . Terbilang::make(explode('-', $data->tgl_spj)[1])
            . ', Tahun ' . Terbilang::make(explode('-', $data->tgl_spj)[0]);
        $data->tgl_spj = date_indo($data->tgl_spj);

        // $data->tgl_mulai = date_indo($data->tgl_mulai);
        // mengambil data pjk
        $data->pjk = Pegawai::find($data->pjk);
        // dd($data->pjk);

        // format tanggal data referensi
        $ref->tgl_dipa = date_indo($ref->tgl_dipa);
        $ref->tgl_sk_kpa = date_indo($ref->tgl_sk_kpa);

        // $views =
        //     view('kegiatan.spj._print.daftar-honor', compact('data', 'ref'))->render() .
        //     view('kegiatan.spj._print.bast', compact('data', 'ref'))->render() .
        //     view('kegiatan.spj._print.pernyataan', compact('data', 'ref'))->render();
        return view('kegiatan.spk.print', compact('data', 'ref'));
        // return $views;
    }
}
