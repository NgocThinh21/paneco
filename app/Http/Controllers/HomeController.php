<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Service;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy danh sách dự án tiêu biểu để hiện lên trang chủ
        $projects = Project::where('is_featured', true)->get();
        
        // Lấy danh sách lĩnh vực dịch vụ & đối tác
        $services = Service::all();
        $partners = Partner::all();

        // Trả về view trang chủ kèm dữ liệu
        return view('welcome', compact('projects', 'services', 'partners'));
    }
}