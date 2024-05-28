<?php

namespace Database\Seeders;

use App\Models\Category;
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
        //Membuat post dengan User secara bersamaan

        Post::factory(100)->recycle([Category::factory(3)->create(), User::factory(5)->create()])->create();
    }
}
