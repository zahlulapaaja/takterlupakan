<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Kegiatan\SkController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\Pok\DropdownController;
use App\Http\Controllers\Pok\PokController;
use App\Http\Controllers\Surat\BastController;
use App\Http\Controllers\Surat\NoFpController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', [AuthController::class, 'welcome'])->name('welcome');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserController::class);
        Route::get('/user-management/users/view', [HomeController::class, 'users_view'])->name('users_view');
        Route::get('/user-management/roles', [HomeController::class, 'roles'])->name('roles');
        Route::get('/user-management/roles/view', [HomeController::class, 'roles_view'])->name('roles_view');
        Route::get('/user-management/permissions', [HomeController::class, 'permissions'])->name('permissions');
        // Route::resource('/user-management/users', HomeController::class);
        // Route::resource('/user-management/roles', HomeController::class);
        // Route::resource('/user-management/permissions', HomeController::class);
    });
    Route::get('/pok', [PokController::class, 'index'])->name('pok');
    Route::get('/pok/impor', [PokController::class, 'impor'])->name('pok.impor');
    Route::post('/pok/impor', [PokController::class, 'proses_impor'])->name('pok.prosesimpor');

    Route::name('no-surat.')->group(function () {
        Route::resource('/no-surat/fp', NoFpController::class);
    });

    Route::name('kegiatan.')->group(function () {
        Route::post('/kegiatan/sk/create', [SkController::class, 'create'])->name('sk.create');
        Route::get('/kegiatan/sk/{sk}/print', [SkController::class, 'print'])->name('sk.print');
        Route::resource('/kegiatan/sk', SkController::class);
        Route::post('/kegiatan/pjk/create', [KegiatanController::class, 'create'])->name('pjk.create');
        Route::post('/kegiatan/item/create', [KegiatanController::class, 'create'])->name('item.create');
        Route::post('/kegiatan/item/get-petugas', [KegiatanController::class, 'getPetugas'])->name('item.get-petugas');
        Route::resource('/kegiatan/item', KegiatanController::class);
        // Route::post('/kegiatan/bast/create', [BastController::class, 'create'])->name('bast.create');
        // Route::get('/kegiatan/bast/{bast}/print', [BastController::class, 'print'])->name('bast.print');
        // Route::resource('/kegiatan/bast', BastController::class);
    });

    Route::get('/mitra/impor', [MitraController::class, 'impor'])->name('mitra.impor');
    Route::post('/mitra/impor', [MitraController::class, 'proses_impor'])->name('mitra.prosesimpor');

    Route::post('api/fetch-revisi', [DropdownController::class, 'fetchRevisi']);
    Route::post('api/get-pok', [DropdownController::class, 'getPok']);
});
