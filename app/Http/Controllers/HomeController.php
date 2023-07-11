<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
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
