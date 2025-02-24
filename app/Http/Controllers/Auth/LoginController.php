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
    return view('auth.login'); // Kiểm tra file này có tồn tại không
}


    public function someFunction()
    {
        $account = Auth::user();
        // Xử lý thông tin người dùng
    }    
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string', // Thay 'username' bằng 'email' nếu bạn dùng email
            'password' => 'required|string',
        ]);

        // Tìm tài khoản trong bảng accounts
        $account = Accounts::where('username', $request->username)->first(); // Hoặc 'email'
        
        if ($account && Hash::check($request->password, $account->password)) {
            Auth::login($account);
            $user = Auth::user(); 
// dd($user);

            return redirect()->route('admin.index')->with('success', 'Tài khoản đã được chấp nhận!');
            
           }

        // Đăng nhập thất bại
        return redirect()->back()->with('error', 'Thông tin đăng nhập không chính xác.');
        }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Đăng xuất thành công!');
    }
    }