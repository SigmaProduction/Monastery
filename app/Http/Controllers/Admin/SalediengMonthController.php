<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\SalediengMonth;

class SalediengMonthController extends Controller
{
    public function index()
    {
        $saledieng_months = SalediengMonth::all();

        return view('admin.saledieng_months.index', compact('saledieng_months'));
    }

    public function edit(SalediengMonth $saledieng_month)
    {
        return view('admin.saledieng_months.edit', compact('saledieng_month'));
    }

    public function update(Request $request, SalediengMonth $saledieng_month)
    {
        $saledieng_month->update($request->all('content'));
        return redirect()->route('admin.saledieng_months.edit', $saledieng_month->id)->with('success', 'Updated successfully');
    }
}
