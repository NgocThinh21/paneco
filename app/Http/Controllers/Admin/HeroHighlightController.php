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
        $data = $this->validateHighlight($request);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        HeroHighlight::create($data);

        return redirect()->route('admin.hero-highlights.index')->with('success', 'Đã thêm thẻ icon mới.');
    }

    public function edit(HeroHighlight $heroHighlight)
    {
        $highlights = HeroHighlight::orderBy('sort_order')->latest()->get();
        $editingHighlight = $heroHighlight;

        return view('admin.hero_highlights.index', compact('highlights', 'editingHighlight'));
    }

    public function update(Request $request, HeroHighlight $heroHighlight)
    {
        $data = $this->validateHighlight($request);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        $heroHighlight->update($data);

        return redirect()->route('admin.hero-highlights.index')->with('success', 'Đã cập nhật thẻ icon.');
    }

    public function destroy(HeroHighlight $heroHighlight)
    {
        $heroHighlight->delete();

        return redirect()->route('admin.hero-highlights.index')->with('success', 'Đã xóa thẻ icon.');
    }

    private function validateHighlight(Request $request): array
    {
        return $request->validate([
            'icon'       => 'required|string|max:100',
            'title'      => 'required|string|max:255',
            'subtitle'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active'  => 'nullable',
        ]);
    }
}