@extends('layouts.admin')

@section('page_title', 'Quản lý Dự án Kết cấu thép & BIM')

@section('content')
@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="p-5 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-base font-bold text-navy">Danh sách công trình</h3>
        <a href="{{ route('projects.create') }}" class="px-4 py-2 bg-navy hover:bg-navyLight text-white text-sm font-medium rounded-lg">
            <i class="fas fa-plus mr-2 text-gold"></i> Thêm dự án mới
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b text-xs uppercase text-gray-600 font-semibold">
                    <th class="py-3 px-4">Tên công trình</th>
                    <th class="py-3 px-4">Phân loại</th>
                    <th class="py-3 px-4">Năm</th>
                    <th class="py-3 px-4">Quy mô</th>
                    <th class="py-3 px-4">Phần mềm</th>
                    <th class="py-3 px-4 text-center">Trang chủ</th>
                    <th class="py-3 px-4 text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                @forelse($projects as $project)
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 font-semibold text-navy">{{ $project->name }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $project->category == 'steel' ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800' }}">
                            {{ $project->category == 'steel' ? 'Kết cấu thép' : 'BIM' }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-gray-600">{{ $project->year }}</td>
                    <td class="py-3 px-4 text-gray-600">{{ $project->scale }}</td>
                    <td class="py-3 px-4 text-gray-600">{{ $project->work_detail }}</td>
                    <td class="py-3 px-4 text-center">
                        @if($project->is_featured)
                            <span class="text-green-600"><i class="fas fa-check-circle"></i></span>
                        @else
                            <span class="text-gray-300"><i class="fas fa-minus-circle"></i></span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-right flex justify-end space-x-2">
                        <!-- Nút Sửa -->
                        <a href="{{ route('projects.edit', $project->id) }}" class="text-blue-600 hover:text-blue-800 p-1" title="Sửa">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Form Xóa -->
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Bạn chắc chắn muốn xóa dự án này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 p-1" title="Xóa">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-6 text-center text-gray-500">Chưa có dự án nào. Hãy bấm "Thêm dự án mới" nhé!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection