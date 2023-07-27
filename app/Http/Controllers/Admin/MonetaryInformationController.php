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
        $validatedData = $request->validate([
            'bank_account_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_branch_name' => 'required|string|max:255',
        ]);

        $monetary_info = MonetaryInformation::first();
        if ($monetary_info) {
            $monetary_info->update($validatedData);
        } else {
            MonetaryInformation::create($validatedData);

        }
        return redirect()->route('admin.monetary_information.edit')->with('success', 'Updated successfully');
    }
}
