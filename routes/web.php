<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;


// routes/web.php
Route::get('/user', function () {
    return view('user.home.index');
});

Route::get('/university', function () {
    return view('user.training.university-connection.University'); // Đường dẫn đến view
});

Route::get('/intermediate', function () {
    return view('user.training.preschool-intermediate.Intermediate'); // Đường dẫn đến view
});
Route::get('/college', function () {
    return view('user.training.preschool-college.PreschoolCollege'); // Đường dẫn đến view
});
Route::get('/connection', function () {
    return view('user.training.college-connection.CollegeConnection'); // Đường dẫn đến view
});

Route::get('/scholarship', function () {
    return view('user.scholarship.index'); // Đường dẫn đến view
});

Route::get('/register', function () {
    return view('user.register.index'); // Đường dẫn đến view
});

Route::get('/news', function () {
    return view('user.news.index'); // Đường dẫn đến view
});

Route::get('/intro', function () {
    return view('user.introduce.index'); // Đường dẫn đến view
});

Route::get('/contact', function () {
    return view('user.contact.index'); // Đường dẫn đến view
});





