<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');

Route::get('/api/movies', [MovieController::class, 'search'])->name('movies.search');
