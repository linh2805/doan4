<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    // Trong trường hợp này, bảng `faq` không có quan hệ với các bảng khác.
    protected $fillable = ['question', 'answer'];
}
// có quan hệ với course
// class Faq extends Model
// {
//     public function course()
//     {
//         return $this->belongsTo(Course::class);
//     }
// }
