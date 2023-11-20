<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::create([
            'name' 		=> 'admin',
            'email' 	=> 'admin@example.com',
            'password' 	=> Hash::make('admin12345678'),
            'role'		=> "admin",
        ]);

		\App\Models\User::create([
            'name' 		=> 'user',
            'email' 	=> 'user@example.com',
            'password' 	=> Hash::make('user12345678'),
            'role'		=> "user",
        ]);
    }
}
