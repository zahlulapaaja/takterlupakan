<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
