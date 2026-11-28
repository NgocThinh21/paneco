@extends('layouts.simple-admin')

@section('page_title', 'Thêm thành viên - Paneco')

@section('content')
    <div class="mb-6"><h1 class="text-2xl font-bold text-slate-900">Thêm thành viên</h1><p class="mt-2 text-slate-600">Nhập thông tin do Paneco cung cấp. Chỉ điền nội dung được phép công khai.</p></div>
    @include('admin.employees._form')
@endsection
