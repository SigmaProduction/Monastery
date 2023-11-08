<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\SalediengFamily;
use App\Models\SalediengMonth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SalediengController extends Controller
{
    public function index($id = null) {
        $saledieng_family_name = SalediengFamily::find($id)->name;
        $first_saledieng_post = Post::orderBy('created_at', 'desc')
                        ->whereNotNull('saledieng_family_id')
                        ->where('saledieng_family_id', $id)
                        ->take(1)->get();

        $saledieng_posts = Post::orderBy('created_at', 'desc')
                    ->where('saledieng_family_id', $id)->offset(1)->paginate(10);

        return view('saledieng', compact('saledieng_family_name','first_saledieng_post','saledieng_posts'));
    }
}
