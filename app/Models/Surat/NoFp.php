<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoFp extends Model
{
    use HasFactory;

    protected $table = "nofps";

    // artinya semua column fillable
    protected $guarded = [];
}
