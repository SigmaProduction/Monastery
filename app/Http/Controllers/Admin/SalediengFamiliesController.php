<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalediengFamily;
use App\Models\SalediengMonth;

class SalediengFamiliesController extends Controller
{
    public function index(Request $request)
    {
         // Get the filter values from the request
         $name = $request->input('name');
         $saledieng_month_id = $request->input('saledieng_month_id');

         // Query the SalediengFamily model with filters and pagination
         $query = SalediengFamily::orderBy('created_at', 'desc');
         if ($name) {
             $query->where('name', 'like', '%' . $name . '%');
         }
         if ($saledieng_month_id) {
             $query->where('saledieng_month_id', $saledieng_month_id);
         }

         // Fetch paginated data
         $saledieng_families = $query->paginate(10);

         // Get all saledieng months for the filter select box
         $saledieng_months = SalediengMonth::all();

         return view('admin.saledieng_families.index', compact('saledieng_families', 'saledieng_months'));
    }

    public function create()
    {
        $saledieng_months = SalediengMonth::all();
        return view('admin.saledieng_families.create', compact('saledieng_months'));
    }

    public function edit(SalediengFamily $salediengFamily)
    {
        $saledieng_months = SalediengMonth::all();

        return view('admin.saledieng_families.edit', compact('salediengFamily', 'saledieng_months'));
    }

    public function destroy(SalediengFamily $salediengFamily)
    {
        $salediengFamily->delete();

        return redirect()->route('admin.saledieng_families.index')->with('success', 'Saledieng Family deleted successfully.');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validationRules = [
            'saledieng_month_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|string|max:255',
            'death_date' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:10000',
        ];
         // Validate the form data
         $validatedData = $request->validate($validationRules);

         // Handle image upload (if applicable)
         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file = $request->file('image');
            $imageName = time().'.'.$file->extension();
            $imagePath = 'images/saledieng_families/' . $imageName;

            // Move the uploaded file to the desired location
            $file->move(public_path('images/saledieng_families'), $imageName);

            $validatedData['image'] = $imagePath;
        }

        // Create a new SalediengFamily instance and save the data
        $salediengFamily = SalediengFamily::create($validatedData);

        // Redirect to the index page or show a success message
        return redirect()->route('admin.saledieng_families.index')->with('success', 'Saledieng Family created successfully!');
    }

    public function update(Request $request, $id)
    {
        $validationRules = [
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|string|max:255',
            'death_date' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:255',
            'saledieng_month_id' => 'required|integer'
        ];

        // Validate the form data
        $validatedData = $request->validate($validationRules);

        // Handle image upload (if applicable)
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time().'.'.$file->extension();
            $imagePath = 'images/saledieng_families/' . $imageName;

            // Move the uploaded file to the desired location
            $file->move(public_path('images/saledieng_families'), $imageName);

            $validatedData['image'] = $imagePath;
        }

        // Update the SalediengFamily record
        $salediengFamily = SalediengFamily::findOrFail($id);
        $salediengFamily->update($validatedData);

        // Redirect to the index page or show a success message
        return redirect()->route('admin.saledieng_families.index')->with('success', 'Saledieng Family updated successfully!');
    }
}
