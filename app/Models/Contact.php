<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Nếu cần quan hệ với `User` (nếu người gửi liên hệ có tài khoản)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Nếu cần quan hệ với `Course` (nếu người gửi liên hệ về một khóa học)
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
