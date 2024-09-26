<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'title' => 'My Posts'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Create Post',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|min:6|max:255',
            'slug' => 'required|string|unique:posts,slug|min:6|max:255',
            'category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'body' => 'required|string',
        ]);

        // Handle the file upload if present
        if ($request->hasFile('image')) {
            $path = storage_path('app/public/images');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('image');
            $name = time() . str_replace(['+', ' ', ',', '*'], ['_', '_',], $file->getClientOriginalName());

            $file->move($path, $name);
            $validatedData['image'] = $path;
        }

        // Create a new post with the validated data
        Post::create([
            'title' => $request->title,
            'author_id' => auth()->user()->id,
            'category_id' => $request->category,
            'slug' => $request->slug,
            'image' => $name,
            'excerpt' => Str::limit(strip_tags($request->body), 200),
            'body' => $request->body
        ], $validatedData);

        // Redirect to a specific route with a success message
        return redirect()->route('mypost.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
