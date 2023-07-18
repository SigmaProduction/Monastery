<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MonetaryInformation;

class MonetaryInformationController extends Controller
{
    public function edit()
    {
        $monetary_info = MonetaryInformation::first();
        if (!$monetary_info) {
            $monetary_info = MonetaryInformation::Create();
        }

        return view('admin.monetary_information.edit', compact('monetary_info'));
    }

    public function update(Request $request)
    {
        $monetary_info = MonetaryInformation::first();
        if ($monetary_info) {
            $monetary_info->update($request->all());
        } else {
            MonetaryInformation::create($request->all());

        }
        return redirect()->route('admin.monetary_information.edit')->with('success', 'Updated successfully');
    }
}
