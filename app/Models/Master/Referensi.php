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
        'ppk2',
        'bend',
        'no_dipa',
        'tgl_dipa',
        'no_sk_kpa',
        'tgl_sk_kpa',
        'pmk',
        'tahun',
    ];

    public function terbilang_tgl($tgl)
    {
        // menyesuaikan format 
        if (gettype($tgl) != "string") $tgl = $tgl->toDateString();

        $result = Carbon::parse($tgl)->locale('id')->dayName
            . ', Tanggal ' . Terbilang::make(explode('-', $tgl)[2])
            . ', Bulan ' . date_indo_bulan(explode('-', $tgl)[1])
            . ', Tahun ' . Terbilang::make(explode('-', $tgl)[0]);

        return $result;
    }
}
