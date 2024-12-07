<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
});
