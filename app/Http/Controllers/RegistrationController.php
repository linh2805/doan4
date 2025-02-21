<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'school' => 'required|string|max:255',
            'residence' => 'required|string|max:255',
            'major' => 'required|string',
        ]);

        Registration::create($request->all());

        return redirect()->back()->with('success', 'Đăng ký thành công!');
    }
    public function showRegistrations()
{
    $registrations = Registration::all(); // Lấy tất cả bản ghi từ bảng registrations
    return view('admin.register.index', compact('registrations')); // Truyền dữ liệu đến view
}
}