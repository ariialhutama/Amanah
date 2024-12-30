<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'ADMIN ASYARI',
            'email' => 'ariialhutama@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'phone' => '0895800975006'
        ]);
    }
}
