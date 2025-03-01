<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolPhoto extends Model
{
    use HasFactory;

    // Đặt tên bảng (nếu không theo quy tắc Laravel)
    protected $table = 'school_photo';

    // Các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'image7',
    ];

    // Nếu bạn cần sử dụng các thuộc tính không thể gán hàng loạt
    protected $guarded = [];
}