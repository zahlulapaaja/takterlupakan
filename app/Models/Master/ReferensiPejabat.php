<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferensiPejabat extends Model
{
    use HasFactory;

    protected $table = "referensi_pejabats";

    protected $fillable = [
        'pegawai_id',
        'jabatan',
        'tgl_mulai',
        'tgl_selesai',
        'no_sk',
        'tgl_sk',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
