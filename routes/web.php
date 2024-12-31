<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Kegiatan\KakController;
use App\Http\Controllers\Kegiatan\KegiatanController;
use App\Http\Controllers\Kegiatan\SkController;
use App\Http\Controllers\Kegiatan\SpjController;
use App\Http\Controllers\Kegiatan\SpkController;
use App\Http\Controllers\Master\MitraController;
use App\Http\Controllers\Master\PegawaiController;
use App\Http\Controllers\Master\ReferensiController;
use App\Http\Controllers\Master\TimController;
use App\Http\Controllers\Pok\DropdownController;
use App\Http\Controllers\Pok\PokController;
use App\Http\Controllers\Surat\NoFpController;
use App\Http\Controllers\Surat\NoSuratMasukKeluarController;
use App\Http\Controllers\Surat\NoSuratTimController;
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
    Route::name('pok.')->group(function () {
        Route::get('/pok', [PokController::class, 'index'])->name('index');
        Route::get('/pok/impor', [PokController::class, 'impor'])->name('impor');
        Route::post('/pok/impor', [PokController::class, 'proses_impor'])->name('prosesimpor');
        Route::get('/pok/impor/template', [PokController::class, 'template'])->name('template');
        Route::get('/pok/list', [PokController::class, 'list'])->name('list');
        Route::delete('/pok/destroy', [PokController::class, 'destroy'])->name('destroy');
    });

    Route::name('no-surat.')->group(function () {
        Route::get('/no-surat', [HomeController::class, 'no_surat'])->name('index');
        Route::resource('/no-surat/fp', NoFpController::class);
        Route::resource('/no-surat/tim', NoSuratTimController::class);
        Route::resource('/no-surat/masuk-keluar', NoSuratMasukKeluarController::class);
        Route::get('/no-surat/export/fp/{tahun}', [NoFpController::class, 'export'])->name('fp.export');
        Route::get('/no-surat/export/masuk-keluar/{tahun}', [NoSuratMasukKeluarController::class, 'export'])->name('masuk-keluar.export');
        Route::get('/no-surat/export/tim/{tahun}', [NoSuratTimController::class, 'export'])->name('tim.export');
    });

    Route::resource('/kegiatan', KegiatanController::class)->except(['create', 'show']);
    Route::post('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::name('kegiatan.')->group(function () {
        Route::post('/kegiatan/sk/create', [SkController::class, 'create'])->name('sk.create');
        Route::resource('/kegiatan/sk', SkController::class)->except(['create']);
        Route::get('/kegiatan/sk/{sk}/print', [SkController::class, 'print'])->name('sk.print');
        Route::post('/kegiatan/spj/create', [SpjController::class, 'create'])->name('spj.create');
        Route::resource('/kegiatan/spj', SpjController::class);
        Route::get('/kegiatan/spj/{spj}/print/{jenis}', [SpjController::class, 'print'])->name('spj.print');

        // masih coba-coba 
        Route::get('/kegiatan/spk/{spk}/print', [SpkController::class, 'print'])->name('spk.print');
        Route::get('/kegiatan/bast/{bast}/print', [SpkController::class, 'bast_print'])->name('bast.print');
        Route::get('/kegiatan/kak/{kak}/print', [KakController::class, 'print'])->name('kak.print');
    });

    Route::name('master.')->group(function () {
        Route::get('/master', [HomeController::class, 'master'])->name('index');
        Route::resource('/master/referensi', ReferensiController::class);
        Route::resource('/master/tim', TimController::class);
        Route::resource('/master/pegawai', PegawaiController::class);
        Route::resource('/master/mitra', MitraController::class);
        Route::get('/master/tim/list/{tahun}', [TimController::class, 'list'])->name('tim.list');
        Route::get('/master/impor/mitra', [MitraController::class, 'impor'])->name('mitra.impor');
        Route::post('/master/impor/mitra', [MitraController::class, 'proses_impor'])->name('mitra.prosesimpor');
        Route::get('/master/impor/mitra/template', [MitraController::class, 'template'])->name('mitra.template');
        Route::get('/master/mitra/list/{tahun}', [MitraController::class, 'list'])->name('mitra.list');
        Route::get('/master/mitra/delete/{tahun}', [MitraController::class, 'delete'])->name('mitra.delete');
    });


    Route::get('api/search-pok', [DropdownController::class, 'searchPok']);
    Route::post('api/fetch-revisi', [DropdownController::class, 'fetchRevisi']);
    Route::post('api/get-pok', [DropdownController::class, 'getPok']);
    Route::post('api/fetch-beban', [DropdownController::class, 'fetchBeban']);
    Route::post('api/fetch-tim', [DropdownController::class, 'fetchTim']);
    Route::post('api/get-no-surat-by-tim', [DropdownController::class, 'getNoSuratByTim']);
    Route::post('api/get-no-surat-by-jenis', [DropdownController::class, 'getNoSuratByJenis']);
    Route::post('api/get-no-surat-masuk-keluar', [DropdownController::class, 'getNoSuratByMasukKeluar']);
});
