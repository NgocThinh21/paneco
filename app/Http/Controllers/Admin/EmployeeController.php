<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.employees.index', compact('employees'));
    }

    public function updateFeatured(Request $request, Employee $employee): RedirectResponse
    {
        $data = $request->validate([
            'is_featured' => ['required', 'boolean'],
        ]);

        if ($data['is_featured'] && ! $employee->is_featured) {
            $featuredCount = Employee::query()->where('is_featured', true)->count();

            if ($featuredCount >= 8) {
                return back()->withErrors(['is_featured' => 'Trang chủ chỉ hiển thị tối đa 8 thành viên nổi bật.']);
            }
        }

        $employee->update(['is_featured' => $data['is_featured']]);

        return back()->with('success', 'Đã cập nhật trạng thái nổi bật trên trang chủ.');
    }

    public function create(): View
    {
        return view('admin.employees.create', ['employee' => new Employee]);
    }

    public function store(Request $request): RedirectResponse
    {
        if (Employee::query()->count() >= 23) {
            return back()->withErrors(['full_name' => 'Danh sách giới thiệu đã đủ 23 thành viên.'])->withInput();
        }

        $data = $this->validatedData($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }

        $data['is_visible'] = $request->boolean('is_visible');
        $data['is_featured'] = $request->boolean('is_featured');
        if ($data['is_featured'] && Employee::query()->where('is_featured', true)->count() >= 8) {
            return back()->withErrors(['is_featured' => 'Trang chủ chỉ hiển thị tối đa 8 thành viên nổi bật.'])->withInput();
        }
        Employee::create($data);

        return redirect()->route('admin.employees.index')->with('success', 'Đã thêm thành viên.');
    }

    public function edit(Employee $employee): View
    {
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $data = $this->validatedData($request);
        $oldPhoto = $employee->photo;

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        } else {
            unset($data['photo']);
        }

        $data['is_visible'] = $request->boolean('is_visible');
        $data['is_featured'] = $request->boolean('is_featured');
        if ($data['is_featured'] && ! $employee->is_featured && Employee::query()->where('is_featured', true)->count() >= 8) {
            return back()->withErrors(['is_featured' => 'Trang chủ chỉ hiển thị tối đa 8 thành viên nổi bật.'])->withInput();
        }
        $employee->update($data);

        if ($request->hasFile('photo') && $oldPhoto) {
            Storage::disk('public')->delete($oldPhoto);
        }

        return redirect()->route('admin.employees.index')->with('success', 'Đã cập nhật thành viên.');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $photo = $employee->photo;
        $employee->delete();

        if ($photo) {
            Storage::disk('public')->delete($photo);
        }

        return redirect()->route('admin.employees.index')->with('success', 'Đã xóa thành viên.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        return $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'department' => ['nullable', 'string', 'max:255'],
            'years_experience' => ['nullable', 'integer', 'min:0', 'max:100'],
            'software_skills' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
        ]);
    }
}
