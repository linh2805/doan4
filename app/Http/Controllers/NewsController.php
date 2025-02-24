<?php
namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all(); // Lấy danh sách tin tức từ database
        return view('user.news.index', compact('news'));
    }
    
    public function show($id)
    {
        $news = News::find($id);
        
        if (!$news) {
            abort(404); // Trả về lỗi 404 nếu không tìm thấy tin
        }
    
        return view('user.news.detail', compact('news'));
    }
    
    public function create()
    {
        return view('admin.ad-news.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('news.index')->with('success', 'Tin tức đã được tạo!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.ad-news.edit', compact('news'));
    }
    

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('news.index')->with('success', 'Tin tức đã được cập nhật!');
    }

    public function destroy($id)
    {
        News::destroy($id);
        return redirect()->route('news.index')->with('success', 'Tin tức đã được xóa!');
    }
    public function showAdDetail()
    {
        $news = News::all();
        return view('admin.ad-news.index', compact('news'));
    }
}
