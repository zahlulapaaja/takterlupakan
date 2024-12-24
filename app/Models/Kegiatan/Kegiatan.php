<?php

namespace App\Models\Kegiatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = "kegiatans";

    protected $fillable = [
        'poks_id',
        'nama_kegiatan',
        'tgl_mulai',
        'tgl_akhir',
        'pjk',
        'tahun',
        'edited_by',
    ];
}