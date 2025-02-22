<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // public function index()
    // {
    //     $comments = Comment::orderBy('created_at', 'desc')->get(); // Lấy tất cả bình luận mới nhất
    
    //     return view('user.home.index', compact('comments')); // Truyền dữ liệu sang view

    //     $comments = Comment::with('user')->get(); // Lấy tất cả bình luận + user
    //     return view('user.home.index', compact('comments'));
    // }
    

    public function index() {
        $comments = Comment::with('user')->get();
        dd($comments); // Debug kiểm tra dữ liệu
        return view('user.home.index', compact('comments'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'content' => 'required|string|max:500'
        ]);
    
        $comment = Comment::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Bình luận đã được đăng!',
            'comment' => $comment
        ]);
    }
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['error' => 'Bình luận không tồn tại'], 404);
        }
    
        $comment->content = $request->content;
        $comment->save();
    
        return response()->json(['message' => 'Bình luận đã được cập nhật!'], 200);
    }
    
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Bình luận không tồn tại'], 404);
        }
        
        $comment->delete();
    
        return response()->json(['message' => 'Xóa bình luận thành công']);
    }
    

    public function adminIndex()
    {
        $comments = Comment::all(); // Lấy danh sách bình luận từ database
        return view('admin.comments.index', compact('comments')); // Truyền vào view
    }

    public function userIndex()
    {
        $comments = Comment::with('user')->latest()->get();
        return view('user.home.index', compact('comments'));
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
