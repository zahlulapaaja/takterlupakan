<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoSuratMasukKeluar extends Model
{
    use HasFactory;

    protected $table = "no_surat_masuk_keluar";

    // artinya semua column fillable
    protected $guarded = [];
}
