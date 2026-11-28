@extends('layouts.simple-admin')

@section('page_title', $config['label'].' | Quản trị Paneco')

@section('content')
<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <div><h1 class="text-2xl font-bold">{{ $config['label'] }}</h1><p class="mt-1 text-sm text-slate-600">Nội dung được lưu và hiển thị trên website theo trạng thái đã chọn.</p></div>
    <a href="{{ route('admin.content.create', $section) }}" class="rounded bg-slate-900 px-4 py-2 font-semibold text-white">Thêm nội dung</a>
</div>
<div class="overflow-x-auto rounded-lg bg-white shadow-sm">
    <table class="min-w-full divide-y divide-slate-200 text-sm">
        <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Nội dung</th><th class="px-4 py-3 text-left">Trạng thái</th><th class="px-4 py-3 text-right">Thao tác</th></tr></thead>
        <tbody class="divide-y divide-slate-100">
        @forelse ($records as $record)
            @php($titleField = array_key_exists('title', $config['fields']) ? 'title' : (array_key_exists('name', $config['fields']) ? 'name' : (array_key_exists('full_name', $config['fields']) ? 'full_name' : 'id')))
            @php($statusField = array_key_exists('is_active', $config['fields']) ? 'is_active' : (array_key_exists('is_visible', $config['fields']) ? 'is_visible' : null))
            <tr>
                <td class="px-4 py-3"><div class="font-semibold">{{ $record->{$titleField} ?: 'Chưa có tiêu đề' }}</div><div class="mt-1 text-xs text-slate-500">Mã nội dung: {{ $record->getKey() }}</div></td>
                <td class="px-4 py-3">{{ $statusField ? ($record->{$statusField} ? 'Đang hiển thị' : 'Đang ẩn') : 'Đã lưu' }}</td>
                <td class="px-4 py-3 text-right"><div class="inline-flex gap-2"><a class="rounded border px-3 py-1.5" href="{{ route('admin.content.edit', [$section, $record->getKey()]) }}">Sửa</a><form method="POST" action="{{ route('admin.content.destroy', [$section, $record->getKey()]) }}" onsubmit="return confirm('Bạn có chắc muốn xóa nội dung này?')">@csrf @method('DELETE')<button class="rounded border border-red-200 px-3 py-1.5 text-red-700">Xóa</button></form></div></td>
            </tr>
        @empty
            <tr><td colspan="3" class="px-4 py-10 text-center text-slate-500">Chưa có nội dung. Bạn có thể thêm dữ liệu Paneco đã xác nhận hoặc nội dung demo để xem trước.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
