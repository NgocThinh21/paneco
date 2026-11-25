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

   
</div>
@endsection