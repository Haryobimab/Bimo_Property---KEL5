<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BeritaModel;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beritamodel::create([
            'page' => 'Rumah Impian Zaman Sekarang',
            'title' => 'Trend dan Tips Terbaru pada Property',
            'body' => '<h3>Trend dan Tips Terbaru pada Property</h3><h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h2><ul><li>Neque sodales ut etiam sit amet nisl purus non tellus orci ac auctor</li><li>Neque sodales ut etiam sit amet nisl purus non tellus orci ac auctor</li><li>Neque sodales ut etiam sit amet nisl purus non tellus orci ac auctor</li></ul>',
        ]);
    }
}
