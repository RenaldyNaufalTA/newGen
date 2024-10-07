<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('author_id', auth()->user()->id)->latest()->paginate(10);

        // Path to the public/storage directory
        $storageLinkPath = public_path('storage');

        // Check if the symbolic link exists
        if (!File::exists($storageLinkPath)) {
            Artisan::call('storage:link');
        }

        return view('dashboard.posts.index', [
            'title' => 'My Posts',
            'posts' => $posts
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
            'body' => nl2br($request->body)
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
    public function edit(string $slug)
    {
        $post = Post::firstWhere('slug', $slug);

        // Use storage_path to get the absolute path to the image
        $imagePath = storage_path('app/public/images/' . $post->image);

        // Check if the image exists and get the file size
        if (file_exists($imagePath) ? $fileSize = filesize($imagePath) : $fileSize = 0)

            return view('dashboard.posts.edit', [
                'title' => 'Edit Post',
                'post' => $post,
                'fileSize' => $fileSize,
                'categories' => Category::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $body = nl2br($request->body);
        $body1 = $request->body;
        dd($body, $body1);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
