<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Khai báo các cột được phép thêm/sửa dữ liệu
    protected $fillable = [
        'name',
        'category',
        'year',
        'work_detail',
        'scale',
        'image',
        'is_featured'
    ];
}