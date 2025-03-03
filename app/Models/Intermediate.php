<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intermediate extends Model
{
    protected $table = 'intermediates';

    // Chỉ định các thuộc tính có thể gán
    protected $fillable = [
        'introductory_photo1',
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
