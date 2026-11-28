<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'full_name',
        'position',
        'department',
        'years_experience',
        'software_skills',
        'bio',
        'photo',
        'sort_order',
        'is_visible',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'years_experience' => 'integer',
            'sort_order' => 'integer',
            'is_visible' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }
}
