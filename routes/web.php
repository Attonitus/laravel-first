<?php

use App\Http\Controllers\BookmarkController;
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
Route::get('/cards/search', [CardController::class, "search"])->name('cards.search');
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

Route::middleware('auth')->group(function () {
    Route::get('/bookmarks', [BookmarkController::class, "index"])->name('bookmarks.index');
    Route::post('/bookmarks/{card}', [BookmarkController::class, "store"])->name('bookmarks.store');
    Route::delete('/bookmarks/{card}', [BookmarkController::class, "destroy"])->name('bookmarks.destroy');
});
