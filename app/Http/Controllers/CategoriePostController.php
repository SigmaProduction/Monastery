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

        $list_category = Category::where('name', $category)->get();
        $category_id = $list_category[0]->id;

        $first_post = Post::orderBy('created_at', 'desc')
            ->where('category_id', $category_id)
            ->take(1)->get();

        $posts = Post::orderBy('created_at', 'desc')
                ->where('category_id', $category_id)->offset(1)->paginate(10);

        return view('post-categories', compact('first_post', 'posts', 'menu', 'category'));
    }

    public function detail_post($id, $title = null) {
        $post_detail = Post::find($id);
        $posts_relation = Post::inRandomOrder()->limit(6)->get();

        return view('post-detail', compact('post_detail', 'posts_relation'));
    }

    public function list_mega_post() {
        $first_mega_post = Post::orderBy('created_at', 'desc')
                            ->where('post_type', 1)->take(1)->get();

        $mega_posts = Post::orderBy('created_at', 'desc')->where('post_type', 1)->paginate(10);

        return view('mega', compact('first_mega_post', 'mega_posts'));
    }
}
