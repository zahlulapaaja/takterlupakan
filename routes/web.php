<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/', [LoginController::class, 'welcome'])->name('welcome');
Route::get('/login', [LoginController::class, 'login'])->name('login');
// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login.proses');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
