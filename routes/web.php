<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CompanyInfoController;
use App\Http\Controllers\Admin\ContactInboxController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\HeroHighlightController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SiteContentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicContactController;
use Illuminate\Support\Facades\Route;

// Trang chủ
Route::get('/', [HomeController::class, 'index']);
Route::get('/doi-ngu', [HomeController::class, 'team'])->name('team');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('login.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::post('/contact', [PublicContactController::class, 'store'])
    ->middleware('throttle:3,1')
    ->name('contact.store');

// ADMIN

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('info', [CompanyInfoController::class, 'index'])->name('info.index');
    Route::put('info', [CompanyInfoController::class, 'update'])->name('info.update');
    Route::resource('employees', EmployeeController::class)->except(['show']);
    Route::resource('banners', BannerController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::resource('hero-highlights', HeroHighlightController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::get('contacts', [ContactInboxController::class, 'index'])->name('contacts.index');
    Route::put('contacts/{contact}/read', [ContactInboxController::class, 'markRead'])->name('contacts.read');
    Route::get('media', [MediaController::class, 'index'])->name('media.index');
    Route::post('media', [MediaController::class, 'store'])->name('media.store');
    Route::delete('media/{filename}', [MediaController::class, 'destroy'])->name('media.destroy');
    Route::get('content/{section}', [SiteContentController::class, 'index'])->name('content.index');
    Route::get('content/{section}/create', [SiteContentController::class, 'create'])->name('content.create');
    Route::post('content/{section}', [SiteContentController::class, 'store'])->name('content.store');
    Route::get('content/{section}/{record}/edit', [SiteContentController::class, 'edit'])->name('content.edit');
    Route::put('content/{section}/{record}', [SiteContentController::class, 'update'])->name('content.update');
    Route::delete('content/{section}/{record}', [SiteContentController::class, 'destroy'])->name('content.destroy');
});
