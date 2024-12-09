<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pok extends Model
{
    use HasFactory;

    protected $table = "poks";

    protected $fillable = [
        'nis',
        'name',
        'alahai'
    ];
}
