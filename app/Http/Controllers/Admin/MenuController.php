<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;



class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate(10);
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('menus')->ignore($request->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $menu = Menu::create($request->only('name'));

        return redirect('/admin/menus')->with('success', 'Menu created successfully.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('menus')->ignore($request->id),
            ],
        ]);

        $menu = Menu::findOrFail($id);
        $menu->name = $request->input('name');

        if ($menu->save()) {
            return redirect('/admin/menus')->with('success', 'Menu updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update menu.')->withInput();
        }
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect('/admin/menus')->with('success', 'Menu deleted successfully.');
    }
}
