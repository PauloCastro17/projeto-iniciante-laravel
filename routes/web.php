<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SiteController;
use  App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

//SITE/DASHBOARD
Route::get('/', [SiteController::class, 'index'])->name('site.index');

//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');

//CADASTRO
Route::get('/cadastro', [RegisterController::class, 'index'])->name('site.register');
Route::post('/cadastro', [RegisterController::class, 'store'])->name('auth.register');

//DASHBOARD
Route::middleware(['auth'])->group(function () {
    //DASHBOARD

    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('site.dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});
