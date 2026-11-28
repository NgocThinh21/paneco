<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'slug', 'category', 'summary', 'content', 'thumbnail', 'published_at', 'is_visible'];

    protected function casts(): array
    {
        return ['published_at' => 'date', 'is_visible' => 'boolean'];
    }
}
