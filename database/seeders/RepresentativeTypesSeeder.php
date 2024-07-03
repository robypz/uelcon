<?php

namespace Database\Seeders;

use App\Models\RepresentativeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepresentativeTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RepresentativeType::create(['representative_type' => 'Padre']);
        RepresentativeType::create(['representative_type' => 'Madre']);
        RepresentativeType::create(['representative_type' => 'Tutor Legal']);
    }
}
