<?php

namespace App\Http\Controllers;
use App\Models\FrequentlyAQ;
use Illuminate\Http\Request;

class FrequentlyAQController extends Controller
{
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        // Tạo bản ghi mới
        FrequentlyAQ::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);

        // Chuyển hướng hoặc trả về phản hồi
        return redirect()->back()->with('success', 'Câu hỏi thường gặp đã được lưu thành công!');
    }
    public function index()
    {
        $faqs = FrequentlyAQ::all(); // Lấy tất cả câu hỏi thường gặp
        return view('admin.frequentlyAQ.index', compact('faqs'));
    }
    public function edit($id)
    {
        $faq = FrequentlyAQ::findOrFail($id); // Lấy câu hỏi thường gặp theo ID
        return view('admin.frequentlyAQ.edit', compact('faq'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = FrequentlyAQ::findOrFail($id);
        $faq->update([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);

        return redirect()->route('admin.index')->with('success', 'Câu hỏi thường gặp đã được cập nhật thành công!');
    }
    public function destroy($id)
    {
        $faq = FrequentlyAQ::findOrFail($id); // Tìm câu hỏi theo ID
        $faq->delete(); // Xóa câu hỏi

        return redirect()->back()->with('success', 'Câu hỏi thường gặp đã được xóa thành công!');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Tìm kiếm bằng bất kỳ trường nào trong 'title', 'content' hoặc 'extra_content'
            $faqs = FrequentlyAQ::where('question', 'LIKE', "%{$query}%")
                ->orWhere('answer', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $faqs = FrequentlyAQ::all();
        }

        return view('admin.frequentlyAQ.search', ['faqs' => $faqs]);
    }
}
