<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Kế thừa từ Authenticatable

class Accounts extends Authenticatable
{
    protected $table = 'accounts'; // Đảm bảo chỉ định bảng đúng

    protected $fillable = [
        'username',
        'password',
        'password_hash',
    ];
    
    // Nếu bạn muốn sử dụng username để xác thực
    
}