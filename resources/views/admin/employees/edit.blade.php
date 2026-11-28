@extends('layouts.simple-admin')

@section('page_title', 'Sửa thành viên - Paneco')

@section('content')
    <div class="mb-6"><h1 class="text-2xl font-bold text-slate-900">Sửa hồ sơ thành viên</h1><p class="mt-2 text-slate-600">Bạn có thể ẩn hồ sơ trên website mà không cần xóa.</p></div>
    @include('admin.employees._form')
@endsection
