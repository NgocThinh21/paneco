@extends('layouts.admin')

@section('page_title', 'Thêm Dự Án Mới')

@section('content')
<div class="max-w-2xl bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tên công trình *</label>
            <input type="text" name="name" required placeholder="VD: PALTAR RDC" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-navy">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phân loại *</label>
                <select name="category" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-navy">
                    <option value="steel">Kết cấu thép (Shop Drawing)</option>
                    <option value="bim">Thiết kế & Thi công BIM</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Năm thực hiện *</label>
                <input type="text" name="year" required placeholder="VD: 2024" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-navy">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Quy mô *</label>
                <input type="text" name="scale" required placeholder="VD: 2.800 tấn hoặc 4.596 m²" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-navy">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phần mềm sử dụng</label>
                <input type="text" name="work_detail" placeholder="VD: S/F REAL4, Tekla, Revit" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-navy">
            </div>
        </div>

        <div class="flex items-center pt-2">
            <input type="checkbox" name="is_featured" id="is_featured" value="1" class="w-4 h-4 text-navy border-gray-300 rounded">
            <label for="is_featured" class="ml-2 text-sm text-gray-700">Hiển thị nổi bật ngoài Trang chủ</label>
        </div>

        <div class="pt-4 flex space-x-3">
            <button type="submit" class="px-5 py-2 bg-navy hover:bg-navyLight text-white font-medium rounded-lg">Lưu dự án</button>
            <a href="{{ route('projects.index') }}" class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg">Hủy</a>
        </div>
    </form>
</div>
@endsection