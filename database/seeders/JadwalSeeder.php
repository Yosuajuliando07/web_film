<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 100; $i++) {
            $start = Carbon::parse('2022-12-01 00:00:00');
            $end = Carbon::parse('2022-12-31 23:59:59');
            $randomDate[$i] = Carbon::createFromTimestamp(
                rand($start->timestamp, $end->timestamp)
            )->format('Y-m-d H:i:s');

            Jadwal::create([
                'waktu_penayangan' => $randomDate[$i]
            ]);
        }
    }
}
