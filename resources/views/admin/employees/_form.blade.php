@php($isEditing = $employee->exists)
<form action="{{ $isEditing ? route('admin.employees.update', $employee) : route('admin.employees.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
    @if ($isEditing) @method('PUT') @endif
    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label class="mb-1 block text-sm font-semibold" for="full_name">Họ và tên <span class="text-red-600">*</span></label>
            <input class="w-full rounded border border-slate-300 px-3 py-2" id="full_name" name="full_name" value="{{ old('full_name', $employee->full_name) }}" required maxlength="255">
        </div>
        <div>
            <label class="mb-1 block text-sm font-semibold" for="position">Chức vụ / vị trí <span class="text-red-600">*</span></label>
            <input class="w-full rounded border border-slate-300 px-3 py-2" id="position" name="position" value="{{ old('position', $employee->position) }}" required maxlength="255">
        </div>
        <div>
            <label class="mb-1 block text-sm font-semibold" for="department">Phòng ban</label>
            <input class="w-full rounded border border-slate-300 px-3 py-2" id="department" name="department" value="{{ old('department', $employee->department) }}" maxlength="255">
        </div>
        <div>
            <label class="mb-1 block text-sm font-semibold" for="years_experience">Số năm kinh nghiệm (nếu muốn công khai)</label>
            <input class="w-full rounded border border-slate-300 px-3 py-2" id="years_experience" name="years_experience" type="number" min="0" max="100" value="{{ old('years_experience', $employee->years_experience) }}">
        </div>
        <div class="md:col-span-2">
            <label class="mb-1 block text-sm font-semibold" for="software_skills">Phần mềm/kỹ năng (nếu muốn công khai)</label>
            <input class="w-full rounded border border-slate-300 px-3 py-2" id="software_skills" name="software_skills" value="{{ old('software_skills', $employee->software_skills) }}" maxlength="255">
        </div>
        <div class="md:col-span-2">
            <label class="mb-1 block text-sm font-semibold" for="bio">Giới thiệu ngắn (không bắt buộc)</label>
            <textarea class="w-full rounded border border-slate-300 px-3 py-2" id="bio" name="bio" rows="4">{{ old('bio', $employee->bio) }}</textarea>
        </div>
        <div>
            <label class="mb-1 block text-sm font-semibold" for="photo">Ảnh thành viên</label>
            @if ($employee->photo)<img class="mb-2 h-20 w-20 rounded object-cover" src="{{ asset('storage/' . $employee->photo) }}" alt="Ảnh hiện tại">@endif
            <input class="block w-full text-sm" id="photo" name="photo" type="file" accept="image/*">
            <p class="mt-1 text-xs text-slate-500">Ảnh tối đa 2 MB. Để trống khi sửa để giữ ảnh hiện tại.</p>
        </div>
        <div>
            <label class="mb-1 block text-sm font-semibold" for="sort_order">Thứ tự hiển thị</label>
            <input class="w-full rounded border border-slate-300 px-3 py-2" id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $employee->sort_order ?? 0) }}">
        </div>
    </div>
    <label class="flex items-center gap-2 text-sm font-semibold"><input name="is_visible" type="checkbox" value="1" @checked(old('is_visible', $employee->exists ? $employee->is_visible : true))> Hiển thị hồ sơ này trên website</label>
    <div class="flex flex-wrap gap-3">
        <button class="rounded bg-slate-900 px-5 py-3 font-semibold text-white hover:bg-slate-700" type="submit">{{ $isEditing ? 'Lưu thay đổi' : 'Thêm thành viên' }}</button>
        <a class="rounded bg-slate-200 px-5 py-3 font-semibold text-slate-700 hover:bg-slate-300" href="{{ route('admin.employees.index') }}">Quay lại danh sách</a>
    </div>
</form>
