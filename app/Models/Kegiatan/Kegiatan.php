<?php

namespace App\Models\Kegiatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "kegiatans";

    protected $fillable = [
        'poks_id',
        'nama',
        'tgl_mulai',
        'tgl_akhir',
        'tim',
        'pjk',
        'tahun',
        'edited_by',
    ];
}
