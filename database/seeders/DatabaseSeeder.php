<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Album;
use App\Models\User;
use App\Models\Post;
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
        Post::factory(10)->create();

        for($i = 1; $i < 12; $i++){
            Album::create([
                'title' => fake()->sentence(mt_rand(2, 8)),
                'subtitle' => fake()->paragraph(),
                'cover_image' => 'https://picsum.photos/'.rand(300, 1000).'/'.rand(300, 1000).'?nocache='.microtime(),
                'privacy' => 'public',
                'user_id' => $i
            ]);
        }
    }
}
