@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark mb-0">Cấu hình Thông tin Công ty & Trang chủ</h4>
    </div>

    {{-- Thông báo khi cập nhật thành công --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.company-info.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            {{-- CỘT TRÁI: BANNER & GIỚI THIỆU --}}
            <div class="col-lg-8">
                {{-- Card 1: Nội dung Banner đầu trang --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3">
                        <h6 class="fw-bold text-primary mb-0">1. Nội dung Banner đầu trang (Hero Section)</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nhãn nổi bật (Dòng chữ vàng trên cùng)</label>
                            <input type="text" name="hero_badge" class="form-control" 
                                   value="{{ old('hero_badge', $info->hero_badge ?? 'THÀNH LẬP TỪ 07/06/2018 • CHUẨN KỸ THUẬT NHẬT BẢN') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tiêu đề chính Banner</label>
                            <input type="text" name="hero_title" class="form-control" 
                                   value="{{ old('hero_title', $info->hero_title ?? 'Chúng tôi hỗ trợ công nghệ xây dựng Nhật Bản từ Việt Nam') }}">
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-semibold">Mô tả ngắn dưới tiêu đề</label>
                            <textarea name="hero_subtitle" rows="3" class="form-control">{{ old('hero_subtitle', $info->hero_subtitle ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Card 2: Phần Giới thiệu (Về chúng tôi) --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3">
                        <h6 class="fw-bold text-primary mb-0">2. Phần Giới thiệu (Về chúng tôi)</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Tiêu đề phụ</label>
                                <input type="text" name="about_subtitle" class="form-control" 
                                       value="{{ old('about_subtitle', $info->about_subtitle ?? 'VỀ CHÚNG TÔI') }}">
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-semibold">Tên công ty hiển thị</label>
                                <input type="text" name="company_name" class="form-control" 
                                       value="{{ old('company_name', $info->company_name ?? 'CÔNG TY TNHH PANECO VIỆT NAM') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Đoạn văn giới thiệu chung</label>
                            <textarea name="about_description" rows="4" class="form-control">{{ old('about_description', $info->about_description ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tầm nhìn (Vision)</label>
                            <textarea name="vision" rows="3