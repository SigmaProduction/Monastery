<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

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
}
