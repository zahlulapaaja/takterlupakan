<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pok extends Model
{
    use HasFactory;

    protected $table = "poks";

    protected $fillable = [
        'kode_program',
        'program',
        'kode_kegiatan',
        'kegiatan',
        'kode_output',
        'output',
        'kode_suboutput',
        'suboutput',
        'kode_komponen',
        'komponen',
        'kode_subkomponen',
        'subkomponen',
        'kode_akun',
        'akun',
        'item_kegiatan',
        'volume',
        'satuan',
        'harga',
        'jumlah',
        'tahun',
        'revisi',
    ];
}
