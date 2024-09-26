<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'newGen 1.0']);
});
Route::get('posts', [PostController::class, 'allPost'])->name('all-post');
Route::get('post/{post:slug}', [PostController::class, 'singlePost'])->name('single-post');

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard'
    ]);
});

Route::resource('/mypost', DashboardPostController::class);

Route::get('login', [AuthController::class, 'login_form'])->name('login-form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register_form'])->name('register-form');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
