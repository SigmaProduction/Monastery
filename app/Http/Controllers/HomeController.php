<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\ImageSlider;
use App\Models\Post;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\SalediengMonth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $image_sliders = ImageSlider::where('image_type', 1)
                        ->get();

        $image_galleries = ImageSlider::where('image_type', 2)
                        ->get();
        
        $about_us = AboutUs::limit(1)->get();

        $first_post = Post::orderBy('created_at', 'desc')
                        ->where('post_type', 0)
                        ->take(1)->get();

        $new_posts = Post::orderBy('created_at', 'desc')
                        ->where('post_type', 0)
                        ->offset(1)->limit(4)
                        ->get();
        
        $mega_posts = Post::orderBy('created_at', 'desc')
                        ->where('post_type', 1)
                        ->limit(2)
                        ->get();
        
        $first_video_post = Post::orderBy('created_at', 'desc')
                            ->whereNotNull('post_type')
                            ->where('post_type', 2)
                            ->take(1)->get();

        $video_posts = Post::orderBy('created_at', 'desc')
                        ->where('post_type', 2)
                        ->offset(1)->limit(3)
                        ->get();
        
        $podcast_posts = Post::orderBy('created_at', 'desc')
                        ->where('post_type', 3)
                        ->limit(2)
                        ->get();

        $saledieng_months = SalediengMonth::all();

        $categories_important = Category::where('is_important', 0)->get();
        
        return view('welcome',compact(
            'image_sliders', 
            'image_galleries',
            'first_post',
            'new_posts',
            'mega_posts',
            'first_video_post',
            'video_posts',
            'podcast_posts',
            'about_us',
            'saledieng_months',
            'categories_important'
        ));
    }

    public function introduce()
    {
        return view('introduce');
    }

    public function support()
    {
        return view('support');
    }

    public function donate()
    {
        return view('donate');
    }
}
