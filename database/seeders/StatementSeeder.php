<?php

namespace Database\Seeders;

use App\Models\Statement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //for loans
        Statement::create(['status'=>'processing']);
        Statement::create(['status'=>'approved']);
        Statement::create(['status'=>'disbursed']);
        Statement::create(['status'=>'paid']);
        Statement::create(['status'=>'expired']);

        //for payments
        Statement::create(['status'=>'successful']);
        Statement::create(['status'=>'rejected']);
    }
}
