<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokController extends Controller
{
    public function index()
    {
        return view('pok.index');
    }
}
