<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Comment;
use App\Models\FrequentlyAQ;



class UniversityController extends Controller
{
    public function index()
    {
        // Lấy tất cả bản ghi
        $universitys = University::all();
        // Kiểm tra nếu bảng rỗng và thêm bản ghi mặc định
        if ($universitys->isEmpty()) {
            University::create([
                'introductory_photo' => 'source/images/introductory_photo3_jpg',
                'introduce' => 'ab',
                'time' => 'a',
                'location' => 'a',
                'curriculum_content' => ['a', 'b', 'c', 'd'],
            ]);
        }

        return view('admin.training.university', compact('universitys'));
    }
    public function resetUniversity()
    {
        University::truncate(); // Xóa tất cả bản ghi
        // Có thể thêm bản ghi mặc định ở đây nếu cần
    }
    public function editUniversity($id)
    {
        $university = University::findOrFail($id);
        return view('admin.training.editUniversity', compact('university')); // Truyền biến college vào view
    }
    public function updateUniversity(Request $request, $id)
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
            $university = University::findOrFail($id);

            // Cập nhật ảnh nếu có
            if ($request->hasFile('introductory_photo')) {
                // Xóa ảnh cũ nếu có
                if ($university->introductory_photo) {
                    @unlink(public_path($university->introductory_photo)); // Xóa ảnh cũ từ public
                }

                // Định danh file ảnh
                $fileName = 'introductory_photo3_' . $request->file('introductory_photo')->extension(); // Thêm dấu chấm trước phần mở rộng

                // Lưu ảnh mới vào thư mục public/images
                $request->file('introductory_photo')->storeAs('images', $fileName, 'source'); // Sử dụng 'public' cho filesystem

                // Cập nhật đường dẫn ảnh
                $university->introductory_photo = 'source/images/' . $fileName; // Cập nhật đường dẫn ảnh
            }
            // Cập nhật các thông tin khác
            $university->introduce = $request->input('introduce');
            $university->time = $request->input('time');
            $university->location = $request->input('location');
            $university->curriculum_content = $request->input('curriculum_content');

            // Lưu bản ghi
            $university->save();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // Ghi lại lỗi để kiểm tra
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Đã xảy ra lỗi, vui lòng thử lại!'], 500);
        }
    }
    public function showHomeUniversity()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get(); // Lấy tất cả bình luận
        $universitys  = University::all(); // Lấy tất cả dữ liệu đại học
        $faqs = FrequentlyAQ::all(); // Lấy tất cả câu hỏi thường gặp

        // Trả về view và truyền dữ liệu
        return view('user.training.university-connection.University', compact('comments', 'universitys', 'faqs'));
    }
}
