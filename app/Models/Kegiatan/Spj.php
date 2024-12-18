<?php

namespace App\Models\Kegiatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spj extends Model
{
    use HasFactory;

    protected $table = "spjs";

    protected $fillable = [
        'poks_id',
        'no',
        'nama_kegiatan',
        'tgl_mulai',
        'tgl_akhir',
        'tgl_spj',
        'pjk',
        'tahun'
    ];
}
