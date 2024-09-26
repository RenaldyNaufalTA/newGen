<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPost()
    {
        $posts = Post::filter(request(['search', 'category', 'author']))->latest()->paginate(10)->withQueryString();

        if (request('category')) {
            if ($posts->isNotEmpty()) {
                $title = 'All Posts in category "' . $posts[0]->category->name . '"';
            }
        } else if (request('author')) {
            if ($posts->isNotEmpty()) {
                $title = 'All Posts by "' . $posts[0]->author->name . '"';
            }
        } else {
            $title = 'All Post';
        }

        return view('posts', [
            'title' => $title,
            'posts' => $posts
        ]);
    }

    public function singlePost(Post $post)
    {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    }
}
