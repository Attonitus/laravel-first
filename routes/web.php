<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, "show"])->name('home');

Route::resource("/cards", CardController::class);

Route::get('/register', [RegisterController::class, "register"])->name('register');
Route::post('/register', [RegisterController::class, "store"])->name('register.store');

Route::get('/login', [LoginController::class, "login"])->name('login');
Route::post('/login', [LoginController::class, "auth"])->name('login.auth');

Route::post('/logout', [LoginController::class, "logout"])->name('logout');
