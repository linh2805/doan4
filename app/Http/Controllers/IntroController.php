<?php

namespace App\Http\Controllers;

use App\Models\Intro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IntroController extends Controller
{

    public function index()
    {
        $intros = Intro::all(); // Lấy tất cả bản ghi
        return view('admin.intro.index', compact('intros')); // Truyền vào view
    }

    public function showIntroUser()
    {
        $intros = Intro::all(); // Lấy tất cả bản ghi
        return view('user.introduce.index', compact('intros')); // Truyền vào view
    }

    public function create()
    {
        return view('admin.intro.create'); // Trả về view chứa form tạo mới
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'intro_school' => 'required|string|max:1000',
                'job' => 'nullable|string|max:1000',
                'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            // Xử lý ảnh
            $imagePaths = [];
            foreach (['image1', 'image2', 'image3', 'image4', 'image5'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    $fileName = $request->get('title') . '_' . $imageField . '.' . $request->file($imageField)->extension();
                    $path = $request->file($imageField)->storeAs('images', $fileName, 'source');

                    // Lưu đường dẫn vào mảng
                    $imagePaths[$imageField] = 'source/images/' . $fileName;
                }
            }
            Intro::truncate(); // Hoặc Intro::query()->delete();

            // Tạo bản ghi mới
            Intro::create(array_merge($imagePaths, [
                'intro_school' => $request->intro_school,
                'job' => $request->job,
            ]));

            // Chuyển hướng về trang admin
            return redirect()->route('admin.index')->with('success', 'Dữ liệu đã được lưu thành công!');
        } catch (\Exception $e) {
            dd($request->all());
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $intros = Intro::findOrFail($id);
        return view('admin.intro.edit', compact('intros'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Xác thực dữ liệu
            $request->validate([
                'intro_school' => 'required|string|max:1000',
                'job' => 'nullable|string|max:1000',
                'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            // Tìm bản ghi Intro
            $intro = Intro::findOrFail($id);
            // $intro->update($request->all());


            // Cập nhật ảnh
            $imagePaths = []; // Mảng để lưu đường dẫn ảnh

            foreach (['image1', 'image2', 'image3', 'image4', 'image5'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    // Xóa ảnh cũ nếu có
                    if ($intro->$imageField) {
                        @unlink(public_path($intro->$imageField)); // Xóa ảnh cũ từ public
                    }

                    // Định danh file ảnh
                    $fileName = $request->get('title') . '_' . $imageField . '.' . $request->file($imageField)->extension();

                    // Lưu ảnh mới vào thư mục source/images
                    $path = $request->file($imageField)->storeAs('images', $fileName, 'source'); // Lưu vào source/images

                    // Lưu đường dẫn vào mảng
                    $imagePaths[$imageField] = 'source/images/' . $fileName;
                }
            }

            // Cập nhật dữ liệu intro
            $intro->update(array_merge($imagePaths, [
                'intro_school' => $request->intro_school,
                'job' => $request->job,
            ]));

            // return response()->json(['success' => true, 'message' => 'Cập nhật thành công!']);
            return response()->json($intro);


        } catch (\Exception $e) {
            // Ghi lại lỗi để kiểm tra
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Đã xảy ra lỗi, vui lòng thử lại!'], 500);
        }
    }
}