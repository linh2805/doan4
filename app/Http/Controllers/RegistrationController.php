<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'high_school' => 'required|string|max:255',
            'residence' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ]);

        // Store the data in the database
        Registration::create([
            'full_name' => $request->input('full_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'high_school' => $request->input('high_school'),
            'residence' => $request->input('residence'),
            'major' => $request->input('major'),
        ]);

        // Redirect or return a response (e.g., to show a success message)
        return back()->with('success', 'Registration submitted successfully!');
    }
}
