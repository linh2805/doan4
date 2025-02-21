<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Yêu cầu của bạn đã được gửi thành công!');
    }
    public function showContact()
{
    $contacts = Contact::all(); // Lấy tất cả dữ liệu từ bảng contacts
    return view('admin.contact.index', compact('contacts')); // Truyền dữ liệu tới view
}
}