<?php
namespace App\Http\Controllers;

use App\Models\HomeQuality;
use App\Models\SchoolPhoto;
use App\Models\College;
use App\Models\Connection;
use App\Models\Intermediate;
use App\Models\University;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        // Lấy tất cả bản ghi
        $homeQualities = HomeQuality::all();

        // Kiểm tra nếu bảng rỗng và thêm bản ghi mặc định
        if ($homeQualities->isEmpty()) {
            HomeQuality::create([
                'classroom_system' => 'a',
                'image1' => 'source/images/home_quality_image1.jpg',
                'image2' => 'source/images/home_quality_image2.jpg',
                'image3' => 'source/images/home_quality_image3.jpg',
                'image4' => 'source/images/home_quality_image4.jpg',
                'lab_system' => 'a',
            ]);
        }
        $schoolPhotos = SchoolPhoto::all();

    // Kiểm tra nếu bảng rỗng và thêm bản ghi mặc định
    if ($schoolPhotos->isEmpty()) {
        SchoolPhoto::create([
            'image1' => 'storage/photos/school_photo_image1.jpg',
            'image2' => 'storage/photos/school_photo_image2.jpg',
            'image3' => 'storage/photos/school_photo_image3.jpg',
            'image4' => 'storage/photos/school_photo_image4.jpg',
            'image5' => 'storage/photos/school_photo_image5.jpg',
            'image6' => 'storage/photos/school_photo_image6.jpg',
            'image7' => 'storage/photos/school_photo_image7.jpg',

        ]);
    }

        return view('admin.index', compact('homeQualities', 'schoolPhotos'));
    }
    public function resetHomeQuality()
    {
        HomeQuality::truncate(); // Xóa tất cả bản ghi
        // Có thể thêm bản ghi mặc định ở đây nếu cần
    }
    public function edit($id)
    {
        $homeQuality = HomeQuality::findOrFail($id);
        return view('admin.edit', compact('homeQuality'));
    }

    public function update(Request $request, $id)
    {
        \Log::info($request->all());
        try {
            // Xác thực dữ liệu
            $request->validate([
                'classroom_system' => 'required|string|max:500',
                'lab_system' => 'nullable|string|max:500',
                'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            // Tìm bản ghi HomeQuality
            $homeQuality = HomeQuality::first(); // Lấy bản ghi đầu tiên (nếu có)

            if (!$homeQuality) {
                // Nếu không có bản ghi nào, tạo một bản ghi mới với giá trị mặc định
                $homeQuality = HomeQuality::create([
                    'classroom_system' => $request->classroom_system,
                    'lab_system' => $request->lab_system,
                    // Khởi tạo ảnh mặc định nếu cần
                ]);
            }

            // Cập nhật ảnh
            $imagePaths = []; // Mảng để lưu đường dẫn ảnh

            foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    // Xóa ảnh cũ nếu có
                    if ($homeQuality->$imageField) {
                        @unlink(public_path($homeQuality->$imageField)); // Xóa ảnh cũ từ public
                    }

                    // Định danh file ảnh
                    $fileName = 'home_quality_' . $imageField . '.' . $request->file($imageField)->extension();

                    // Lưu ảnh mới vào thư mục source/images
                    $path = $request->file($imageField)->storeAs('images', $fileName, 'source'); // Lưu vào source/images

                    // Lưu đường dẫn vào mảng
                    $imagePaths[$imageField] = 'source/images/' . $fileName;
                    
                }
            }

            // Cập nhật dữ liệu home quality
            $homeQuality->update(array_merge($imagePaths, [
                'classroom_system' => $request->classroom_system,
                'lab_system' => $request->lab_system,
            ]));

            return response()->json($homeQuality);

        } catch (\Exception $e) {
            // Ghi lại lỗi để kiểm tra
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Đã xảy ra lỗi, vui lòng thử lại!'], 500);
        }
    }


    public function editPhoto($id)
    {
        $schoolPhoto = SchoolPhoto::findOrFail($id);
        return view('admin.editPhoto', compact('schoolPhoto')); // Kiểm tra tên view
    }
    
    public function updatePhoto(Request $request, $id)
    {
        \Log::info($request->all());
        try {
            // Xác thực dữ liệu
            $request->validate([
                'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image7' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            // Tìm bản ghi SchoolPhoto
            $schoolPhoto = SchoolPhoto::findOrFail($id);
    
            // Cập nhật ảnh
            $imagePaths = []; // Mảng để lưu đường dẫn ảnh
    
            foreach (range(1, 7) as $index) {
                $imageField = 'image' . $index;
                if ($request->hasFile($imageField)) {
                    // Xóa ảnh cũ nếu có
                    if ($schoolPhoto->$imageField) {
                        @unlink(public_path($schoolPhoto->$imageField)); // Xóa ảnh cũ từ public
                    }
    
                    // Định danh file ảnh
                    $fileName = 'school_photo_' . $imageField . '.' . $request->file($imageField)->extension();
    
                    // Lưu ảnh mới vào thư mục public/photos
                    $path = $request->file($imageField)->storeAs('photos', $fileName, 'public'); // Lưu vào public/photos
    
                    // Lưu đường dẫn vào mảng
                    $imagePaths[$imageField] = 'storage/photos/' . $fileName; // Cập nhật đường dẫn
                }
            }
    
            // Cập nhật dữ liệu SchoolPhoto
            $schoolPhoto->update(array_merge($imagePaths, [])); // Cập nhật ảnh
    
            return response()->json(['success' => true]);
    
        } catch (\Exception $e) {
            // Ghi lại lỗi để kiểm tra
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Đã xảy ra lỗi, vui lòng thử lại!'], 500);
        }
    }

    public function showHomeUser()
{
    // Lấy dữ liệu từ các bảng
    $homeQualities = HomeQuality::all();
    $schoolPhotos = SchoolPhoto::all();
    $colleges = College::all();
    $connections = Connection::all(); 
    $intermediates = Intermediate::all();
    $universitys = University::all(); 

    // Trả về view và truyền dữ liệu
    return view('user.home.index', compact('homeQualities', 'schoolPhotos', 'colleges', 'connections', 'intermediates', 'universitys'));
}
}
