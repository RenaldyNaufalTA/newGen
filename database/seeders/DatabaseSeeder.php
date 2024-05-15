<?php

namespace Database\Seeders;

use App\Models\Post;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Post::create([
            'title' => 'Judul Artikel 2',
            'slug' => 'judul-artikel-2',
            'author' => 'Ren',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi ipsum fugiat quisquam est eaque ratione distinctio quidem magni laudantium voluptas corporis rem minus ex, officiis qui maxime quia fuga hic?'
        ]);
    }
}
