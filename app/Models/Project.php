<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'year',
        'scale_value',
        'scale_unit',
        'work_detail',
        'software',
        'description',
        'thumbnail',
        'is_featured',
        'is_visible',
    ];

    protected function casts(): array
    {
        return ['is_featured' => 'boolean', 'is_visible' => 'boolean'];
    }
}
