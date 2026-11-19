<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CompanyInfoController;


// Khi có người truy cập trang chủ, gọi hàm index trong HomeController
Route::get('/', [HomeController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });// đầu tiên  local sẽ chạy trang này trước
Route::get('/login', function () {
    return view('login.login');
});







//ADMIN


//trang chủ
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/info', [CompanyInfoController::class, 'index'])->name('info.index');
    Route::put('/info', [CompanyInfoController::class, 'update'])->name('info.update');
});

// trang projects
Route::prefix('admin')->group(function () {
    Route::resource('projects', ProjectController::class);
});