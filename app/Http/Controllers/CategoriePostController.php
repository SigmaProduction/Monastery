<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\ImageSlider;
use App\Models\Post;
use App\Models\AboutUs;
use App\Models\SalediengMonth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class CategoriePostController extends Controller
{
    public function index($menu = null, $categories = null) {
        // next step post brand
        $post = Post::all();

        return view('categories', compact('post'));
    }
}
