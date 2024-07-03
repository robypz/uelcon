<?php

namespace Database\Seeders;

use App\Models\PersonalReferenceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalReferenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersonalReferenceType::create(['name' => 'Familiar']);
        PersonalReferenceType::create(['name' => 'Amigo dentro del colegio']);
    }
}
