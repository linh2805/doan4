<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.ad-news.index', compact('news'));
    }
    
    public function list()
    {
        $news = News::paginate(10); // Phân trang 10 bài mỗi trang
        return view('user.news.index', compact('news'));
    }
    public function show($id)
    {
        $newsItem = News::find($id); // Hoặc News::where('id', $id)->first();

        if (!$newsItem) {
            return abort(404); // Nếu không tìm thấy thì báo lỗi 404
        }

        return view('user.news.detail', compact('newsItem'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'extra_content' => 'nullable|string',
        ]);
    
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('news_images', 'public') : null;
    
        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'extra_content' => $request->extra_content,
            'image' => $imagePath
        ]);
    
        // Chuyển hướng về trang admin.index sau khi thêm thành công
        return redirect()->route('admin.index')->with('success', 'Tin tức đã được thêm!');
    }

    public function destroy($id)
    {
        $newsItem = News::find($id);
        if ($newsItem) {
            $newsItem->delete();
            return response()->json(['success' => 'Xóa thành công!']);
        }
        return response()->json(['error' => 'Không tìm thấy mục!'], 404);
    }

    public function edit($id)
    {
        $news = News::find($id);
        if (!$news) {
            return response()->json(['error' => 'Không tìm thấy tin tức'], 404);
        }

        return view('admin.index', compact('news'));
    }

    
    public function update(Request $request, $id)
    {
        $newsItem = News::findOrFail($id);
    
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'extra_content' => 'nullable|string',
        ]);
    
        if ($request->hasFile('image')) {
            // Storage::disk('public')->delete($newsItem->image);
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }
    
        $newsItem->update($data);
        return redirect()->back()->with('success', 'Cập nhật tin tức thành công!');
    }
    

    
}