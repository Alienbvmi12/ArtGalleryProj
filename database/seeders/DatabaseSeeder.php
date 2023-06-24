<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Helper\Helper;
use App\Models\Album;
use App\Models\Biodata;
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
            'username' => 'Admin',
            'email' => 'emailn@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make("123"),
            'user_level' => 'admin',
            'profile_photo' => null,
            'google_id' => null,
            'facebook_id' => null,
            'github_id' => null,
            'gitlab_id' => null,
            'remember_token' => Str::random(10),
        ]);
        User::factory(10)->create();
        Post::factory(10)->create();

        for ($i = 1; $i < 12; $i++) {
            Album::create([
                'title' => 'Main',
                'subtitle' => fake()->paragraph(),
                'cover_image' => 'https://picsum.photos/' . rand(300, 1000) . '/' . rand(300, 1000) . '?nocache=' . microtime(),
                'privacy' => 'public',
                'user_id' => $i
            ]);
        }

        for ($i = 1; $i <= 11; $i++) {
            Biodata::create([
                'user_id' => $i,
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'gender' => null,
                'born' => fake()->date(),
                'country' => Helper::getCountry(),
                'hobby' => Helper::getHobby(),
                'descriptions' => collect(fake()->paragraphs(mt_rand(5, 20)))->map(function ($p) {
                    return "<p>$p</p>";
                })->implode(''),
            ]);
        }
    }
}
