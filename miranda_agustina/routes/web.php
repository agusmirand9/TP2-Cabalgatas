<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/ingresar', [AuthController::class, 'loginForm'])
    ->name('auth.login.form')
    ->middleware('guest');
Route::post('/ingresar', [AuthController::class, 'loginProcess'])
    ->name('auth.login.process')
    ->middleware('guest');

Route::get('/registrarse', [RegisterController::class, 'form'])
    ->name('auth.register.form')
    ->middleware('guest');
Route::post('/registrarse', [RegisterController::class, 'process'])
    ->name('auth.register.process')
    ->middleware('guest');

Route::post('/cerrar-sesion', [AuthController::class, 'logout'])
    ->name('auth.logout')
    ->middleware('auth');