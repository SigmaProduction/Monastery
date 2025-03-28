<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();

        // Get categories have menu_id is not null. categories which have menu_id null in archived list
        $query->whereNotNull('menu_id');
        if ($request->get('search')) {
            $query->where('name', 'like', '%' . $request->get('search') . '%');
        }

        if ($request->get('menu_id')) {
            $query->where('menu_id', $request->get('menu_id'));
        }

        $query->orderBy('created_at', 'desc');
        $categories = $query->paginate(10);
        $menus = Menu::all();
        return view('admin.categories.index', compact('categories', 'menus'));
    }

    public function archived_categories(Request $request)
    {
        $query = Category::query();

        // Get categories have menu_id is null. categories which have menu_id not null in categories list
        $query->where('menu_id', null);

        if ($request->get('search')) {
            $query->where('name', 'like', '%' . $request->get('search') . '%');
        }

        $query->orderBy('created_at', 'desc');
        $categories = $query->paginate(10);
        $menus = Menu::all();
        return view('admin.categories.archived_categories', compact('categories', 'menus'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.categories.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request) {
                    $menuId = $request->input('menu_id');

                    $count = Category::where('name', $value)
                        ->where('menu_id', $menuId)
                        ->count();

                    if ($count > 0) {
                        $fail('The combination of name and menu already exists.');
                    }
                },
            ],
            'menu_id' => 'required|exists:menus,id',
            'meta_content' => 'required|string|max:255',
            'is_important' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $menuId = $request->input('menu_id');
        $maxOrder = Category::where('menu_id', $menuId)->max('order');
        $order = $maxOrder ? $maxOrder + 1 : 1;

        $categoryData = $request->all();
        $categoryData['order'] = $order;

        Category::create($categoryData);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $menus = Menu::all();
        return view('admin.categories.edit', compact('category', 'menus'));
    }

    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request, $id) {
                    $menuId = $request->input('menu_id');

                    $count = Category::where('name', $value)
                        ->where('menu_id', $menuId)
                        ->where('id', '!=', $id) // Exclude the current category from the check
                        ->count();

                    if ($count > 0) {
                        $fail('The combination of name and menu already exists.');
                    }
                },
            ],
            'menu_id' => 'required|exists:menus,id',
            'meta_content' => 'required|string|max:255',
            'is_important' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $menuId = $request->input('menu_id');
        $maxOrder = Category::where('menu_id', $menuId)->max('order');
        $order = $maxOrder ? $maxOrder + 1 : 1;

        $categoryData = $request->all();
        $categoryData['order'] = $order;

        $category = Category::findOrFail($id);
        $category->update($categoryData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.archived_categories')->with('success', 'Category deleted successfully.');
    }

    public function archive(Category $category)
    {
        // Set category_id to null for all associated posts
        $category->update(['menu_id' => null]);
        $category->posts()->update(['category_id' => null]);

        return redirect()->route('admin.categories.archived_categories')->with('success', 'Category archived successfully.');
    }
}
