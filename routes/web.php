<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LogRequest;

Route::get('/', [HomeController::class, "show"])->name('home');

//Route::resource("/cards", CardController::class)
Route::resource("/cards", CardController::class)->middleware('auth')
    ->only(['create', 'update', 'edit', 'destroy']);

Route::resource("/cards", CardController::class)->except(['create', 'update', 'edit', 'destroy']);


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, "register"])->name('register')->middleware("guest");
    Route::post('/register', [RegisterController::class, "store"])->name('register.store');
    Route::get('/login', [LoginController::class, "login"])->name('login');
    Route::post('/login', [LoginController::class, "auth"])->name('login.auth');
});


Route::post('/logout', [LoginController::class, "logout"])->name('logout')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard')->middleware('auth');
Route::put('/profile', [ProfileController::class, "update"])->name('profile.update')->middleware('auth');
