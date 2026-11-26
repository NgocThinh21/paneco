<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CompanyInfoController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\HeroHighlightController;

// Trang chủ
Route::get('/', [HomeController::class, 'index']);

// Đăng nhập (tạm thời, sẽ làm xử lý đăng nhập sau)
Route::get('/login', function () {
    return view('login.login');
});

// ADMIN
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('info', CompanyInfoController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('banners', BannerController::class)->only(['index', 'store', 'destroy']);
    Route::resource('hero-highlights', HeroHighlightController::class)->only(['index', 'store', 'destroy']);
});


