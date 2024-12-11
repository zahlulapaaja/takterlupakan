<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoFpController extends Controller
{
    public function index()
    {
        return view('no-surat.fp');
    }
}
