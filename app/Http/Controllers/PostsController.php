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
        $slug = Str::slug($request->title, '-');
        $newImageName = uniqid() . ' -' . date('Y-m-d_H-i-s') . '-' . $slug . '-' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        // $post->image = $newImageName;
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
        $data = Post::findOrFail($slug);

        return view('blog.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:530',
        ]);
        $slug = Str::slug($request->title, '-');
        $newImageName = uniqid() . ' -' . date('Y-m-d_H-i-s') . '-' . $slug . '-' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $title = $request->title;
        $description = $request->description;
        $image_path = $newImageName;
        $slug = $slug;
        $user_id = auth()->user()->id;
        $post = Post::findOrFail($id);
        $post->title = $title;
        $post->description = $description;
        $post->image_path = $image_path;
        $post->slug = $slug;
        $post->user_id = $user_id;
        $post->save();

        return to_route('Blog.show', $post->id)->with('message', 'Post updated successfully');
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
