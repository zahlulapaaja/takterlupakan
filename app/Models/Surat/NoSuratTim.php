<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoSuratTim extends Model
{
    use HasFactory;

    protected $table = "no_surat_tims";

    // artinya semua column fillable
    protected $guarded = [];
}
