@extends('layouts.admin')

@section('content')
<div style="padding: 20px; max-width: 1050px;">
    <h2>Quản lý Banner trang chủ</h2>

    @if(session('success'))
        <div style="padding: 10px 14px; margin-bottom: 16px; background: #e8f5e9; color: #1b5e20; border: 1px solid #a5d6a7;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="padding: 10px 14px; margin-bottom: 16px; background: #ffebee; color: #b71c1c; border: 1px solid #ef9a9a;">
            <ul style="margin: 0; padding-left: 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" style="margin-bottom: 28px; padding: 16px; border: 1px solid #ddd;">
        @csrf

        <div style="margin-bottom: 12px;">
            <label style="display: block; font-weight: bold; margin-bottom: 4px;">Badge nhỏ phía trên tiêu đề</label>
            <input type="text" name="badge_text" value="{{ old('badge_text') }}" placeholder="VD: THÀNH LẬP TỪ 07/06/2018 · CHUẨN KỸ THUẬT NHẬT BẢN" style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 12px;">
            <label style="display: block; font-weight: bold; margin-bottom: 4px;">Tiêu đề chính (*)</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="VD: Chúng tôi hỗ trợ công nghệ xây dựng Nhật Bản từ Việt Nam" style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 12px;">
            <label style="display: block; font-weight: bold; margin-bottom: 4px;">Mô tả ngắn</label>
            <textarea name="description" rows="3" placeholder="Mô tả chi tiết hiển thị trên banner..." style="width: 100%; padding: 8px;">{{ old('description') }}</textarea>
        </div>

        <div style="margin-bottom: 12px;">
            <label style="display: block; font-weight: bold; margin-bottom: 4px;">Ảnh nền Banner</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <div style="display: flex; gap: 12px; margin-bottom: 12px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 220px;">
                <label style="display: block; font-weight: bold; margin-bottom: 4px;">Chữ nút 1</label>
                <input type="text" name="button1_text" value="{{ old('button1_text') }}" placeholder="VD: Xem Công Trình Đã Làm" style="width: 100%; padding: 8px;">
            </div>
            <div style="flex: 1; min-width: 220px;">
                <label style="display: block; font-weight: bold; margin-bottom: 4px;">Link nút 1</label>
                <input type="text" name="button1_link" value="{{ old('button1_link') }}" placeholder="VD: #projects hoặc /projects" style="width: 100%; padding: 8px;">
            </div>
        </div>

        <!-- <div style="display: flex; gap: 12px; margin-bottom: 12px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 220px;">
                <label style="display: block; font-weight: bold; margin-bottom: 4px;">Chữ nút 2</label>
                <input type="text" name="button2_text" value="{{ old('button2_text') }}" placeholder="VD: Hợp Tác & Báo Giá" style="width: 100%; padding: 8px;">
            </div>
            <div style="flex: 1; min-width: 220px;">
                <label style="display: block; font-weight: bold; margin-bottom: 4px;">Link nút 2</label>
                <input type="text" name="button2_link" value="{{ old('button2_link') }}" placeholder="VD: #contact hoặc /contact" style="width: 100%; padding: 8px;">
            </div>
        </div>

        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 16px;">
            <div>
                <label style="font-weight: bold;">Thứ tự hiển thị:</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" style="width: 80px; padding: 6px;">
            </div>-->

            <label style="display: inline-flex; align-items: center; gap: 6px; font-weight: bold;">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                Hiển thị trên trang chủ
            </label>
        </div> 

        <button type="submit" style="padding: 8px 18px; cursor: pointer;">Lưu Banner</button>
    </form>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Badge & Tiêu đề</th>
                <th>Thứ tự</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>
                        @if($banner->image)
                            <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" style="height: 55px; width: 90px; object-fit: cover;">
                        @else
                            Không có ảnh
                        @endif
                    </td>
                    <td>
                        @if($banner->badge_text)
                            <div style="font-size: 12px; color: #555;">{{ $banner->badge_text }}</div>
                        @endif
                        <strong>{{ $banner->title }}</strong>
                        @if($banner->description)
                            <div style="font-size: 13px; color: #666; margin-top: 4px;">{{ $banner->description }}</div>
                        @endif
                    </td>
                    <td>{{ $banner->sort_order }}</td>
                    <td>{{ $banner->is_active ? 'Đang bật' : 'Tắt' }}</td>
                    <td>
                        <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" onsubmit="return confirm('Xóa banner này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 4px 10px; cursor: pointer;">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Chưa có banner nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection