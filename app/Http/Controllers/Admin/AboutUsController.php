<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\AboutUsImage;

class AboutUsController extends Controller
{
    public function edit()
    {
        $aboutUs = AboutUs::first();
        if (!$aboutUs) {
            $aboutUs = AboutUs::Create([
                'subtitle' => '',
                'title' => '',
                'description' => '',
                'content' => '',
            ]);
        }

        return view('admin.about_us.edit', compact('aboutUs'));
    }

    public function update(Request $request)
    {
        $aboutUs = AboutUs::first();
        if ($aboutUs) {
            $aboutUs->update($request->all());
        } else {
            AboutUs::create($request->all());

        }
        return redirect()->route('admin.about_us.edit')->with('success', 'Updated successfully');
    }

    public function uploadImage(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                'about_us_id' => 'required|integer|exists:about_us,id',
            ]);

            $aboutUsId = $request->about_us_id;
            $imageName = time().'.'.$request->image->extension();
            $imagePath = 'images/about_us/' . $aboutUsId . '/' . $imageName;

            $request->image->move(public_path('images/about_us/' . $aboutUsId), $imageName);

            // Store image details in the database
            $aboutUsImage = AboutUsImage::create([
                'about_us_id' => $aboutUsId,
                'image_path' => $imagePath,
            ]);

            // Return the image URL with the 'public' segment
            $imageUrl = asset($aboutUsImage->image_path);

            return response()->json(['url' => $imageUrl]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
