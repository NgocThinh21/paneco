<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort_order')->latest()->get();

        return view('admin.banners.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $data = $this->validateBanner($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        Banner::create($data);

        return redirect()->route('admin.banners.index')->with('success', 'Đã thêm banner mới.');
    }

    public function edit(Banner $banner)
    {
        $banners = Banner::orderBy('sort_order')->latest()->get();
        $editingBanner = $banner;

        return view('admin.banners.index', compact('banners', 'editingBanner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $this->validateBanner($request);

        if ($request->hasFile('image')) {
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }
            $data['image'] = $request->file('image')->store('banners', 'public');
        } else {
            unset($data['image']);
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Đã cập nhật banner.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Đã xóa banner.');
    }

    private function validateBanner(Request $request): array
    {
        return $request->validate([
            'badge_text'   => 'nullable|string|max:255',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|max:5120',
            'button1_text' => 'nullable|string|max:100',
            'button1_link' => 'nullable|string|max:255',
            'button2_text' => 'nullable|string|max:100',
            'button2_link' => 'nullable|string|max:255',
            'sort_order'   => 'nullable|integer',
            'is_active'    => 'nullable',
        ]);
    }
}