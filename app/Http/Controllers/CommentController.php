<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255', // Kiểm tra dữ liệu
            'name' => 'required|string|max:255', // Validate tên

        ]);

        Comment::create([
            'comment' => $request->input('comment'),
            'name' => $request->input('name'), // Lưu tên

        ]);

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }
    // CommentController
    public function showComment()
    {
        $comments = Comment::all();
        return view('admin.comment.index', compact('comments'));
    }

    public function index()
{
    $comments = Comment::latest()->take(2)->get(); // Lấy 2 bình luận mới nhất
    return view('user.home.index', compact('comments')); // Truyền bình luận vào view
}

    public function destroy($id)
{
    $comment = Comment::findOrFail($id);
    $comment->delete();

    return redirect()->back()->with('success', 'Comment deleted successfully!');
}
}