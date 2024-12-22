<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "pegawais";

    protected $fillable = [
        'nama',
        'nip_lama',
        'nip_baru',
        'avatar',
        'golongan',
        'pangkat',
        'jabatan',
        'email',
        'no_hp',
        'nama_bank',
        'no_rek',
        'an_rek',
        'catatan',
    ];
}
