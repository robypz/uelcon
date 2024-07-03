<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::create([
            'payment_method'=> 'Zelle',
            'currency_id' => 1,
        ]);

        PaymentMethod::create([
            'payment_method'=> 'Efectivo',
            'currency_id' => 1,
        ]);
    }
}
