<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'getAbout'])->name('getAbout');
Route::get('/games', [GamesController::class, 'getGames'])->name('getGames');

Route::get('/blog/all-posts', [BlogController::class, 'getBlog'])->name('getBlog');
Route::get('/blog/{slug}', [BlogController::class, 'getPost'])->name('getPost');

Route::get('/sales', [SalesController::class, 'getSales'])->name('getSales');
Route::get('/contact', [ContactController::class, 'getContact'])->name('getContact');
