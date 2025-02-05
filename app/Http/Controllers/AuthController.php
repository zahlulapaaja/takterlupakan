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
            'email'    => 'required|email',
            'password'    => 'required',
        ]);

        // Check if email exists in the database
        if (!User::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'Email does not exist.'])->withInput();
        }

        // gatau ini untuk apa
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('landing');
        // }

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Attempt login
        if (Auth::attempt($data)) {
            $user = Auth::user();
            Session::put('user_id', $user->id);
            Session::put('name', $user->name);
            Session::put('role', User::find($user->id)->roles);
            Session::put('email', User::find($user->id)->email);
            Session::put('avatar', User::find($user->id)->image);
            return redirect()->route('home');
        } else {
            // Authentication failed
            return back()->withErrors(['password' => 'Invalid password.'])->withInput();
        }
    }

    public function logout()
    {
        if (session()->has('name')) {
            session()->pull('user_id');
            session()->pull('name');
            session()->pull('role');
            session()->pull('email');
            session()->pull('avatar');
        }
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }
}
