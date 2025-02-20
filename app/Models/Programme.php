<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'duration', 'qualification', 'location'];

    // Quan hệ: Programme có nhiều TargetAudience
    public function targetAudiences()
    {
        return $this->hasMany(TargetAudience::class);
    }

    // Quan hệ: Programme có nhiều Testimonial
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    // Quan hệ: Programme có nhiều Course
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    // Quan hệ: Programme có nhiều Faq
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}

