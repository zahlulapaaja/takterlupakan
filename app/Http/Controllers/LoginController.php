<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function login()
    {
        return view('auth.login');
    }
}
