<?php

namespace App\Models\Matriks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatriksHonor extends Model
{
    use HasFactory;

    protected $table = "matriks_honors";

    // artinya semua column fillable
    protected $guarded = [];
}
