<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Kegiatan\KakController;
use App\Http\Controllers\Kegiatan\KegiatanController;
use App\Http\Controllers\Kegiatan\SkController;
use App\Http\Controllers\Kegiatan\SpjController;
use App\Http\Controllers\Master\MitraController;
use App\Http\Controllers\Master\PegawaiController;
use App\Http\Controllers\Master\ReferensiController;
use App\Http\Controllers\Master\TimController;
use App\Http\Controllers\Matriks\MatriksHonorController;
use App\Http\Controllers\Pok\PokController;
use App\Http\Controllers\Surat\NoFpController;
use App\Http\Controllers\Surat\NoSuratMasukKeluarController;
use App\Http\Controllers\Surat\NoSuratTimController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('/soon', [HomeController::class, 'soon'])->name('soon');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // User Management
    Route::middleware(['role:administrator'])->name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserController::class)->except(['create', 'show', 'edit']);
        Route::put('/user-management/users/{user}/update-password', [UserController::class, 'update_password'])->name('users.update-password');
    });

    // Anggaran
    Route::get('/pok', [PokController::class, 'index'])->name('pok.index');
    Route::middleware(['role:administrator|ppk'])->name('pok.')->group(function () {
        Route::get('/pok/impor', [PokController::class, 'impor'])->name('impor');
        Route::post('/pok/impor', [PokController::class, 'proses_impor'])->name('prosesimpor');
        Route::get('/pok/impor/template', [PokController::class, 'template'])->name('template');
        Route::get('/pok/list', [PokController::class, 'list'])->name('list');
        Route::delete('/pok/destroy', [PokController::class, 'destroy'])->name('destroy');
    });

    // Nomor Surat
    Route::name('no-surat.')->group(function () {
        Route::get('/no-surat', [HomeController::class, 'no_surat'])->name('index');
        Route::resource('/no-surat/fp', NoFpController::class);
        Route::resource('/no-surat/tim', NoSuratTimController::class);
        Route::resource('/no-surat/masuk-keluar', NoSuratMasukKeluarController::class);
        Route::get('/no-surat/export/fp/{tahun}', [NoFpController::class, 'export'])->name('fp.export');
        Route::get('/no-surat/export/masuk-keluar/{tahun}', [NoSuratMasukKeluarController::class, 'export'])->name('masuk-keluar.export');
        Route::get('/no-surat/export/tim/{tahun}', [NoSuratTimController::class, 'export'])->name('tim.export');
    });

    // Kegiatan 
    Route::resource('/kegiatan', KegiatanController::class)->except(['create', 'show']);
    Route::post('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::name('kegiatan.')->group(function () {
        Route::post('/kegiatan/kak/create', [KakController::class, 'create'])->name('kak.create');
        Route::resource('/kegiatan/kak', KakController::class)->except(['create']);
        Route::post('/kegiatan/sk/create', [SkController::class, 'create'])->name('sk.create');
        Route::resource('/kegiatan/sk', SkController::class)->except(['create']);
        Route::post('/kegiatan/spj/create', [SpjController::class, 'create'])->name('spj.create');
        Route::resource('/kegiatan/spj', SpjController::class)->except(['create']);

        // print 
        Route::get('/kegiatan/sk/{sk}/print', [SkController::class, 'print'])->name('sk.print');
        Route::get('/kegiatan/spj/{spj}/print/{jenis}', [SpjController::class, 'print'])->name('spj.print');
        Route::get('/kegiatan/kak/{kak}/print', [KakController::class, 'print'])->name('kak.print');
    });

    // Matriks 
    Route::name('matriks.')->group(function () {
        Route::get('/matriks', [HomeController::class, 'matriks'])->name('index');
        Route::post('/matriks/honor/create', [MatriksHonorController::class, 'create'])->name('honor.create');
        Route::get('/matriks/honor/{tahun}/{bulan}', [MatriksHonorController::class, 'list'])->name('honor.list');
        Route::resource('/matriks/honor', MatriksHonorController::class)->except(['create']);

        // print 
        Route::get('/matriks/honor/bast/{id}/print', [MatriksHonorController::class, 'bast_print'])->name('honor.bast');
        Route::get('/matriks/honor/{tahun}/{bulan}/bast', [MatriksHonorController::class, 'bast_list_print'])->name('honor.bast.print');
        Route::get('/matriks/honor/{tahun}/{bulan}/spk/{no}', [MatriksHonorController::class, 'spk_print'])->name('honor.spk.print');
    });

    // Master 
    Route::middleware(['role:administrator|kepala|ppk'])->name('master.')->group(function () {
        Route::get('/master', [HomeController::class, 'master'])->name('index');
        Route::resource('/master/referensi', ReferensiController::class);
        Route::resource('/master/tim', TimController::class);
        Route::resource('/master/pegawai', PegawaiController::class);
        Route::resource('/master/mitra', MitraController::class)->except('create');
        Route::get('/master/tim/list/{tahun}', [TimController::class, 'list'])->name('tim.list');
        Route::get('/master/export/pegawai', [PegawaiController::class, 'export'])->name('pegawai.export');
        Route::get('/master/impor/mitra', [MitraController::class, 'impor'])->name('mitra.impor');
        Route::post('/master/impor/mitra', [MitraController::class, 'proses_impor'])->name('mitra.prosesimpor');
        Route::get('/master/impor/mitra/template', [MitraController::class, 'template'])->name('mitra.template');
        Route::get('/master/mitra/list/{tahun}', [MitraController::class, 'list'])->name('mitra.list');
        Route::get('/master/mitra/add/{tahun}', [MitraController::class, 'add'])->name('mitra.add');
        Route::delete('/master/mitra/delete/{tahun}', [MitraController::class, 'delete'])->name('mitra.delete');
    });

    // Profile
    Route::get('/profile', [UserController::class, 'show_profile'])->name('profile.show');
    Route::get('/profile/edit', [UserController::class, 'edit_profile'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'update_profile'])->name('profile.update');
    Route::get('/profile/change-password', [UserController::class, 'change_password_profile'])->name('profile.change-password');
    Route::put('/profile/update-password', [UserController::class, 'update_password_profile'])->name('profile.update-password');

    // Api 
    Route::get('api/search-pok', [DropdownController::class, 'searchPok']);
    Route::post('api/fetch-revisi', [DropdownController::class, 'fetchRevisi']);
    Route::post('api/get-pok', [DropdownController::class, 'getPok']);
    Route::post('api/fetch-beban-spj', [DropdownController::class, 'fetchBebanSpj']);
    Route::post('api/fetch-beban-honor', [DropdownController::class, 'fetchBebanHonor']);
    Route::post('api/fetch-tim', [DropdownController::class, 'fetchTim']);
    Route::post('api/fetch-jenis-surat', [DropdownController::class, 'fetchJenisSurat']);
});
