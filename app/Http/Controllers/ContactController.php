<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
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
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id); // Tìm contact theo ID
        $contact->delete(); // Xóa contact

        return redirect()->back()->with('success', 'Contact đã được xóa thành công!'); // Chuyển hướng với thông báo
    }
    public function deleteAll()
    {
        Contact::truncate(); // Xóa tất cả bản ghi trong bảng contacts
        return redirect()->back()->with('success', 'Contact đã được xóa thành công!'); // Chuyển hướng với thông báo
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Tìm kiếm bằng bất kỳ trường nào trong 'title', 'content' hoặc 'extra_content'
            $contacts = Contact::where('fullname', 'LIKE', "%{$query}%")
                ->orWhere('phone', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->orWhere('message', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $contacts = Contact::all();
        }

        return view('admin.contact.search', ['contacts' => $contacts]);
    }
}