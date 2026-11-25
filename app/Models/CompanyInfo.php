<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $table = 'company_infos';

    protected $fillable = [
        'name_vi',
        'name_en',
        'tax_code',
        'founded_date',
        'charter_capital',
        'legal_representative',
        'phone',
        'phone_2',
        'email',
        'slogan',
        'greeting',
        'vision',
        'mission',
        'logo',
        'about_image',
        'zalo_link',
    ];

    protected $casts = [
        'founded_date' => 'date',
    ];
}