<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beliruko;
use Carbon\Carbon;

class RukoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beliruko::create([
            'Nama Ruko' => 'Ruko Asri',
            'img' => 'IMG/inspirasi1.jpeg',
            'informasi' => 'Ruko ini terletak di kawasan bebas banjir',
            'updated_at' => Carbon::now(), 
        ]);

        Beliruko::create([
            'Nama Ruko' => 'Ruko Damai',
            'img' => 'IMG/inspirasi2.jpeg',
            'informasi' => 'Ruko ini terletak di kawasan bebas banjir',
            'updated_at' => Carbon::now(), 
        ]);

        Beliruko::create([
            'Nama Ruko' => 'Ruko Bagus',
            'img' => 'IMG/inspirasi3.jpeg',
            'informasi' => 'Ruko ini terletak di kawasan bebas banjir',
            'updated_at' => Carbon::now(), 
        ]);
    }
}
