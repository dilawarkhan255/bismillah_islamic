<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = User::create([
            'name'              => 'Admin',
            'email'             => 'admin@bismillahacademy.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        // Editor
        $editor = User::create([
            'name'              => 'Editor',
            'email'             => 'editor@bismillahacademy.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
        ]);
        $editor->assignRole('editor');

        // Test users
        for ($i = 1; $i <= 3; $i++) {
            $user = User::create([
                'name'              => "User $i",
                'email'             => "user{$i}@example.com",
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
            ]);
            $user->assignRole('user');
        }
    }
}
