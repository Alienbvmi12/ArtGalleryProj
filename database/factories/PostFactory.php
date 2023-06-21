<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand = mt_rand(2, 11);
        return [
            'slug' => fake()->slug(),
            'cover_image' => 'https://picsum.photos/'.rand(300, 1000).'/'.rand(300, 1000).'?nocache='.microtime(),
            'title' => fake()->sentence(mt_rand(2, 8)),
            'excerpt' => fake()->paragraph(),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 20)))->map(function($p){
                return "<p>$p</p>";
            })->implode(''),
            'user_id' => $rand,
            'album_id' => $rand
        ];
    }

}
