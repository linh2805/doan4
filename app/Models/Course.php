<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Mối quan hệ nhiều-một với `TargetAudience`
    public function targetAudience()
    {
        return $this->belongsTo(TargetAudience::class);
    }

    // Mối quan hệ một-nhiều với `Testimonial`
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
