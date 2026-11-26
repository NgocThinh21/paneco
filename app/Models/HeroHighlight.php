<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroHighlight extends Model
{
    protected $fillable = [
        'icon',
        'title',
        'subtitle',
        'sort_order',
        'is_active',
    ];
}