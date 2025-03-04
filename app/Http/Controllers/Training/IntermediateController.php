<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intermediate;
use App\Models\Comment;
use App\Models\FrequentlyAQ;



class IntermediateController extends Controller
{
    public function index()
    {
        // Lấy tất cả bản ghi
        $intermediates = Intermediate::all();

        // Kiểm tra nếu bảng rỗng và thêm bản ghi mặc định
        if ($intermediates->isEmpty()) {
            Intermediate::create([
                'introductory_photo' => 'source/images/introductory_photo2_jpg',
                'introduce' => 'ac',
                'time' => 'a',
                'location' => 'a',
                'curriculum_content' => ['a', 'b', 'c', 'd'],
            ]);
        }

        return view('admin.training.intermediate', compact('intermediates'));
    }
    public function resetIntermediate()
    {
        Intermediate::truncate(); // Xóa tất cả bản ghi
        // Có thể thêm bản ghi mặc định ở đây nếu cần
    }
    public function editIntermediate($id)
    {
        $intermediate = Intermediate::findOrFail($id);
        return view('admin.training.editIntermediate', compact('intermediate')); // Truyền biến college vào view
    }
    public function updateIntermediate(Request $request, $id)
    {
        \Log::info($request->all());
        try {
            // Xác thực dữ liệu
            $request->validate([
                'introductory_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'introduce' => 'required|string',
                'time' => 'required|string',
                'location' => 'required|string',
                'curriculum_content' => 'required|array',
            ]);

            // Tìm bản ghi College
            $intermediate = Intermediate::findOrFail($id);

            // Cập nhật ảnh nếu có
            if ($request->hasFile('introductory_photo')) {
                // Xóa ảnh cũ nếu có
                if ($intermediate->introductory_photo) {
                    @unlink(public_path($intermediate->introductory_photo)); // Xóa ảnh cũ từ public
                }

                // Định danh file ảnh
                $fileName = 'introductory_photo2_' . $request->file('introductory_photo')->extension(); // Thêm dấu chấm trước phần mở rộng

                // Lưu ảnh mới vào thư mục public/images
                $request->file('introductory_photo')->storeAs('images', $fileName, 'source'); // Sử dụng 'public' cho filesystem

                // Cập nhật đường dẫn ảnh
                $intermediate->introductory_photo = 'source/images/' . $fileName; // Cập nhật đường dẫn ảnh
            }
            // Cập nhật các thông tin khác
            $intermediate->introduce = $request->input('introduce');
            $intermediate->time = $request->input('time');
            $intermediate->location = $request->input('location');
            $intermediate->curriculum_content = $request->input('curriculum_content');

            // Lưu bản ghi
            $intermediate->save();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // Ghi lại lỗi để kiểm tra
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Đã xảy ra lỗi, vui lòng thử lại!'], 500);
        }
    }
    public function showHomeIntermediate()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get(); // Lấy tất cả bình luận
        $intermediates = Intermediate::all(); // Lấy tất cả dữ liệu trung gian
        $faqs = FrequentlyAQ::all(); // Lấy tất cả câu hỏi thường gặp

        // Trả về view và truyền dữ liệu
        return view('user.training.preschool-intermediate.Intermediate', compact('comments', 'intermediates', 'faqs'));
    }
}
