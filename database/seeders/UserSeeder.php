<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'root@uelcon.com',
            'password' => bcrypt('root'),
        ]);

        $user->assignRole('root');

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@uelcon.com',
            'password' => bcrypt('admin'),
        ]);

        $user->assignRole('admin');

        $user = User::create([
            'name' => 'admin',
            'email' => 'client@uelcon.com',
            'password' => bcrypt('client'),
        ]);

        $user->assignRole('client');
    }
}
