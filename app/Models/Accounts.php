<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Kế thừa từ Authenticatable

class Accounts extends Authenticatable
{
    protected $table = 'accounts'; // Đảm bảo chỉ định bảng đúng

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'username',
        'password',
        'role',
    ];
    protected $casts = [
        'role' => 'string',
    ];
    // Nếu bạn muốn sử dụng username để xác thực
    
}