<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrequentlyAQ extends Model
{
    // Nếu bạn có tên bảng khác với quy ước, hãy chỉ định rõ tên bảng
    protected $table = 'frequently_a_qs';

    // Nếu bạn không sử dụng timestamps, hãy tắt chúng
    public $timestamps = true;

    // Định nghĩa các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'question',
        'answer',
    ];

    // Bạn có thể thêm các phương thức tùy chỉnh ở đây nếu cần
}