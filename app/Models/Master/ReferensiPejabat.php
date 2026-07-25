<?php

namespace App\Models\Master;

use Carbon\Carbon;
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

    public static function getPejabat($jabatan, $tanggal)
    {
        $tanggal = Carbon::parse($tanggal);

        return self::with('pegawai')
            ->where('jabatan', $jabatan)
            ->whereDate('tgl_mulai', '<=', $tanggal)
            ->where(function ($q) use ($tanggal) {
                $q->whereNull('tgl_selesai')
                    ->orWhereDate('tgl_selesai', '>=', $tanggal);
            })
            ->orderByDesc('tgl_mulai')
            ->first()?->pegawai;
    }
}
