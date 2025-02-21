<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    // Định nghĩa tên bảng nếu cần thiết
    protected $table = 'registrations';  // Điều này là tùy chọn vì Laravel sẽ mặc định là 'registrations'

    // Chỉ định các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'full_name',
        'phone_number',  // Sửa tên trường ở đây
        'email',
        'school',        // Sửa tên trường ở đây
        'residence',
        'major',
    ];
}