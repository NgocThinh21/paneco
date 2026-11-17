@extends('layouts.admin')

@section('page_title', 'Chỉnh Sửa Dự Án')

@section('content')
<div class="max-w-2xl bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <form action="{{ route('projects.update', $project->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tên công trình *</label>
            <input type="text" name="name" value="{{ $project->name }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-navy">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phân loại *</label>
                <select name="category" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-navy">
                    <option value="steel" {{ $project->category == 'steel' ? 'selected' : '' }}>Kết cấu thép (Shop Drawing)</option>
                    <option value="bim" {{ $project->category == 'bim' ? 'selected' : '' }}>Thiết kế & Thi công BIM</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Năm thực hiện *</label>
                <input type="text" name="year" value="{{ $project->year }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-navy">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Quy mô *</label>
                <input type="text" name="scale" value="{{ $project->scale }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-navy">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phần mềm sử dụng</label>
                <input type="text" name="work_detail" value="{{ $project->work_detail }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-navy">
            </div>
        </div>

        <div class="flex items-center pt-2">
            <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ $project->is_featured ? 'checked' : '' }} class="w-4 h-4 text-navy border-gray-300 rounded">
            <label for="is_featured" class="ml-2 text-sm text-gray-700">Hiển thị nổi bật ngoài Trang chủ</label>
        </div>

        <div class="pt-4 flex space-x-3">
            <button type="submit" class="px-5 py-2 bg-gold hover:bg-goldHover text-navy font-bold rounded-lg">Cập nhật thay đổi</button>
            <a href="{{ route('projects.index') }}" class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg">Hủy</a>
        </div>
    </form>
</div>
@endsection