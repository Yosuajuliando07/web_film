<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 6; $i++) {
            Film::create([
                'image' => 'image' . $i . '.jpg',
                'trailer' => 'http://localhost:8000/trailer' . $i,
                'judul' => 'Judul-' . $i,
                'deskripsi' => 'Deskripsi-' . $i,
                'tahun' => 2022,
            ]);
        }
    }
}
