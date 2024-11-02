<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CinemaController;
use Illuminate\Support\Facades\Route;



Route::get('/', [MovieController::class, 'show_home'])->name('home');
Route::get('/nowshowing', [MovieController::class, 'show_now_showing'])->name('now_showing');
Route::get('/movie_detail/{id}', [MovieController::class, 'show_movie_details'])->name('movie_detail');
Route::get('/cinema', [CinemaController::class, 'show_cinemas'])->name('cinema');
Route::get('/login', [AuthController::class, 'render_login'])->name('login-page');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
