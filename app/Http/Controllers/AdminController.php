<?php
namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdDetail()
    {
        $news = News::all();
        return view('admin.ad-news.index', compact('news'));
    }
    public function index()
    {
        // Lấy tất cả bình luận từ cơ sở dữ liệu
        $comments = Comment::all();

        // Trả về view cùng với dữ liệu bình luận
        return view('admin.index', compact('comments'));
    }
}
