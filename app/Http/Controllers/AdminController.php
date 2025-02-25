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
    
}
