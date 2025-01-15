<?php

namespace App\Models\Master;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Riskihajar\Terbilang\Facades\Terbilang;

class Referensi extends Model
{
    use HasFactory;

    protected $table = "referensis";

    protected $fillable = [
        'kpa',
        'ppk',
        'bend',
        'no_dipa',
        'tgl_dipa',
        'no_sk_kpa',
        'tgl_sk_kpa',
        'tahun',
    ];

    public function terbilang_tgl($tgl)
    {
        // menyesuaikan format 
        $crb = new Carbon();
        if (gettype($tgl) != "string") $tgl = $tgl->toDateString();

        $result = $crb->isoFormat('dddd', $tgl)
            . ' Tanggal ' . Terbilang::make(explode('-', $tgl)[2])
            . ', Bulan ' . $crb->isoFormat('MMMM', $tgl)
            . ', Tahun ' . Terbilang::make(explode('-', $tgl)[0]);

        return $result;
    }

    public function terbilang_bulan($tgl)
    {
        $crb = new Carbon();
        $result =  $crb->isoFormat('MMMM', $tgl);
        return $result;
    }
}
