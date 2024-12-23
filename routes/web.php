<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Kegiatan\KakController;
use App\Http\Controllers\Kegiatan\SkController;
use App\Http\Controllers\Kegiatan\SpjController;
use App\Http\Controllers\Kegiatan\SpkController;
use App\Http\Controllers\Master\MitraController;
use App\Http\Controllers\Master\PegawaiController;
use App\Http\Controllers\Master\ReferensiController;
use App\Http\Controllers\Pok\DropdownController;
use App\Http\Controllers\Pok\PokController;
use App\Http\Controllers\Surat\NoFpController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', [AuthController::class, 'welcome'])->name('welcome');
Route::get('/soon', [HomeController::class, 'soon'])->name('soon');
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
        Route::get('/no-surat/tim', [NoFpController::class, 'tim'])->name('tim');
    });

    Route::name('kegiatan.')->group(function () {
        Route::post('/kegiatan/sk/create', [SkController::class, 'create'])->name('sk.create');
        Route::get('/kegiatan/sk/{sk}/print', [SkController::class, 'print'])->name('sk.print');
        Route::resource('/kegiatan/sk', SkController::class);
        Route::post('/kegiatan/spj/create', [SpjController::class, 'create'])->name('spj.create');
        Route::get('/kegiatan/spj/{spj}/print', [SpjController::class, 'print'])->name('spj.print');
        Route::resource('/kegiatan/spj', SpjController::class);
        Route::get('/kegiatan/spk/{spk}/print', [SpkController::class, 'print'])->name('spk.print');
        Route::get('/kegiatan/bast/{bast}/print', [SpkController::class, 'bast_print'])->name('bast.print');
        Route::get('/kegiatan/kak/{kak}/print', [KakController::class, 'print'])->name('kak.print');
        // Route::post('/kegiatan/bast/create', [BastController::class, 'create'])->name('bast.create');
        // Route::get('/kegiatan/bast/{bast}/print', [BastController::class, 'print'])->name('bast.print');
        // Route::resource('/kegiatan/bast', BastController::class);
    });

    Route::name('master.')->group(function () {
        Route::resource('/master/referensi', ReferensiController::class);
        Route::resource('/master/pegawai', PegawaiController::class);
        Route::resource('/master/mitra', MitraController::class);
        Route::get('/master/impor/mitra', [MitraController::class, 'impor'])->name('mitra.impor');
        Route::post('/master/impor/mitra', [MitraController::class, 'proses_impor'])->name('mitra.prosesimpor');
        Route::get('/master/mitra/list/{tahun}', [MitraController::class, 'list'])->name('mitra.list');
        Route::get('/master/mitra/delete/{tahun}', [MitraController::class, 'delete'])->name('mitra.delete');
    });


    Route::get('api/search-pok', [DropdownController::class, 'searchPok']);
    Route::post('api/fetch-revisi', [DropdownController::class, 'fetchRevisi']);
    Route::post('api/get-pok', [DropdownController::class, 'getPok']);
    Route::post('api/fetch-beban', [DropdownController::class, 'fetchBeban']);
});
