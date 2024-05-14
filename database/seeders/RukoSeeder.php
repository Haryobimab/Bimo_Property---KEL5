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
            'nama_ruko' => 'Ruko Asri',
            'img' => 'inspirasi1.jpeg',
            'informasi' => 'Ruko ini terletak di kawasan bebas banjir',
            'updated_at' => Carbon::now(), 
        ]);

        Beliruko::create([
            'nama_ruko' => 'Ruko Damai',
            'img' => 'inspirasi2.jpeg',
            'informasi' => 'Ruko ini terletak di kawasan bebas banjir',
            'updated_at' => Carbon::now(), 
        ]);

        Beliruko::create([
            'nama_ruko' => 'Ruko Bagus',
            'img' => 'inspirasi3.jpeg',
            'informasi' => 'Ruko ini terletak di kawasan bebas banjir',
            'updated_at' => Carbon::now(), 
        ]);

        Beliruko::create([
            'nama_ruko' => 'Ruko Bagus',
            'img' => 'inspirasi3.jpeg',
            'informasi' => 'Ruko ini terletak di kawasan bebas banjir',
            'updated_at' => Carbon::now(), 
        ]);

        Beliruko::create([
            'nama_ruko' => 'Ruko Bagus',
            'img' => 'inspirasi3.jpeg',
            'informasi' => 'Ruko ini terletak di kawasan bebas banjir',
            'updated_at' => Carbon::now(), 
        ]);
    }
}

