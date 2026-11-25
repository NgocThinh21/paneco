<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    public function index()
    {
        $info = CompanyInfo::first() ?? new CompanyInfo();
        return view('admin.info.index', compact('info'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name_vi' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'tax_code' => 'nullable|string|max:100',
            'founded_date' => 'nullable|date',
            'charter_capital' => 'nullable|string|max:255',
            'legal_representative' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'phone_2' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'slogan' => 'nullable|string|max:255',
            'greeting' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'zalo_link' => 'nullable|string|max:255',
        ]);

        $info = CompanyInfo::first() ?? new CompanyInfo();
        $info->fill($data);
        $info->save();

        return redirect()->route('admin.info.index')->with('success', 'Đã lưu thông tin trang chủ/công ty.');
    }
}