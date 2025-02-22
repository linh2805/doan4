<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    // use HasFactory;

    // Chỉ định tên bảng nếu tên không phải là số nhiều
    protected $table = 'accounts';

    // Chỉ định các thuộc tính có thể được gán hàng loạt
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'username',
        'password',
        'role',
        // 'avatar', // Đã xóa cột avatar
    ];
}