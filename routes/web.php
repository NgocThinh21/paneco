<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProjectController;



// Khi có người truy cập trang chủ, gọi hàm index trong HomeController
Route::get('/', [HomeController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });// đầu tiên  local sẽ chạy trang này trước
Route::get('/login', function () {
    return view('login.login');
});







//ADMIN

Route::prefix('admin')->group(function () {
    Route::resource('info', ProjectController::class);
});
Route::prefix('admin')->group(function () {
    Route::resource('projects', ProjectController::class);
});