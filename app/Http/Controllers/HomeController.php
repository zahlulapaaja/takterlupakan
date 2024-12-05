<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function users()
    {
        return view('user-management.users');
    }

    public function users_view()
    {
        return view('user-management.users_view');
    }

    public function roles()
    {
        return view('user-management.roles');
    }

    public function roles_view()
    {
        return view('user-management.roles_view');
    }

    public function permissions()
    {
        return view('user-management.permissions');
    }
}
