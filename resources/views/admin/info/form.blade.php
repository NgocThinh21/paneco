@extends('layouts.simple-admin')

@section('page_title', 'Thông tin công ty - Paneco')

@section('content')
    <div class="mb-6">
        <p class="mb-1 text-sm font-semibold uppercase tracking-wider text-amber-700">Nội dung website</p>
        <h1 class="text-2xl font-bold text-slate-900">Thông tin công ty</h1>
        <p class="mt-2 text-slate-600">Thông tin bạn lưu tại đây sẽ được dùng trên trang giới thiệu Paneco.</p>
    </div>

    <form action="{{ route('admin.info.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        @csrf
        @method('PUT')

        <section class="grid gap-5 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-semibold" for="name_vi">Tên công ty <span class="text-red-600">*</span></label>
                <input class="w-full rounded border border-slate-300 px-3 py-2" id="name_vi" name="name_vi" value="{{ old('name_vi', $info->name_vi) }}" required maxlength="255">
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold" for="name_en">Tên tiếng Anh (không bắt buộc)</label>
                <input class="w-full rounded border border-slate-300 px-3 py-2" id="name_en" name="name_en" value="{{ old('name_en', $info->name_en) }}" maxlength="255">
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold" for="slogan">Câu giới thiệu ngắn</label>
                <input class="w-full rounded border border-slate-300 px-3 py-2" id="slogan" name="slogan" value="{{ old('slogan', $info->slogan) }}" maxlength="255">
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold" for="legal_representative">Người đại diện</label>
                <input class="w-full rounded border border-slate-300 px-3 py-2" id="legal_representative" name="legal_representative" value="{{ old('legal_representative', $info->legal_representative) }}" maxlength="255">
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold" for="tax_code">Mã số thuế</label>
                <input class="w-full rounded border border-slate-300 px-3 py-2" id="tax_code" name="tax_code" value="{{ old('tax_code', $info->tax_code) }}" maxlength="100">
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold" for="founded_date">Ngày thành lập</label>
                <input class="w-full rounded border border-slate-300 px-3 py-2" id="founded_date" name="founded_date" type="date" value="{{ old('founded_date', $info->founded_date?->format('Y-m-d')) }}">
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold" for="phone">Số điện thoại</label>
                <input class="w-full rounded border border-slate-300 px-3 py-2" id="phone" name="phone" type="tel" value="{{ old('phone', $info->phone) }}" maxlength="50">
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold" for="phone_2">Số điện thoại phụ</label>
                <input class="w-full rounded border border-slate-300 px-3 py-2" id="phone_2" name="phone_2" type="tel" value="{{ old('phone_2', $info->phone_2) }}" maxlength="50">
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold" for="email">Email công ty</label>
                <input class="w-full rounded border border-slate-300 px-3 py-2" id="email" name="email" type="email" value="{{ old('email', $info->email) }}" maxlength="255">
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold" for="zalo_link">Liên kết Zalo</label>
                <input class="w-full rounded border border-slate-300 px-3 py-2" id="zalo_link" name="zalo_link" type="url" value="{{ old('zalo_link', $info->zalo_link) }}" maxlength="255" placeholder="https://">
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold" for="charter_capital">Vốn điều lệ (nếu muốn công khai)</label>
                <input class="w-full rounded border border-slate-300 px-3 py-2" id="charter_capital" name="charter_capital" value="{{ old('charter_capital', $info->charter_capital) }}" maxlength="255">
            </div>
        </section>

        <div>
            <label class="mb-1 block text-sm font-semibold" for="greeting">Lời giới thiệu</label>
            <textarea class="w-full rounded border border-slate-300 px-3 py-2" id="greeting" name="greeting" rows="4">{{ old('greeting', $info->greeting) }}</textarea>
        </div>
        <div>
            <label class="mb-1 block text-sm font-semibold" for="mission">Công việc / sứ mệnh công ty</label>
            <textarea class="w-full rounded border border-slate-300 px-3 py-2" id="mission" name="mission" rows="4">{{ old('mission', $info->mission) }}</textarea>
        </div>
        <div>
            <label class="mb-1 block text-sm font-semibold" for="vision">Định hướng (không bắt buộc)</label>
            <textarea class="w-full rounded border border-slate-300 px-3 py-2" id="vision" name="vision" rows="3">{{ old('vision', $info->vision) }}</textarea>
        </div>

        <section class="grid gap-5 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-semibold" for="logo">Logo công ty</label>
                @if ($info->logo)<img class="mb-2 h-16 max-w-48 object-contain" src="{{ asset('storage/' . $info->logo) }}" alt="Logo hiện tại">@endif
                <input class="block w-full text-sm" id="logo" name="logo" type="file" accept="image/*">
                <p class="mt-1 text-xs text-slate-500">Ảnh tối đa 2 MB. Để trống nếu muốn giữ logo hiện tại.</p>
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold" for="about_image">Ảnh giới thiệu</label>
                @if ($info->about_image)<img class="mb-2 h-16 max-w-48 object-cover" src="{{ asset('storage/' . $info->about_image) }}" alt="Ảnh giới thiệu hiện tại">@endif
                <input class="block w-full text-sm" id="about_image" name="about_image" type="file" accept="image/*">
                <p class="mt-1 text-xs text-slate-500">Ảnh tối đa 5 MB. Để trống nếu muốn giữ ảnh hiện tại.</p>
            </div>
        </section>

        <button class="rounded bg-slate-900 px-5 py-3 font-semibold text-white hover:bg-slate-700" type="submit">Lưu thông tin công ty</button>
    </form>
@endsection
