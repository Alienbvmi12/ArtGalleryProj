<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'emailn@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make("123"),
            'user_level' => 'admin',
            'profile_photo' => null,
            'google_id' => null,
            'facebook_id' => null,
            'remember_token' => Str::random(10),
        ]);
        User::factory(10)->create();
    }
}
