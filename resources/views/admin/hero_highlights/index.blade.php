@extends('layouts.admin')

@section('title', 'Quản lý Icon nổi bật trên Banner')

@section('content')
@php
    $isEdit = isset($editingHighlight) && $editingHighlight;
@endphp

<style>
    .paneco-admin-wrap {
        max-width: 1100px;
    }
    .paneco-page-title {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 18px;
    }
    .paneco-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);
    }
    .paneco-card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
        padding-bottom: 10px;
        border-bottom: 1px solid #f1f5f9;
    }
    .paneco-card-head h5 {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
        color: #0f172a;
    }
    .paneco-alert-success {
        background: #dcfce7;
        border: 1px solid #86efac;
        color: #166534;
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 18px;
        font-weight: 500;
    }
    .paneco-alert-error {
        background: #fee2e2;
        border: 1px solid #fca5a5;
        color: #991b1b;
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 18px;
    }
    .paneco-form-group {
        margin-bottom: 16px;
    }
    .paneco-form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 16px;
    }
    @media (max-width: 768px) {
        .paneco-form-row {
            grid-template-columns: 1fr;
        }
    }
    .paneco-label {
        display: block;
        font-weight: 600;
        font-size: 14px;
        color: #1e293b;
        margin-bottom: 6px;
    }
    .paneco-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 14px;
        color: #0f172a;
        background: #fff;
        box-sizing: border-box;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .paneco-input:focus {
        outline: none;
        border-color: #0a2540;
        box-shadow: 0 0 0 3px rgba(10, 37, 64, 0.12);
    }
    .paneco-hint {
        font-size: 12px;
        color: #64748b;
        margin-top: 5px;
    }
    .paneco-icon-presets {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 8px;
    }
    .paneco-preset-btn {
        background: #f1f5f9;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        padding: 5px 10px;
        font-size: 12px;
        color: #334155;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .paneco-preset-btn:hover {
        background: #e2e8f0;
        border-color: #94a3b8;
    }
    .paneco-checkbox-wrap {
        display: flex;
        align-items: center;
        gap: 8px;
        height: 40px;
        margin-top: 24px;
        font-size: 14px;
        font-weight: 500;
        color: #1e293b;
        cursor: pointer;
    }
    .paneco-btn-submit {
        background: #0a2540;
        color: #ffffff;
        border: none;
        border-radius: 6px;
        padding: 11px 22px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    .paneco-btn-submit:hover {
        background: #1b365d;
    }
    .paneco-btn-cancel {
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
    .paneco-btn-edit {
        display: inline-block;
        padding: 6px 12px;
        font-size: 13px;
        font-weight: 600;
        color: #0a2540;
        background: #eff6ff;
        border: 1px solid #93c5fd;
        border-radius: 6px;
        text-decoration: none;
    }
    .paneco-actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }
    .paneco-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }
    .paneco-table th {
        text-align: left;
        padding: 12px;
        border-bottom: 2px solid #e2e8f0;
        color: #0f172a;
        font-weight: 700;
        background: #f8fafc;
    }
    .paneco-table td {
        padding: 12px;
        border-bottom: 1px solid #e2e8f0;
        color: #334155;
        vertical-align: middle;
    }
    .paneco-badge-on {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        background: #dcfce7;
        color: #166534;
    }
    .paneco-badge-off {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        background: #f1f5f9;
        color: #475569;
    }
    .paneco-btn-delete {
        background: #fff;
        color: #dc2626;
        border: 1px solid #fca5a5;
        border-radius: 6px;
        padding: 6px 12px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }
    .paneco-btn-delete:hover {
        background: #fee2e2;
    }
</style>

<div class="paneco-admin-wrap">
    <h2 class="paneco-page-title">Quản lý Icon nổi bật trên Banner</h2>

    @if(session('success'))
        <div class="paneco-alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="paneco-alert-error">
            @foreach($errors->all() as $error)
                <div>• {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="paneco-card">
        <div class="paneco-card-head">
            <h5>{{ $isEdit ? 'Sửa Icon #' . $editingHighlight->id : 'Thêm Icon mới' }}</h5>
            @if($isEdit)
                <a href="{{ route('admin.hero-highlights.index') }}" class="paneco-btn-cancel">Hủy sửa</a>
            @endif
        </div>

        <form
            action="{{ $isEdit ? route('admin.hero-highlights.update', $editingHighlight) : route('admin.hero-highlights.store') }}"
            method="POST"
        >
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif

            <div class="paneco-form-row">
                <div>
                    <label class="paneco-label">Class Bootstrap Icon (*)</label>
                    <input type="text" id="iconInput" name="icon" class="paneco-input" required
                           value="{{ old('icon', $isEdit ? $editingHighlight->icon : '') }}"
                           placeholder="VD: bi bi-shield-check">
                    <div class="paneco-icon-presets">
                        <button type="button" class="paneco-preset-btn" onclick="document.getElementById('iconInput').value='bi bi-shield-check'">
                            <i class="bi bi-shield-check"></i> Chuẩn kỹ thuật
                        </button>
                        <button type="button" class="paneco-preset-btn" onclick="document.getElementById('iconInput').value='bi bi-building-gear'">
                            <i class="bi bi-building-gear"></i> Kết cấu thép
                        </button>
                        <button type="button" class="paneco-preset-btn" onclick="document.getElementById('iconInput').value='bi bi-cpu'">
                            <i class="bi bi-cpu"></i> Công nghệ BIM
                        </button>
                        <button type="button" class="paneco-preset-btn" onclick="document.getElementById('iconInput').value='bi bi-award'">
                            <i class="bi bi-award"></i> Uy tín
                        </button>
                    </div>
                </div>

                <div>
                    <label class="paneco-label">Tiêu đề chính (*)</label>
                    <input type="text" name="title" class="paneco-input" required
                           value="{{ old('title', $isEdit ? $editingHighlight->title : '') }}"
                           placeholder="VD: Chuẩn Kỹ Thuật Nhật Bản">
                    <div class="paneco-hint">Hiển thị nổi bật bên cạnh icon trên trang chủ.</div>
                </div>
            </div>

            <div class="paneco-form-group">
                <label class="paneco-label">Mô tả phụ</label>
                <input type="text" name="subtitle" class="paneco-input"
                       value="{{ old('subtitle', $isEdit ? $editingHighlight->subtitle : '') }}"
                       placeholder="VD: Triển khai Shop Drawing trên S/F REAL4, Jissun, S/F FUTURE">
            </div>

            <div class="paneco-form-row">
                <div>
                    <label class="paneco-label">Thứ tự hiển thị</label>
                    <input type="number" name="sort_order" class="paneco-input"
                           value="{{ old('sort_order', $isEdit ? $editingHighlight->sort_order : 0) }}">
                </div>

                <div>
                    <label class="paneco-checkbox-wrap">
                        <input type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $isEdit ? $editingHighlight->is_active : 1) ? 'checked' : '' }}>
                        <span>Hiển thị trên trang chủ</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="paneco-btn-submit">
                {{ $isEdit ? 'Cập nhật Icon' : 'Lưu Icon' }}
            </button>
        </form>
    </div>

    <div class="paneco-card" style="padding: 0; overflow-x: auto;">
        <table class="paneco-table">
            <thead>
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th style="width: 180px;">Icon</th>
                    <th>Tiêu đề & Mô tả phụ</th>
                    <th style="width: 90px;">Thứ tự</th>
                    <th style="width: 120px;">Trạng thái</th>
                    <th style="width: 135px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($highlights as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <i class="{{ $item->icon }}" style="font-size: 20px; color: #0a2540; margin-right: 6px;"></i>
                            <code style="font-size: 12px; color: #475569;">{{ $item->icon }}</code>
                        </td>
                        <td>
                            <div style="font-weight: 700; color: #0f172a;">{{ $item->title }}</div>
                            @if($item->subtitle)
                                <div style="font-size: 13px; color: #64748b; margin-top: 2px;">{{ $item->subtitle }}</div>
                            @endif
                        </td>
                        <td>{{ $item->sort_order }}</td>
                        <td>
                            @if($item->is_active)
                                <span class="paneco-badge-on">Đang bật</span>
                            @else
                                <span class="paneco-badge-off">Tắt</span>
                            @endif
                        </td>
                        <td>
                            <div class="paneco-actions">
                                <a href="{{ route('admin.hero-highlights.edit', $item) }}" class="paneco-btn-edit">Sửa</a>
                                <form action="{{ route('admin.hero-highlights.destroy', $item) }}" method="POST"
                                      onsubmit="return confirm('Xóa thẻ icon này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="paneco-btn-delete">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #64748b; padding: 28px;">Chưa có dữ liệu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection