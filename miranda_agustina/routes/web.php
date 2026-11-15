<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\EnsureIsAdmin;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{slug}', [BlogController::class, 'show'])
    ->name('blog.show');

Route::get('/cabalgatas', [RideController::class, 'index'])
    ->name('rides.index');

Route::get('/cabalgatas/{ride}', [RideController::class, 'show'])
    ->name('rides.show');

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

Route::middleware(['auth', EnsureIsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
    });

Route::middleware(['auth', EnsureIsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/usuarios', [UserController::class, 'index'])
            ->name('users.index');
        Route::get('/usuarios/{user}', [UserController::class, 'show'])
            ->name('users.show');
    });