<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Accounts; // Nhập mô hình Accounts
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Nhập lớp Auth
use Illuminate\Support\Facades\Hash; // Để kiểm tra mật khẩu

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Đảm bảo rằng bạn có view này
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Đăng nhập thành công
            return redirect()->intended('admin')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'username' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        // Chỉ cần chuyển hướng về trang đăng nhập
        return redirect('/login')->with('success', 'Bạn đã đăng xuất thành công.');
    }
}