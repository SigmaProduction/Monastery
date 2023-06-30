<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $post = new Post();
        $postTypes = $post->postTypes;

        return view('admin.posts.create', compact('categories', 'postTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'user_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'is_hide' => 'nullable|boolean',
            'is_important' => 'nullable|boolean',
            'image' => 'nullable|string',
            'post_type' => 'nullable|integer',
        ]);

        $request->merge(['user_id' => Auth::id()]);
        Post::create($validatedData);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'user_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'is_hide' => 'nullable|boolean',
            'is_important' => 'nullable|boolean',
            'image' => 'nullable|string',
            'post_type' => 'nullable|integer',
        ]);

        $post->update($validatedData);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
