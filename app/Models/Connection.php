<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $table = 'connections';

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
        'curriculum_content' => 'array', // Automatically cast to array
    ];
}
