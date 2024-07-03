<?php

namespace Database\Seeders;


use Database\Seeders\VenezuelaTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            VenezuelaTableSeeder::class,
            RolesSeeder::class,
            RepresentativeTypesSeeder::class,
            SocialMediaSeeder::class,
            UserSeeder::class,
            PersonalReferenceTypeSeeder::class,
            SchoolSeeder::class,
            LevelSeeder::class,
            StatementSeeder::class,
            CurrencySeeder::class,
            PaymentMethodSeeder::class,
        ]);
    }
}
