<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);

        Category::create([
            'name' => 'Design',
            'slug' => 'design',
            'color' => 'sky'
        ]);
        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
            'color' => 'red'
        ]);
        Category::create([
            'name' => 'Gadget',
            'slug' => 'gadget',
            'color' => 'lime'
        ]);
        Category::create([
            'name' => 'Tech',
            'slug' => 'tech',
            'color' => 'blue'
        ]);
        Category::create([
            'name' => 'Slice of Life',
            'slug' => 'slice-of-life',
            'color' => 'teal'
        ]);

        //Membuat post dengan User secara bersamaan
        Post::factory(100)->recycle(User::factory(5)->create())->create();
    }
}
