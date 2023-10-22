<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class CategoriePostController extends Controller
{
    public function list_post_category($menu = null, $category = null) {

        $category_id = Category::where('name', $category)->first()->id;

        $first_post = Post::orderBy('created_at', 'desc')
            ->where('category_id', $category_id)
            ->take(1)->get();

        $posts = Post::orderBy('created_at', 'desc')
                ->where('category_id', $category_id)->offset(1)->paginate(10);

        return view('posts.post-categories', compact('first_post', 'posts', 'menu', 'category'));
    }

    public function detail_post($id, $title = null) {
        $post_detail = Post::find($id);
        $posts_relation = Post::inRandomOrder()->limit(6)->get();

        return view('posts.post-detail', compact('post_detail', 'posts_relation'));
    }

    public function list_mega_post() {
        $first_mega_post = Post::orderBy('created_at', 'desc')
                            ->where('post_type', 1)->take(1)->get();

        $mega_posts = Post::orderBy('created_at', 'desc')->where('post_type', 1)->paginate(10);

        return view('posts.mega', compact('first_mega_post', 'mega_posts'));
    }

    public function detail_mega($id, $title = null) {
        $mega_detail = Post::find($id);
        $megas_relation = Post::inRandomOrder()->where('post_type', 1)->limit(6)->get();

        return view('posts.mega-detail', compact('mega_detail', 'megas_relation'));
    }
}
