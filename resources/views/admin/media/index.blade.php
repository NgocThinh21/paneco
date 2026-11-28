@extends('layouts.simple-admin')

@section('page_title', 'Thư viện hình ảnh | Quản trị Paneco')

@section('content')
<div class="mb-6"><h1 class="text-2xl font-bold">Thư viện hình ảnh</h1><p class="mt-1 text-sm text-slate-600">Ảnh tải ở đây dùng cho bộ sưu tập trên website. Ảnh banner, dự án, tin tức và hồ sơ thành viên tải trực tiếp ở mục tương ứng.</p></div>
<form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="mb-8 flex flex-wrap items-end gap-4 rounded-lg bg-white p-5 shadow-sm">@csrf<div><label class="mb-1 block text-sm font-semibold" for="images">Chọn ảnh (tối đa 20 ảnh, mỗi ảnh 5 MB)</label><input class="block" id="images" type="file" name="images[]" accept="image/*" multiple required></div><button class="rounded bg-slate-900 px-4 py-2 font-semibold text-white">Tải ảnh</button></form>
<div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">@forelse($images as $image)<article class="overflow-hidden rounded-lg bg-white shadow-sm"><img class="aspect-square w-full object-cover" src="{{ asset('storage/'.$image) }}" alt="Ảnh thư viện" loading="lazy"><div class="p-3"><p class="truncate text-xs text-slate-600">{{ basename($image) }}</p><form method="POST" action="{{ route('admin.media.destroy', basename($image)) }}" onsubmit="return confirm('Xóa ảnh này khỏi thư viện?')">@csrf @method('DELETE')<button class="mt-2 text-sm font-semibold text-red-700">Xóa ảnh</button></form></div></article>@empty<div class="col-span-full rounded-lg bg-white p-8 text-center text-slate-500">Thư viện chưa có ảnh.</div>@endforelse</div>
@endsection
