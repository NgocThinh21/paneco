@extends('layouts.admin')

@section('title', 'Quản lý Banner trang chủ')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@php
    $isEdit = isset($editingBanner) && $editingBanner;
@endphp

<style>
    .bn-wrap {
        max-width: 1120px;
    }
    .bn-title {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 16px;
    }
    .bn-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 22px;
        margin-bottom: 22px;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);
    }
    .bn-card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
        padding-bottom: 10px;
        border-bottom: 1px solid #f1f5f9;
    }
    .bn-card-head h5 {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
        color: #0f172a;
    }
    .bn-group {
        margin-bottom: 14px;
    }
    .bn-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 14px;
    }
    @media (max-width: 768px) {
        .bn-grid-2 {
            grid-template-columns: 1fr;
        }
    }
    .bn-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 6px;
    }
    .bn-icon-options {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(128px, 1fr));
        gap: 8px;
        margin-top: 10px;
    }
    .bn-icon-option {
        display: flex;
        align-items: center;
        gap: 8px;
        min-height: 40px;
        padding: 7px 9px;
        border: 1px solid #cbd5e1;
        border-radius: 7px;
        background: #fff;
        color: #334155;
        font-size: 12px;
        cursor: pointer;
    }
    .bn-icon-option i {
        color: #0a2540;
        font-size: 17px;
    }
    .bn-icon-option:hover,
    .bn-icon-option.is-selected {
        border-color: #f59e0b;
        background: #fffbeb;
        color: #0a2540;
    }
    .bn-icon-clear {
        margin-top: 8px;
        padding: 0;
        border: 0;
        background: none;
        color: #64748b;
        font-size: 12px;
        text-decoration: underline;
        cursor: pointer;
    }
    .bn-input,
    .bn-textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 14px;
        color: #0f172a;
        background: #ffffff;
        box-sizing: border-box;
    }
    .bn-textarea {
        min-height: 95px;
        resize: vertical;
    }
    .bn-input:focus,
    .bn-textarea:focus {
        outline: none;
        border-color: #0a2540;
        box-shadow: 0 0 0 3px rgba(10, 37, 64, 0.12);
    }
    .bn-check {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 500;
        color: #1e293b;
        margin-top: 24px;
        cursor: pointer;
    }
    .bn-btn-primary {
        background: #0a2540;
        color: #ffffff;
        border: none;
        border-radius: 6px;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
    }
    .bn-btn-primary:hover {
        background: #1b365d;
    }
    .bn-btn-cancel {
        display: inline-block;
        padding: 6px 12px;
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        background: #f1f5f9;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        text-decoration: none;
    }
    .bn-btn-edit {
        display: inline-block;
        padding: 5px 11px;
        font-size: 12px;
        font-weight: 600;
        color: #0a2540;
        background: #eff6ff;
        border: 1px solid #93c5fd;
        border-radius: 6px;
        text-decoration: none;
    }
    .bn-btn-del {
        padding: 5px 11px;
        font-size: 12px;
        font-weight: 600;
        color: #dc2626;
        background: #ffffff;
        border: 1px solid #fca5a5;
        border-radius: 6px;
        cursor: pointer;
    }
    .bn-actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }
    .bn-alert-ok {
        background: #dcfce7;
        border: 1px solid #86efac;
        color: #166534;
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 16px;
        font-weight: 500;
    }
    .bn-alert-err {
        background: #fee2e2;
        border: 1px solid #fca5a5;
        color: #991b1b;
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 16px;
    }
    .bn-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }
    .bn-table th {
        text-align: left;
        padding: 12px;
        background: #f8fafc;
        color: #0f172a;
        font-weight: 700;
        border-bottom: 2px solid #e2e8f0;
    }
    .bn-table td {
        padding: 12px;
        color: #334155;
        border-bottom: 1px solid #e2e8f0;
        vertical-align: middle;
    }
    .bn-badge-on {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        background: #dcfce7;
        color: #166534;
    }
    .bn-badge-off {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        background: #f1f5f9;
        color: #475569;
    }
</style>

<div class="bn-wrap">
    <h2 class="bn-title">Quản lý Banner trang chủ</h2>
//Thông báo thành công
    @if(session('success'))
        <div class="bn-alert-ok">{{ session('success') }}</div>
    @endif
//Thông báo thất bại
    @if($errors->any())
        <div class="bn-alert-err">
            @foreach($errors->all() as $error)
                <div>• {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="bn-card">
        <div class="bn-card-head">
            <h5>{{ $isEdit ? 'Sửa Banner #' . $editingBanner->id : 'Thêm Banner mới' }}</h5>
            @if($isEdit)
                <a href="{{ route('admin.banners.index') }}" class="bn-btn-cancel">Hủy sửa</a>
            @endif
        </div>

        <form
            action="{{ $isEdit ? route('admin.banners.update', $editingBanner) : route('admin.banners.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif

            <div class="bn-group">
                <label class="bn-label">Badge nhỏ phía trên tiêu đề</label>
                <input type="text" name="badge_text" class="bn-input"
                       value="{{ old('badge_text', $isEdit ? $editingBanner->badge_text : '') }}"
                       placeholder="VD: THÀNH LẬP TỪ 07/06/2018 • CHUẨN KỸ THUẬT NHẬT BẢN">
                <label class="bn-label" style="margin-top: 14px;">Chọn icon gợi ý cho nhãn</label>
                @php
                    $badgeIcon = old('badge_icon', $isEdit ? $editingBanner->badge_icon : '');
                    $badgeIcons = [
                        'bi bi-buildings' => 'Tòa nhà',
                        'bi bi-building-gear' => 'Kỹ thuật',
                        'bi bi-building-check' => 'Công trình',
                        'bi bi-gear-wide-connected' => 'Giải pháp',
                        'bi bi-tools' => 'Thi công',
                        'bi bi-hammer' => 'Chế tạo',
                        'bi bi-rulers' => 'Bản vẽ',
                        'bi bi-pencil-ruler' => 'Thiết kế',
                        'bi bi-compass' => 'Định hướng',
                        'bi bi-drafting-compass' => 'Shop Drawing',
                        'bi bi-diagram-3' => 'Quy trình',
                        'bi bi-people' => 'Đội ngũ',
                        'bi bi-person-badge' => 'Chuyên gia',
                        'bi bi-award' => 'Thành tựu',
                        'bi bi-patch-check' => 'Chất lượng',
                        'bi bi-shield-check' => 'Tin cậy',
                        'bi bi-check-circle' => 'Hoàn thiện',
                        'bi bi-stars' => 'Nổi bật',
                        'bi bi-lightbulb' => 'Sáng tạo',
                        'bi bi-cpu' => 'Công nghệ',
                        'bi bi-globe-asia-australia' => 'Quốc tế',
                        'bi bi-briefcase' => 'Dự án',
                        'bi bi-calendar-check' => 'Đúng tiến độ',
                        'bi bi-chat-dots' => 'Tư vấn',
                        'bi bi-envelope-paper' => 'Liên hệ',
                        'bi bi-truck' => 'Vận chuyển',
                        'bi bi-house-gear' => 'Xây dựng',
                        'bi bi-wrench-adjustable' => 'Lắp đặt',
                        'bi bi-boxes' => 'Hệ thống',
                        'bi bi-bounding-box-circles' => 'Kết cấu',
                    ];
                @endphp
                <input type="hidden" name="badge_icon" id="badgeIconInput" value="{{ $badgeIcon }}">
                <div class="bn-icon-options" role="group" aria-label="Chọn icon cho nhãn nhỏ">
                    @foreach($badgeIcons as $icon => $label)
                        <button type="button" class="bn-icon-option {{ $badgeIcon === $icon ? 'is-selected' : '' }}" data-icon="{{ $icon }}" aria-pressed="{{ $badgeIcon === $icon ? 'true' : 'false' }}">
                            <i class="{{ $icon }}" aria-hidden="true"></i><span>{{ $label }}</span>
                        </button>
                    @endforeach
                </div>
                <button type="button" class="bn-icon-clear" id="badgeIconClear">Bỏ icon</button>
                <div class="bn-hint" style="margin-top: 5px;">Chọn một biểu tượng; icon sẽ hiển thị trước nhãn nhỏ trên Trang chủ.</div>
            </div>

            <div class="bn-group">
                <label class="bn-label">Tiêu đề chính (*)</label>
                <input type="text" name="title" class="bn-input" required
                       value="{{ old('title', $isEdit ? $editingBanner->title : '') }}"
                       placeholder="VD: Chúng tôi hỗ trợ công nghệ xây dựng Nhật Bản từ Việt Nam">
            </div>

            <div class="bn-group">
                <label class="bn-label">Mô tả ngắn</label>
                <textarea name="description" class="bn-textarea"
                          placeholder="Mô tả chi tiết hiển thị trên banner...">{{ old('description', $isEdit ? $editingBanner->description : '') }}</textarea>
            </div>

            <div class="bn-group">
                <label class="bn-label">Ảnh nền Banner</label>
                <input type="file" name="image" accept="image/*">
                @if($isEdit && $editingBanner->image)
                    <div style="margin-top: 10px;">
                        <img src="{{ asset('storage/' . $editingBanner->image) }}" alt="{{ $editingBanner->title }}"
                             style="width: 130px; height: 78px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;">
                        <div style="font-size: 12px; color: #64748b; margin-top: 4px;">Ảnh hiện tại (bỏ trống nếu giữ nguyên ảnh này).</div>
                    </div>
                @endif
            </div>

            <div class="bn-grid-2">
                <div>
                    <label class="bn-label">Chữ nút 1</label>
                    <input type="text" name="button1_text" class="bn-input"
                           value="{{ old('button1_text', $isEdit ? $editingBanner->button1_text : '') }}"
                           placeholder="VD: Xem Công Trình Đã Làm">
                </div>
                <div>
                    <label class="bn-label">Link nút 1</label>
                    <input type="text" name="button1_link" class="bn-input"
                           value="{{ old('button1_link', $isEdit ? $editingBanner->button1_link : '') }}"
                           placeholder="VD: #projects hoặc /projects">
                </div>
            </div>

            <div class="bn-grid-2">
                <div>
                    <label class="bn-label">Chữ nút 2</label>
                    <input type="text" name="button2_text" class="bn-input"
                           value="{{ old('button2_text', $isEdit ? $editingBanner->button2_text : '') }}"
                           placeholder="VD: Hợp Tác & Báo Giá">
                </div>
                <div>
                    <label class="bn-label">Link nút 2</label>
                    <input type="text" name="button2_link" class="bn-input"
                           value="{{ old('button2_link', $isEdit ? $editingBanner->button2_link : '') }}"
                           placeholder="VD: #contact">
                </div>
            </div>

            <div class="bn-grid-2">
                <div>
                    <label class="bn-label">Thứ tự</label>
                    <input type="number" name="sort_order" class="bn-input"
                           value="{{ old('sort_order', $isEdit ? $editingBanner->sort_order : 0) }}">
                </div>
                <div>
                    <label class="bn-check">
                        <input type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $isEdit ? $editingBanner->is_active : 1) ? 'checked' : '' }}>
                        <span>Hiển thị trên trang chủ</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="bn-btn-primary">
                {{ $isEdit ? 'Cập nhật Banner' : 'Lưu Banner' }}
            </button>
        </form>
    </div>

    <div class="bn-card" style="padding: 0; overflow-x: auto;">
        <table class="bn-table">
            <thead>
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th style="width: 100px;">Ảnh</th>
                    <th>Badge & Tiêu đề</th>
                    <th style="width: 85px;">Thứ tự</th>
                    <th style="width: 115px;">Trạng thái</th>
                    <th style="width: 130px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($banners as $banner)
                    <tr>
                        <td>{{ $banner->id }}</td>
                        <td>
                            @if($banner->image)
                                <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}"
                                     style="width: 72px; height: 48px; object-fit: cover; border-radius: 4px;">
                            @endif
                        </td>
                        <td>
                            @if($banner->badge_text)
                                <div style="font-size: 12px; color: #64748b;">@if($banner->badge_icon)<i class="{{ $banner->badge_icon }}" aria-hidden="true"></i>@endif {{ $banner->badge_text }}</div>
                            @endif
                            <div style="font-weight: 700; color: #0f172a;">{{ $banner->title }}</div>
                            @if($banner->description)
                                <div style="font-size: 13px; color: #475569; margin-top: 2px;">{{ $banner->description }}</div>
                            @endif
                        </td>
                        <td>{{ $banner->sort_order }}</td>
                        <td>
                            @if($banner->is_active)
                                <span class="bn-badge-on">Đang bật</span>
                            @else
                                <span class="bn-badge-off">Tắt</span>
                            @endif
                        </td>
                        <td>
                            <div class="bn-actions">
                                <a href="{{ route('admin.banners.edit', $banner) }}" class="bn-btn-edit">Sửa</a>
                                <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST"
                                      onsubmit="return confirm('Xóa banner này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bn-btn-del">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #64748b; padding: 26px;">Chưa có banner nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
    (() => {
        const input = document.getElementById('badgeIconInput');
        const options = document.querySelectorAll('.bn-icon-option');
        const clear = document.getElementById('badgeIconClear');
        if (!input) return;

        const selectIcon = (value) => {
            input.value = value;
            options.forEach((option) => {
                const selected = option.dataset.icon === value;
                option.classList.toggle('is-selected', selected);
                option.setAttribute('aria-pressed', selected ? 'true' : 'false');
            });
        };

        options.forEach((option) => option.addEventListener('click', () => selectIcon(option.dataset.icon)));
        clear?.addEventListener('click', () => selectIcon(''));
    })();
</script>
@endsection
