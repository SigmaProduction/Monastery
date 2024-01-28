<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ImageSlider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ImageSlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Search logic
        $query = ImageSlider::query();
        $image_slider = new ImageSlider();
        $imageTypes = $image_slider->imageTypes;

        if ($request->get('image_type') != null) {
            $query->where('image_type', $request->get('image_type'));
        }

        $query->orderBy('created_at', 'desc');
        $image_sliders = $query->paginate(10);

        return view('admin.image_sliders.index', compact('image_sliders', 'imageTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $imageSlider = new ImageSlider;
        $imageTypes = $imageSlider->imageTypes;
        return view('admin.image_sliders.create', compact('imageTypes'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_type' => 'required|integer',
            'thumb' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->file('url')) {
            $image = $request->file('url');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path('images/image_sliders'), $new_name);
            $url_path = '/images/image_sliders/' . $new_name;
        }

        $imageSlider = new ImageSlider;
        $imageSlider->url = $url_path;
        $imageSlider->image_type = $request->image_type;
        $imageSlider->thumb = $request->thumb;
        $imageSlider->save();

        return redirect()->route('image_sliders.index')->with('success', 'Image Slider created successfully.');
    }

    public function edit($id)
    {
        $slider = ImageSlider::findOrFail($id);
        return view('admin.image_sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_type' => 'required|integer',
            'thumb' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slider = ImageSlider::findOrFail($id);
        $validatedData = $validator->validated();

        if($request->hasFile('url')) {
            $file = $request->file('url');
            $imageName = time().'.'.$file->extension();
            $imagePath = 'image/image_sliders/' . $imageName;

            $file->move(base_path('image/image_sliders/'), $imageName);

            $validatedData['url'] = $imagePath;
        }

        $slider->update($validatedData);

        return redirect()->route('image_sliders.index')->with('success', 'Image slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = ImageSlider::findOrFail($id);

        $slider->delete();

        return redirect()->route('image_sliders.index')->with('success', 'Image slider deleted successfully.');
    }
}
