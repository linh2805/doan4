<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    // Đặt tên bảng nếu khác với quy tắc mặc định
    protected $table = 'colleges';

    // Chỉ định các thuộc tính có thể gán
    protected $fillable = [
        'introductory_photo',
        'introduce',
        'time',
        'location',
        'curriculum_content',
    ];

    // Nếu curriculum_content là JSON, có thể định nghĩa accessor cho nó
    protected $casts = [
        'curriculum_content' => 'array', // Chuyển đổi thành mảng tự động
    ];
}