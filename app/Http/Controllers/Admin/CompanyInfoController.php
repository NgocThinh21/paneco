<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyInfoController extends Controller
{
    public function index()
    {
        $info = CompanyInfo::first() ?? new CompanyInfo();
        return view('Admin.info.index', compact('info'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'hero_badge'        => 'nullable|string|max:255',
            'hero_title'        => 'nullable|string',
            'hero_subtitle'     => 'nullable|string',
            'about_subtitle'    => 'nullable|string|max:255',
            'company_name'      => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'vision'            => 'nullable|string',
            'english_name'      => 'nullable|string|max:255',
            'tax_code'          => 'nullable|string|max:50',
            'representative'    => 'nullable|string|max:255',
            'hq_address'        => 'nullable|string|max:255',
            'branch_address'    => 'nullable|string|max:255',
            'hotline'           => 'nullable|string|max:100',
            'email'             => 'nullable|email|max:255',
            'about_image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $info = CompanyInfo::first();

        if ($request->hasFile('about_image')) {
            if ($info && $info->about_image) {
                Storage::disk('public')->delete($info->about_image);
            }
            $data['about_image'] = $request->file('about_image')->store('company', 'public');
        }

        if ($info && $info->exists) {
            $info->update($data);
        } else {
            CompanyInfo::create($data);
        }

        return redirect()->route('Admin.info.index')->with('success', 'Đã lưu thông tin trang chủ thành công!');
    }
}