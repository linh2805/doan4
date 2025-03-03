<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Comment;

class CollegeController extends Controller
{
    public function index()
    {
        // Lấy tất cả bản ghi
        $colleges = College::all(); // Lấy dữ liệu từ bảng college

        // Kiểm tra nếu bảng rỗng và thêm bản ghi mặc định
        if ($colleges->isEmpty()) {
            College::create([
                'introductory_photo' => 'source/images/introductory_photo_jpg',
                'introduce' => 'a',
                'time' => 'a',
                'location' => 'a',
                'curriculum_content' => ['a', 'b', 'c', 'd'],
            ]);
        }

        return view('admin.training.college', compact('colleges'));
    }
    public function resetCollege()
    {
        College::truncate(); // Xóa tất cả bản ghi
        // Có thể thêm bản ghi mặc định ở đây nếu cần
    }
    public function editCollege($id)
    {
        $college = College::findOrFail($id);
        return view('admin.training.editCollege', compact('college')); // Truyền biến college vào view
    }
    public function updateCollege(Request $request, $id)
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
            $college = College::findOrFail($id);

            // Cập nhật ảnh nếu có
            if ($request->hasFile('introductory_photo')) {
                // Xóa ảnh cũ nếu có
                if ($college->introductory_photo) {
                    @unlink(public_path($college->introductory_photo)); // Xóa ảnh cũ từ public
                }

                // Định danh file ảnh
                $fileName = 'introductory_photo_' . $request->file('introductory_photo')->extension(); // Thêm dấu chấm trước phần mở rộng

                // Lưu ảnh mới vào thư mục public/images
                $request->file('introductory_photo')->storeAs('images', $fileName, 'source'); // Sử dụng 'public' cho filesystem

                // Cập nhật đường dẫn ảnh
                $college->introductory_photo = 'source/images/' . $fileName; // Cập nhật đường dẫn ảnh
            }
            // Cập nhật các thông tin khác
            $college->introduce = $request->input('introduce');
            $college->time = $request->input('time');
            $college->location = $request->input('location');
            $college->curriculum_content = $request->input('curriculum_content');

            // Lưu bản ghi
            $college->save();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // Ghi lại lỗi để kiểm tra
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Đã xảy ra lỗi, vui lòng thử lại!'], 500);
        }
    }
   
    public function showCollegeAndComments()
{
    $comments = Comment::orderBy('created_at', 'desc')->get(); // Get all comments
    $colleges = College::all();

    return view('user.training.preschool-college.PreschoolCollege', compact( 'comments', 'colleges'));
}
    
}
