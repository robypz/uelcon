<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create(['name' => 'Plata','increase' => 0]);
        Level::create(['name' => 'Oro','increase' => 5]);
        Level::create(['name' => 'Diamante','increase' => 10]);
    }
}
