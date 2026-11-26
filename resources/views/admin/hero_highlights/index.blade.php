@extends('layouts.admin')

@section('title', 'Quản lý Icon nổi bật trên Banner')

@section('content')
<div class="container-fluid py-3">
    <h4 class="mb-3">Quản lý Icon nổi bật trên Banner</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.hero-highlights.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Class Bootstrap Icon (*)</label>
                        <input type="text" name="icon" class="form-control" required
                               placeholder="VD: bi bi-shield-check">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tiêu đề chính (*)</label>
                        <input type="text" name="title" class="form-control" required
                               placeholder="VD: Chuẩn Kỹ Thuật Nhật Bản">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Mô tả phụ</label>
                        <input type="text" name="subtitle" class="form-control"
                               placeholder="VD: S/F REAL4, Jissun, S/F FUTURE">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Thứ tự</label>
                        <input type="number" name="sort_order" class="form-control" value="0">
                    </div>
                    <div class="col-md-9 d-flex align-items-end">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="activeCheck" checked>
                            <label class="form-check-label" for="activeCheck">Hiển thị trên trang chủ</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Lưu Icon</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả phụ</th>
                        <th>Thứ tự</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($highlights as $item)
                        <tr>
                            <td><i class="{{ $item->icon }} fs-4 text-primary"></i> <code>{{ $item->icon }}</code></td>
                            <td class="fw-bold">{{ $item->title }}</td>
                            <td>{{ $item->subtitle }}</td>
                            <td>{{ $item->sort_order }}</td>
                            <td>
                                <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->is_active ? 'Đang bật' : 'Tắt' }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.hero-highlights.destroy', $item) }}" method="POST"
                                      onsubmit="return confirm('Xóa mục này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">Chưa có dữ liệu.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection