<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    // Khai báo các cột được phép thêm/sửa dữ liệu
    protected $fillable = [
        'company_name',
        'tax_code',
        'address_hcmc',
        'address_phanrang',
        'phone_1',
        'phone_2',
        'email', 
        'greeting'
    ];
}
