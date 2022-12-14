<?php

use App\Http\Livewire\Backend\Dashboard;

use App\Http\Livewire\Frontend\Homepage;
use App\Http\Livewire\Backend\Film\Create;
use App\Http\Livewire\Backend\Film\Index;
use App\Http\Livewire\Frontend\DetailFilm;
use App\Http\Livewire\Frontend\Scrp\Detail;
use App\Http\Livewire\Frontend\Scrp\Main;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', Homepage::class)->name('homepage');
Route::get('/film/{judul}', DetailFilm::class)->name('film.detail');

Route::get('/scrp', Main::class)->name('scrp');
Route::get('/scrp/{url}', Detail::class)->name('scrp.detail');
Auth::routes();
// Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['admin']], function () {

// });

Route::middleware(['admin'])->group(
    function () {
        Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
        Route::get('admin-film-index', Index::class)->name('admin.film.index');
        Route::get('admin-film-create', Create::class)->name('admin.film.create');
    }
);
