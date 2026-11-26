<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroHighlight;
use Illuminate\Http\Request;

class HeroHighlightController extends Controller
{
    public function index()
    {
        $highlights = HeroHighlight::orderBy('sort_order')->latest()->get();

        return view('admin.hero_highlights.index', compact('highlights'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon'       => 'required|string|max:100',
            'title'      => 'required|string|max:255',
            'subtitle'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active'  => 'nullable',
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        HeroHighlight::create($data);

        return redirect()->route('admin.hero-highlights.index')->with('success', 'Đã thêm thẻ icon mới.');
    }

    public function destroy(HeroHighlight $heroHighlight)
    {
        $heroHighlight->delete();

        return redirect()->route('admin.hero-highlights.index')->with('success', 'Đã xóa thẻ icon.');
    }
}