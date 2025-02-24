<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';  // This is optional because Laravel assumes 'contact_forms'

    protected $fillable = ['comment', 'name']; // Đảm bảo có trường này
    public $timestamps = true;  // By default, Laravel will automatically manage created_at and updated_at

    }
