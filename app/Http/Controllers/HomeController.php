<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\CompanyInfo;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $info = CompanyInfo::first();

        $banners = Banner::where('is_active', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $featuredProjects = Project::where('is_visible', true)
            ->orderByDesc('is_featured')
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('info', 'banners', 'featuredProjects'));
    }
}