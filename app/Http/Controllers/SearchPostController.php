<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SearchPostController extends Controller
{
    public function search_post(Request $request) {
        $query = Post::query();
        $post = new Post();

        if ($request->get('search')) {
            $query->where('title', 'like', '%' . $request->get('search') . '%');
        }

        $query->orderBy('created_at', 'desc')->where('is_hide', 0);
        $posts = $query->paginate(12);
        
        return view('posts.post-search', compact('posts'));
    }
}
