<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referensi extends Model
{
    use HasFactory;

    protected $table = "referensis";

    protected $fillable = [
        'nama_kpa',
        'nip_kpa',
        'nama_ppk',
        'nip_ppk',
        'nama_bend',
        'nip_bend',
        'no_dipa',
        'tgl_dipa',
        'no_sk_kpa',
        'tgl_sk_kpa',
        'jln',
        'kab',
        'kodepos',
        'tlp',
        'email',
        'web',
        'tahun',
    ];
}
