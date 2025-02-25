<?php

namespace App\Http\Controllers;

use App\Models\Intro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IntroController extends Controller
{
    public function show($id)
{
    $intros = Intro::findOrFail($id); // Lấy tất cả bản ghi
    dd($intros); // Dừng lại và in ra nội dung của biến $thu

    return view('admin.intro.index', compact('intros')); // Truyền tất cả bản ghi vào view
}

    

    public function edit($id)
    {
        $intros = Intro::findOrFail($id);
        return view('admin.intro.edit', compact('intros'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image4' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image5' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $intro = Intro::findOrFail($id);

        // Cập nhật ảnh nếu có
        foreach (range(1, 5) as $index) {
            $imageField = 'image' . $index;
            if ($request->hasFile($imageField)) {
                // Xóa ảnh cũ nếu cần
                if ($intro->$imageField) {
                    Storage::delete(public_path($intro->$imageField));
                }
                $file = $request->file($imageField);
                $filename = time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $filename);
                $intro->$imageField = 'uploads/' . $filename;
            }
        }

        $intro->save();

        return redirect()->route('intros.index')->with('success', 'Ảnh đã được cập nhật thành công!');
    }
}