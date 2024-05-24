<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'newGen 1.0']);
});
Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => Post::all()
    ]);
});

Route::get('post/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('authors/{user}', function (User $user) {
    return view('posts', ['title' => 'Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
