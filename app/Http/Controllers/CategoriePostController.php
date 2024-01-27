<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class CategoriePostController extends Controller
{
    public function list_post_all() {
        $first_post = Post::orderBy('created_at', 'desc')
            ->where('is_hide', 0)
            ->where('post_type', '!=' , 1)
            ->take(1)->get();

        $posts = Post::orderBy('created_at', 'desc')
                ->where('is_hide', 0)
                ->where('post_type', '!=' , 1)
                ->offset(1)->paginate(12);

        return view('posts.post-all', compact('first_post', 'posts'));
    }

    public function list_post_menu($menu = null) {

        $menu_id = Menu::where('name', $menu)->first()->id;
        $menu_image = Menu::find($menu_id)->image;

        $first_post = Post::orderBy('created_at', 'desc')
            ->where('is_hide', 0)
            ->where('menu_id', $menu_id)
            ->take(1)->get();

        $posts = Post::orderBy('created_at', 'desc')
                ->where('is_hide', 0)
                ->where('menu_id', $menu_id)->offset(1)->paginate(12);

        return view('posts.post-menus', compact('first_post', 'posts', 'menu', 'menu_image'));
    }

    public function list_post_category($menu = null, $category = null) {

        $category_id = Category::where('name', $category)->first()->id;
        $menu_image = Menu::where('name', $menu)->first()->image;

        $first_post = Post::orderBy('created_at', 'desc')
            ->where('is_hide', 0)
            ->where('category_id', $category_id)
            ->take(1)->get();

        $posts = Post::orderBy('created_at', 'desc')
                ->where('is_hide', 0)
                ->where('category_id', $category_id)->offset(1)->paginate(12);

        return view('posts.post-categories', compact('first_post', 'posts', 'menu', 'menu_image', 'category'));
    }

    public function detail_post($id, $title = null) {
        $post_detail = Post::find($id);
        $posts_relation = Post::where('menu_id', $post_detail->menu_id)->where('post_type', 0)->where('is_hide', 0)->limit(6)->get(); //random thuộc trong cùng menu lớn
        $post_relation_postcard = Post::where('post_type', 3)->where('is_hide', 0)->limit(6)->get();
        $post_relation_pdf = Post::where('post_type', 4)->where('is_hide', 0)->limit(6)->get();

        return view('posts.post-detail', compact('post_detail', 'posts_relation', 'post_relation_postcard', 'post_relation_pdf'));
    }

    public function list_mega_post() {
        $first_mega_post = Post::orderBy('created_at', 'desc')
                            ->where('is_hide', 0)
                            ->where('post_type', 1)->take(1)->get();

        $mega_posts = Post::orderBy('created_at', 'desc')->where('is_hide', 0)->where('post_type', 1)->paginate(12);

        return view('posts.mega', compact('first_mega_post', 'mega_posts'));
    }

    public function detail_mega($id, $title = null) {
        $mega_detail = Post::find($id);
        $megas_relation = Post::inRandomOrder()->where('post_type', 1)->where('is_hide', 0)->limit(6)->get();

        return view('posts.mega-detail', compact('mega_detail', 'megas_relation'));
    }
}
