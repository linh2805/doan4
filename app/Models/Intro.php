<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    use HasFactory;

    // Định nghĩa bảng tương ứng
    protected $table = 'intros'; // Tên bảng trong cơ sở dữ liệu

    // Các thuộc tính có thể gán
    protected $fillable = [
        'intro_school',
        'job',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];
}