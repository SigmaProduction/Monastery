<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use File;



class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('order')->get();
        return view('admin.menus.index', [
            "menus" => $menus
        ]);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $validatedData = $validator->validated();
        $menu = new Menu($validatedData);

        $menu->order = Menu::max('order') + 1; // Assign the last order value + 1

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time().'.'.$file->extension();
            $imagePath = 'image/menu_images/' . $imageName;

            $file->move(public_path('image/menu_images/'), $imageName);
            
            $menuImage = new MenuImage();
            $menuImage->image_path = $imagePath;
            $menuImage->menu_id = $menu->id;
            $menuImage->save();
            $menu->image = $imagePath;
        }
        $menu->save();

        return redirect('/admin/menus')->with('success', 'Menu created successfully.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $categories = $menu->categories()->orderBy('order')->get();

        return view('admin.menus.edit',  [
            "menu" => $menu,
            "categories" => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('menus')->ignore($request->id),
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        $menu = Menu::findOrFail($id);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time().'.'.$file->extension();
            $imagePath = 'image/menu_images/' . $imageName;

            $file->move(public_path('image/menu_images/'), $imageName);

            $validatedData['image'] = $imagePath;
        }

        $menu->update($validatedData);

        if ($menu->save()) {
            // Update the order of categories
            $categoryOrder = json_decode($request->input('category_order'));

            if (!empty($categoryOrder)) {
                foreach ($categoryOrder as $index => $categoryId) {
                    $category = Category::find($categoryId);
                    if ($category) {
                        $category->order = $index + 1; // Assuming the order starts from 1
                        $category->save();
                    }
                }
            }

            return redirect('/admin/menus')->with('success', 'Menu updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update menu.')->withInput();
        }
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // Remove menu_id from categories association
        $menu->categories()->update(['menu_id' => null]);

        if ($menu->categories()->count() > 0) {
            return redirect('/admin/menus')->with('error', 'Cannot archive menu that has categories.');
        }

        File::delete(public_path($menu->image));
        // Archive the menu
        $menu->delete();

        return redirect('/admin/menus')->with('success', 'Menu archived successfully.');
    }

    public function updateOrder(Request $request)
    {
        $menuOrder = $request->input('menu');

        foreach ($menuOrder as $index => $menuId) {
            $menu = Menu::findOrFail($menuId);
            $menu->order = $index + 1;
            $menu->save();
        }

        return response()->json(['success' => true]);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'menu_id' => 'required|integer|exists:about_us,id',
        ]);

        $menuId = $request->menu_id;
        $imageName = time().'.'.$request->image->extension();
        $imagePath = 'images/menu/' . $menuId . '/' . $imageName;

        $request->image->move(public_path('images/menu/' . $menuId), $imageName);

        // Store image details in the database
        $menuImage = MenuImage::create([
            'menu_id' => $menuId,
            'image_path' => $imagePath,
        ]);

        // Return the image URL with the 'public' segment
        $imageUrl = asset($menuImage->image_path);

        return response()->json(['url' => $imageUrl]);
    }
}
