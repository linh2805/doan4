<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model {
    use HasFactory;
    protected $table = 'news'; // Đảm bảo tên bảng khớp với database
    protected $fillable = ['title', 'image', 'content', 'full_content', 'extra_content'];

    
}
