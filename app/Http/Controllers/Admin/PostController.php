<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();
        $post = new Post();
        $postTypes = $post->postTypes;
        $query->whereNotNull('category_id');

        if ($request->get('search')) {
            $query->where('title', 'like', '%' . $request->get('search') . '%');
        }

        if ($request->get('category_id')) {
            $query->where('category_id', $request->get('category_id'));
        }

        if ($request->get('post_type') != null) {
            $query->where('post_type', $request->get('post_type'));
        }

        $query->orderBy('created_at', 'desc');
        $posts = $query->paginate(10);
        $categories = Category::all();
        return view('admin.posts.index', compact('posts', 'categories', 'postTypes'));
    }

    public function archived_posts(Request $request)
    {
        $query = Post::query();
        $post = new Post();
        $postTypes = $post->postTypes;

        $query->where('category_id', null);

        if ($request->get('search')) {
            $query->where('title', 'like', '%' . $request->get('search') . '%');
        }

        if ($request->get('post_type') != null) {
            $query->where('post_type', $request->get('post_type'));
        }

        $query->orderBy('created_at', 'desc');
        $posts = $query->paginate(10);
        return view('admin.posts.archived_posts', compact('posts', 'postTypes'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'user_id' => 'nullable|integer',
            'category_id' => 'required|integer',
            'description' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:10000',
            'is_hide' => 'nullable|boolean',
            'is_important' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_type' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $post = new Post($validatedData);
        $post->user_id = Auth::id();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time().'.'.$file->extension();
            $imagePath = 'image/post_images/' . $post->id . '/' . $imageName;

            $file->move(public_path('image/post_images/' . $post->id), $imageName);

            $postImage = new PostImage();
            $postImage->image_path = $imagePath;
            $postImage->post_id = $post->id;
            $postImage->save();
            $post->image = $imagePath;
        }
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }


    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        $postTypes = $post->postTypes;

        return view('admin.posts.edit', compact('post', 'categories', 'postTypes'));
    }

    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'category_id' => 'required|integer',
            'category_id' => 'nullable|integer',
            'description' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:10000',
            'is_hide' => 'nullable|boolean',
            'is_important' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_type' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time().'.'.$file->extension();
            $imagePath = 'image/post_images/' . $post->id . '/' . $imageName;

            $file->move(public_path('image/post_images/' . $post->id), $imageName);

            $validatedData['image'] = $imagePath;
        }

        $post->update($validatedData);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }


    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.archived_posts')->with('success', 'Post deleted successfully.');
    }

    public function archive(Post $post)
    {
        // Set category_id to null for all associated posts
        $post->update(['category_id' => null]);

        return redirect()->route('admin.posts.archived_posts')->with('success', 'Post archived successfully.');
    }

    public function uploadEditorImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time().'.'.$file->extension();
            $imagePath = 'image/post_images/' . $imageName;

            $file->move(public_path('image/post_images'), $imageName);

            return response()->json(['location' => asset($imagePath)], 200);
        } else {
            return response()->json(['error' => 'No image uploaded'], 400);
        }
    }
}
