<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    // Định nghĩa mối quan hệ với `Course`
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

