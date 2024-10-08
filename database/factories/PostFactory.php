<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
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
        return [
            'title' => fake()->sentence(4),
            'author_id' => User::factory(),
            'category_id' => mt_rand(1, 5),
            'slug' => Str::slug(fake()->sentence()),
            'excerpt' => Str::limit(strip_tags(fake()->text()), 200),
            'body' => fake()->text()
        ];
    }
}
