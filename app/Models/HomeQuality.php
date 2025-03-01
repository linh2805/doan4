<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeQuality extends Model
{
    use HasFactory;

    protected $table = 'home_quality'; // Tên bảng
    protected $fillable = [
        'classroom_system',
        'image1',
        'image2',
        'image3',
        'image4',
        'lab_system',
    ]; // Các cột có thể được gán giá trị
}