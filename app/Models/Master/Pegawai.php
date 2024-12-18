<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = "pegawais";

    protected $fillable = [
        'nama',
        'nip_lama',
        'nip_baru',
        'nik',
        'golongan',
        'pangkat',
        'jabatan',
        'email',
        'no_rek',
        'nama_bank',
        'an_rek',
        'no_hp'
    ];
}
