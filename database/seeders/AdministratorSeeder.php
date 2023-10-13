<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'Administrator@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'Administrator',
            'status' => true,
            'email_verified_at' => now(),
        ]);
    }
}
