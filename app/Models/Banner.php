<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'badge_text',
        'badge_icon',
        'title',
        'description',
        'image',
        'button1_text',
        'button1_link',
        'button2_text',
        'button2_link',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
