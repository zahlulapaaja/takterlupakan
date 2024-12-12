<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = "mitras";

    protected $fillable = [
        'nama',
        'email',
        'id_sobat',
        'posisi',
        'alamat_detail',
        'alamat_prov',
        'alamat_kab',
        'alamat_kec',
        'alamat_desa',
        'jk',
        'tgl_lahir',
        'agama',
        'status',
        'pendidikan',
        'pekerjaan',
        'no_telp',
        'npwp',
        'catatan',
        'no_rek',
        'nama_bank',
        'an_rek',
        'tahun'
    ];
}
