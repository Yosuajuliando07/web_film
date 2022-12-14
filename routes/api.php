<?php

use App\Http\Controllers\API\FilmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * WAKTU TIDAK MEMUNGKINKAN UNTUK MEMBUAT GATES DAN POLICIES
 */

Route::get('film', [FilmController::class, 'index'])->name('film.index');
Route::get('film/show/{id}', [FilmController::class, 'show'])->name('film.show');

Route::middleware(['auth:sanctum'])->group(
    function () {
        Route::post('film/store', [FilmController::class, 'store'])->name('film.store');
        Route::post('film/update/{id}', [FilmController::class, 'update'])->name('film.update');
        Route::delete('film/destroy/{id}', [FilmController::class, 'destroy'])->name('film.destroy');
    }
);
