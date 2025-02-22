<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function registerAd(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:accounts',
            'phone' => 'required|string|max:15',
            'username' => 'required|string|max:255|unique:accounts',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
        ]);

        try {
            // Tạo người dùng mới
            Accounts::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone' => $request->phone,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            // Chuyển hướng đến route admin sau khi đăng ký thành công
            return redirect()->route('admin')->with('success', 'Đăng ký thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đăng ký thất bại: ' . $e->getMessage());
        }
    }
    public function index()
    {
        // Lấy tất cả dữ liệu từ bảng accounts
        $accounts = Accounts::all();

        // Trả về view cùng với dữ liệu
        return view('admin.account.index', compact('accounts'));
    }
}