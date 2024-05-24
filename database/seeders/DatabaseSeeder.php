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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Post::create([
            'title' => 'Judul Artikel 1',
            'author' => 'Ryou',
            'slug' => 'judul-artikel-1',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore eius itaque aut animi temporibus ducimus, debitis cumque non fuga repellendus magni nemo. Velit dolor nisi quas nobis fuga similique unde expedita accusamus omnis, odit eaque ipsam nulla officia modi animi tempore, repellat harum? Nesciunt repudiandae saepe impedit iure. Magnam ipsum reprehenderit et reiciendis iste quaerat, accusantium ducimus ratione explicabo repellendus? Voluptatum, ratione! Expedita distinctio id debitis eligendi cupiditate neque ea a explicabo? Ab tempore repellat, corporis numquam exercitationem ducimus ipsam consequuntur, obcaecati expedita voluptates est officia nobis delectus odio officiis eum culpa reiciendis? Expedita autem obcaecati non, ex ducimus voluptas!'
        ]);

        Post::create([
            'title' => 'Judul Artikel 2',
            'author' => 'Ren',
            'slug' => 'judul-artikel-2',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi ipsum fugiat quisquam est eaque ratione distinctio quidem magni laudantium voluptas corporis rem minus ex, officiis qui maxime quia fuga hic?'
        ]);
    }
}
