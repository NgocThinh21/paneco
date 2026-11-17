<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});// đầu tiên  local sẽ chạy trang này trước
Route::get('/login', function () {
    return view('login.login');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});