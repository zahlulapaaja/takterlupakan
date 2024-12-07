<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request): RedirectResponse
    {
        $request->validate([
            'email'    => 'required',
            'password'    => 'required',
        ]);


        // gatau ini untuk apa
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('dashboard');
        // }

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd(session()->all());
        if (Auth::attempt($data)) {
            $user = Auth::user();
            Session::put('name', $user->name);
            Session::put('role', User::find($user->id)->roles[0]->name);
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }

    public function logout()
    {
        if (session()->has('name')) {
            session()->pull('name');
            session()->pull('role');
        }
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }
}
