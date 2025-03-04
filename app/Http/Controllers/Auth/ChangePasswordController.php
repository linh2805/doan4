<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Accounts; 

class ChangePasswordController extends Controller
{
    // Hiển thị form đổi mật khẩu
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    // Xử lý đổi mật khẩu
    public function changePassword(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'current_password' => 'required|string',
            'new_password' => 'required|min:6|confirmed',
        ]);

        // Tìm tài khoản bằng username
        $account = Accounts::where('username', $request->username)->first();

        // Kiểm tra xem tài khoản có tồn tại không
        if (!$account) {
            return back()->withErrors(['username' => 'Tên đăng nhập không tồn tại.']);
        }

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $account->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        // Cập nhật mật khẩu mới
        $account->password = Hash::make($request->new_password);
        $account->save();

        return redirect()->route('login')->with('success', 'Mật khẩu đã được cập nhật thành công.');
    }
}