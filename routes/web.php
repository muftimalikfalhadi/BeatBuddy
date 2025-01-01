<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NextUpController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlayerController;

// Route::get('/', function () {
//     //return view('welcome');
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nextup', [NextUpController::class, 'index'])->name('nextup');
Route::get('/show', [NextUpController::class, 'show'])->name('nextup');
Route::get('/music', [MusicController::class, 'index'])->name('music');
Route::get('/player', [PlayerController::class, 'index'])->name('player');

