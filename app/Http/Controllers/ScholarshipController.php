<?php
namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function Index2()
    {
        $scholarships = Scholarship::all(); // Lấy tất cả học bổng
        return view('user.scholarship.index', compact('scholarships'));
    }
    public function userIndex()
    {
        try {
            $scholarships = Scholarship::all();
            return view('user.home.index', compact('scholarships'));
        } catch (\Exception $e) {
            return back()->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }
    // Trang học bổng cho Admin
    public function index()
    {
        $scholarships = Scholarship::all();
        return view('admin.ad-hb.index', compact('scholarships'));
    }

    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        return view('admin.ad-hb.edit', compact('scholarship'));
    }


    public function update(Request $request, $id)
    {
        $scholarship = Scholarship::find($id);

        if (!$scholarship) {
            return redirect()->back()->with('error', 'Không tìm thấy học bổng!');
        }

        $scholarship->title = $request->title;
        $scholarship->description = $request->description;
        $scholarship->criteria = $request->criteria;

        if ($scholarship->save()) {
            return redirect('/admin')->with('success', 'Cập nhật thành công!');

        } else {
            return redirect()->back()->with('error', 'Cập nhật thất bại!');
        }
    }

    // public function destroy($id)
    // {
    //     Scholarship::findOrFail($id)->delete();
    //     return redirect()->route('admin.ad-hb.index')->with('success', 'Học bổng đã bị xóa.');

    // }

    public function destroy($id)
    {
        $scholarship = Scholarship::find($id);
        if ($scholarship) {
            $scholarship->delete();
            return response()->json(['success' => 'Xóa thành công!']);
        }
        return response()->json(['error' => 'Không tìm thấy mục!'], 404);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'criteria' => 'nullable|string',
            'type' => 'nullable|string',
        ]);

        $scholarship = Scholarship::create([
            'title' => $request->title,
            'description' => $request->description,
            'criteria' => $request->criteria,
            'type' => $request->type ?? 'general',
        ]);

        // Kiểm tra nếu là AJAX request
        if ($request->ajax()) {
            return response()->json(['success' => 'Học bổng đã được thêm!', 'scholarship' => $scholarship]);
        }

        return redirect()->route('admin.ad-hb.index')->with('success', 'Học bổng đã được thêm!');
    }


}