<?php

namespace App\Models\Surat;

use App\Models\Master\Tim;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoSuratTim extends Model
{
    use HasFactory;

    protected $table = "no_surat_tims";

    // artinya semua column fillable
    protected $guarded = [];

    public function getFormat($d, $kode_tim)
    {
        $tim = Tim::find($kode_tim);
        $tgl = explode('-', $d->tgl);
        $result = $d->no . '/' . $d->jenis . '/' . $tim->kode . '/' . $tgl[1] . '/' . $d->tahun;

        return $result;
    }
}
