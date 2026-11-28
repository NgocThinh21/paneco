<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $fillable = ['title', 'location', 'quantity', 'description', 'requirements', 'deadline', 'is_active'];

    protected function casts(): array
    {
        return ['deadline' => 'date', 'is_active' => 'boolean'];
    }
}
