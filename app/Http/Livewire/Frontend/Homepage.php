<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Film;
use App\Models\Jadwal;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Homepage extends Component
{
    public function render()
    {
        /**
         * Query Builder
         */
        $now = Carbon::now();
        $dataFilm = DB::table('jadwal_tayang')
            ->join('jadwal', 'jadwal.id', '=', 'jadwal_tayang.jadwal_id')
            ->join('film', 'film.id', '=', 'jadwal_tayang.film_id')
            ->where('jadwal.waktu_penayangan', '>', $now)
            ->inRandomOrder()->take(8)->get();

        $oldDataFilm = DB::table('jadwal_tayang')
            ->join('jadwal', 'jadwal.id', '=', 'jadwal_tayang.jadwal_id')
            ->join('film', 'film.id', '=', 'jadwal_tayang.film_id')
            ->where('jadwal.waktu_penayangan', '<', $now)
            ->inRandomOrder()->take(8)->get();

        return view('livewire.frontend.homepage', [
            'dataFilm' => $dataFilm,
            'oldDataFilm' => $oldDataFilm,
        ])->layout('livewire.frontend.layouts.app', ['title' => 'Selamat Datang']);
    }
}
