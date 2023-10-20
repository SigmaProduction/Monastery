<?php

namespace App\Services;
use App\Models\Menu;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class MenuService
{
    public function getMenus() {
        $menus = Menu::orderBy('order')->limit(6)->get();
        return $menus;
    }
}
