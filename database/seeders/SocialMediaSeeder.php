<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create(['name' => 'Facebook']);
        SocialMedia::create(['name' => 'Instagram']);
        SocialMedia::create(['name' => 'Tiktok']);
    }
}
