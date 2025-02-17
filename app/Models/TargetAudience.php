<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TargetAudience extends Model
{
    // Định nghĩa mối quan hệ một-nhiều với bảng `courses`
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}

