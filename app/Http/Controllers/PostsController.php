<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();

        return view('blog.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate(
            [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required|max:255',
                'description' => 'required|max:530',
            ],
            [
                'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
                'title.required' => 'The title field is required.',
                'title.max' => 'The title may not be greater than 255 characters.',
                'description.required' => 'The description field is required.',
                'description.max' => 'The description may not be greater than 530 characters.',
            ],
        );

        // Generate a slug for the title
        $slug = Str::slug($request->title, '-');

        // Generate a unique image name based on current timestamp
        $newImageName = uniqid() . '-' . now()->format('Y-m-d_H-i-s') . '-' . $slug . '.' . $request->image->extension();

        // Move the uploaded image to the public/images directory
        $request->image->move(public_path('images'), $newImageName);

        // Create a new Post instance and save it to the database
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = $slug;
        $post->image_path = $newImageName;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/Blog')->with('messageYes', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $post = Post::findOrFail($slug);
        return view('blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'image' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:530',
        ]);

        // Generate a slug for the title
        $slug = Str::slug($request->title, '-');

        // Generate a unique image name based on current timestamp
        $newImageName = uniqid() . '-' . now()->format('Y-m-d_H-i-s') . '-' . $slug . '.' . $request->image->extension();

        // Move the uploaded image to the public/images directory
        $request->image->move(public_path('images'), $newImageName);

        // Update the post in the database
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image_path = $newImageName;
        $post->slug = $slug;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()
            ->route('Blog.show', $post->id)
            ->with('message', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/Blog')->with('message', 'Post deleted successfully');
    }
}
