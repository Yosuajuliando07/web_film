<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalTayangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i < 100; $i++) {
            $collection = collect(Film::pluck('id'));

            DB::table('jadwal_tayang')->insert([
                'film_id' => $collection->random(),
                'jadwal_id' => $i,
            ]);
        }
    }
}
