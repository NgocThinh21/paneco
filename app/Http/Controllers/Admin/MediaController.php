<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function index(): View
    {
        $images = collect(Storage::disk('public')->files('gallery'))->sortDesc()->values();

        return view('admin.media.index', compact('images'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['images' => ['required', 'array', 'max:20'], 'images.*' => ['image', 'max:5120']]);
        foreach ($request->file('images') as $image) {
            $image->store('gallery', 'public');
        }

        return redirect()->route('admin.media.index')->with('success', 'Đã tải ảnh lên thư viện.');
    }

    public function destroy(string $filename): RedirectResponse
    {
        abort_unless(basename($filename) === $filename, 404);
        $path = 'gallery/'.$filename;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        return redirect()->route('admin.media.index')->with('success', 'Đã xóa ảnh khỏi thư viện.');
    }
}
