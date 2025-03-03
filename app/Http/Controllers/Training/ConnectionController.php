<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Connection;
use App\Models\Comment;



class ConnectionController extends Controller
{
    public function index()
    {
        // Lấy tất cả bản ghi
        $connections = Connection::all(); // Lấy dữ liệu từ bảng college

        // Kiểm tra nếu bảng rỗng và thêm bản ghi mặc định
        if ($connections->isEmpty()) {
            Connection::create([
                'introductory_photo' => 'source/images/introductory_photo1_jpg',
                'introduce' => 'av',
                'time' => 'a',
                'location' => 'a',
                'curriculum_content' => ['a', 'b', 'c', 'd'],
            ]);
        }

        return view('admin.training.connection', compact('connections'));
    }
    public function resetConnection()
    {
        Connection::truncate(); // Xóa tất cả bản ghi
        // Có thể thêm bản ghi mặc định ở đây nếu cần
    }
    public function editConnection($id)
    {
        $connection = Connection::findOrFail($id);
        return view('admin.training.editConnection', compact('connection')); // Truyền biến college vào view
    }
    public function updateConnection(Request $request, $id)
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
            $connection = Connection::findOrFail($id);

            // Cập nhật ảnh nếu có
            if ($request->hasFile('introductory_photo')) {
                // Xóa ảnh cũ nếu có
                if ($connection->introductory_photo) {
                    @unlink(public_path($connection->introductory_photo)); // Xóa ảnh cũ từ public
                }

                // Định danh file ảnh
                $fileName = 'introductory_photo1_' . $request->file('introductory_photo')->extension(); // Thêm dấu chấm trước phần mở rộng

                // Lưu ảnh mới vào thư mục public/images
                $request->file('introductory_photo')->storeAs('images', $fileName, 'source'); // Sử dụng 'public' cho filesystem

                // Cập nhật đường dẫn ảnh
                $connection->introductory_photo = 'source/images/' . $fileName; // Cập nhật đường dẫn ảnh
            }
            
            // Cập nhật các thông tin khác
            $connection->introduce = $request->input('introduce');
            $connection->time = $request->input('time');
            $connection->location = $request->input('location');
            $connection->curriculum_content = $request->input('curriculum_content');

            // Lưu bản ghi
            $connection->save();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // Ghi lại lỗi để kiểm tra
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Đã xảy ra lỗi, vui lòng thử lại!'], 500);
        }
    }
    public function showHomeConnection()
{
    $comments = Comment::orderBy('created_at', 'desc')->get(); // Get all comments
    $connections = Connection::all(); // Retrieve all connections
    // Return the view and pass the data
    return view('user.training.college-connection.CollegeConnection', compact('connections', 'comments'));
}
}
