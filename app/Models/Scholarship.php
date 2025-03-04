<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Thêm dòng này
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory; // Đảm bảo HasFactory được khai báo đúng

    protected $fillable = ['title', 'description', 'criteria'];
 // Các cột có thể ghi dữ liệu
}
