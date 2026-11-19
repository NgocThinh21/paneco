@extends('layouts.admin')

@section('title', 'Quản lý Thông tin Công ty & Trang chủ')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-bold text-gray-800">Quản lý Thông tin Công ty & Trang chủ</h1>
        <button type="submit" form="companyInfoForm"
                class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm cursor-pointer">
            Lưu thay đổi
        </button>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-lg bg-green-50 border border-green-200 text-green-800 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="p-4 rounded-lg bg-red-50 border border-red-200 text-red-800 text-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="companyInfoForm" action="{{ route('admin.info.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            {{-- Cột trái --}}
            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-4">
                    <h2 class="text-base font-semibold text-gray-800 border-b border-gray-100 pb-3">
                        1. Khối Hero / Banner đầu trang
                    </h2>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nhãn nổi bật</label>
                        <input type="text" name="hero_badge"
                               value="{{ old('hero_badge', $info->hero_badge) }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề chính</label>
                        <input type="text" name="hero_title"
                               value="{{ old('hero_title', $info->hero_title) }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả ngắn</label>
                        <textarea name="hero_subtitle" rows="3"
                                  class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">{{ old('hero_subtitle', $info->hero_subtitle) }}</textarea>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-4">
                    <h2 class="text-base font-semibold text-gray-800 border-b border-gray-100 pb-3">
                        2. Khối Giới thiệu công ty
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        <div class="md:col-span-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề phụ</label>
                            <input type="text" name="about_subtitle"
                                   value="{{ old('about_subtitle', $info->about_subtitle) }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                        <div class="md:col-span-8">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tên công ty</label>
                            <input type="text" name="company_name"
                                   value="{{ old('company_name', $info->company_name) }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Giới thiệu chung</label>
                        <textarea name="about_description" rows="4"
                                  class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">{{ old('about_description', $info->about_description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tầm nhìn</label>
                        <textarea name="vision" rows="3"
                                  class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">{{ old('vision', $info->vision) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ảnh giới thiệu</label>
                        <input type="file" name="about_image" accept="image/*"
                               class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @if(!empty($info->about_image))
                            <img src="{{ asset('storage/' . $info->about_image) }}" alt="About image"
                                 class="mt-3 max-h-40 rounded-lg border border-gray-200 object-cover">
                        @endif
                    </div>
                </div>
            </div>

            {{-- Cột phải --}}
            <div class="lg:col-span-4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-4">
                    <h2 class="text-base font-semibold text-gray-800 border-b border-gray-100 pb-3">
                        3. Pháp lý & Liên hệ
                    </h2>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tên tiếng Anh</label>
                        <input type="text" name="english_name"
                               value="{{ old('english_name', $info->english_name) }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mã số thuế</label>
                        <input type="text" name="tax_code"
                               value="{{ old('tax_code', $info->tax_code) }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Người đại diện</label>
                        <input type="text" name="representative"
                               value="{{ old('representative', $info->representative) }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Hotline</label>
                        <input type="text" name="hotline"
                               value="{{ old('hotline', $info->hotline) }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email"
                               value="{{ old('email', $info->email) }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Trụ sở chính</label>
                        <textarea name="hq_address" rows="2"
                                  class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">{{ old('hq_address', $info->hq_address) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Chi nhánh</label>
                        <textarea name="branch_address" rows="2"
                                  class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">{{ old('branch_address', $info->branch_address) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection