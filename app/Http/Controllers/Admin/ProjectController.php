<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // 1. Hiển thị danh sách dự án
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    // 2. Mở form Thêm mới
    public function create()
    {
        return view('admin.projects.create');
    }

    // 3. Lưu dự án mới vào Database
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string',
            'year'        => 'required|string|max:10',
            'work_detail' => 'nullable|string|max:255',
            'scale'       => 'required|string|max:255',
        ]);

        // Xử lý checkbox đưa ra trang chủ
        $data['is_featured'] = $request->has('is_featured');

        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Đã thêm dự án mới thành công!');
    }

    // 4. Mở form Sửa dự án
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // 5. Cập nhật dữ liệu sau khi Sửa
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string',
            'year'        => 'required|string|max:10',
            'work_detail' => 'nullable|string|max:255',
            'scale'       => 'required|string|max:255',
        ]);

        $data['is_featured'] = $request->has('is_featured');

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Đã cập nhật dự án!');
    }

    // 6. Xóa dự án
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Đã xóa dự án!');
    }
}