<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\CompanyInfo;
use App\Models\CoreValue;
use App\Models\Employee;
use App\Models\HeroHighlight;
use App\Models\News;
use App\Models\Office;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Recruitment;
use App\Models\Service;
use App\Models\Software;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $info = CompanyInfo::first();
        $employees = Employee::query()
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $banners = Banner::query()->where('is_active', true)->orderBy('sort_order')->get();
        $heroHighlights = HeroHighlight::query()->where('is_active', true)->orderBy('sort_order')->get();
        $coreValues = CoreValue::query()->orderBy('sort_order')->get();
        $services = Service::query()->orderBy('sort_order')->get();
        $softwares = Software::query()->orderBy('sort_order')->get();
        $projects = Project::query()->where('is_visible', true)->orderByDesc('is_featured')->latest()->take(6)->get();
        $recruitments = Recruitment::query()->where('is_active', true)->where(function ($query) {
            $query->whereNull('deadline')->orWhereDate('deadline', '>=', now()->toDateString());
        })->latest()->get();
        $news = News::query()->where('is_visible', true)->whereDate('published_at', '<=', now()->toDateString())->orderByDesc('published_at')->take(3)->get();
        $partners = Partner::query()->orderBy('sort_order')->get();
        $offices = Office::query()->orderBy('sort_order')->get();
        $gallery = collect(Storage::disk('public')->files('gallery'))->sortDesc()->take(12)->values();

        return view('home-paneco', compact('info', 'employees', 'banners', 'heroHighlights', 'coreValues', 'services', 'softwares', 'projects', 'recruitments', 'news', 'partners', 'offices', 'gallery'));
    }

    public function team(): View
    {
        $info = CompanyInfo::query()->first();
        $employees = Employee::query()->where('is_visible', true)->orderBy('sort_order')->orderBy('id')->get();

        return view('team', compact('info', 'employees'));
    }
}
