@extends('layouts.simple-admin')

@section('page_title', 'Đội ngũ - Paneco')

@section('content')
    <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div>
            <p class="mb-1 text-sm font-semibold uppercase tracking-wider text-amber-700">Nội dung website</p>
            <h1 class="text-2xl font-bold text-slate-900">Đội ngũ Paneco</h1>
            <p class="mt-2 text-slate-600">Đã nhập {{ $employees->count() }}/23 hồ sơ. Chỉ thành viên được bật hiển thị mới xuất hiện trên website.</p>
        </div>
        <a class="rounded bg-slate-900 px-4 py-3 font-semibold text-white hover:bg-slate-700" href="{{ route('admin.employees.create') }}">Thêm thành viên</a>
    </div>

    <div class="overflow-x-auto rounded-lg border border-slate-200 bg-white shadow-sm">
        <table class="w-full min-w-[720px] text-left text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr><th class="px-4 py-3">Thành viên</th><th class="px-4 py-3">Chức vụ</th><th class="px-4 py-3">Phòng ban</th><th class="px-4 py-3">Thứ tự</th><th class="px-4 py-3">Nổi bật Trang chủ</th><th class="px-4 py-3">Hiển thị</th><th class="px-4 py-3">Thao tác</th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($employees as $employee)
                    <tr>
                        <td class="px-4 py-3 font-semibold">{{ $employee->full_name }}</td>
                        <td class="px-4 py-3">{{ $employee->position }}</td>
                        <td class="px-4 py-3">{{ $employee->department ?: '—' }}</td>
                        <td class="px-4 py-3">{{ $employee->sort_order }}</td>
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.employees.featured', $employee) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="is_featured" value="0">
                                <label class="inline-flex cursor-pointer items-center gap-2">
                                    <input class="rounded border-slate-300 text-amber-500 focus:ring-amber-500" type="checkbox" name="is_featured" value="1" @checked($employee->is_featured) onchange="this.form.submit()" aria-label="Hiển thị {{ $employee->full_name }} nổi bật trên Trang chủ">
                                    <span>{{ $employee->is_featured ? 'Đang bật' : 'Đang tắt' }}</span>
                                </label>
                            </form>
                        </td>
                        <td class="px-4 py-3">{{ $employee->is_visible ? 'Đang hiện' : 'Đang ẩn' }}</td>
                        <td class="flex gap-3 px-4 py-3">
                            <a class="font-semibold text-blue-700 hover:underline" href="{{ route('admin.employees.edit', $employee) }}">Sửa</a>
                            <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Xóa hồ sơ {{ addslashes($employee->full_name) }}?')">
                                @csrf
                                @method('DELETE')
                                <button class="font-semibold text-red-700 hover:underline" type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="px-4 py-8 text-center text-slate-500" colspan="7">Chưa có hồ sơ thành viên. Hãy nhập thông tin thật do Paneco cung cấp.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
