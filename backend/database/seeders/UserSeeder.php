<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Number;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Justine Dacocos',
        //     'email' => 'jay@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 1,
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        // ]);

        User::create([
            'name' => 'Sam Besa',
            'email' => 'sam@example.com',
            'password' => Hash::make('password'),
            'contact' => fake()->phoneNumber(),
            'role' => 2,
            'profession' => 'Cardiologist',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Ivan Almonte',
            'email' => 'ivan@example.com',
            'password' => Hash::make('password'),
            'contact' => fake()->phoneNumber(),
            'role' => 2,
            'profession' => 'Dermatologist',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Lawrence Balderama',
            'email' => 'lawrence@example.com',
            'password' => Hash::make('password'),
            'contact' => fake()->phoneNumber(),
            'role' => 3,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Jeremiah Custodio',
            'email' => 'jeremiah@example.com',
            'password' => Hash::make('password'),
            'contact' => fake()->phoneNumber(),
            'role' => 2,
            'profession' => 'Opthalmologist',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Arnold Carillo',
            'email' => 'arnold@example.com',
            'password' => Hash::make('password'),
            'contact' => fake()->phoneNumber(),
            'role' => 2,
            'profession' => 'Dermatologist',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Michael Lee ',
            'email' => 'michael@example.com',
            'password' => Hash::make('password'),
            'contact' => fake()->phoneNumber(),
            'role' => 2,
            'profession' => 'ENT',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Sarah Garcia',
            'email' => 'sarah@example.com',
            'password' => Hash::make('password'),
            'contact' => fake()->phoneNumber(),
            'role' => 2,
            'profession' => 'Neurologist',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Daniel Young',
            'email' => 'daniel@example.com',
            'password' => Hash::make('password'),
            'contact' => fake()->phoneNumber(),
            'role' => 3,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'David Hernandez',
            'email' => 'david@example.com',
            'password' => Hash::make('password'), 
            'contact' => fake()->phoneNumber(),
            'role' => 3,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'), 
            'contact' => fake()->phoneNumber(),
            'role' => 3,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'password' => Hash::make('password'), 
            'contact' => fake()->phoneNumber(),
            'role' => 3,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Lily Roxas',
            'email' => 'lily@example.com',
            'password' => Hash::make('password'),
            'contact' => fake()->phoneNumber(),
            'role' => 3,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
