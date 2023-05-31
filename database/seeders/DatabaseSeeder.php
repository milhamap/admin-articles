<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Repositories\AuthRepository;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new AuthRepository;
        $user->create([
            'name' => 'admin',
            'email' => 'admin@articles.com',
            'password' => 'admin123',
        ]);
    }
}
