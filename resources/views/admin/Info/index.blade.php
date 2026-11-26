@extends('layouts.admin')

@section('page_title', 'Quản lý Dự án Kết cấu thép & BIM')

@section('content')
@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif


   
</div>
@endsection