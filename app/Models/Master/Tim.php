<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;

    protected $table = "tims";

    protected $fillable = [
        'nama',
        'singkatan',
        'kode',
        'ketua',
        'tahun',
    ];
}
