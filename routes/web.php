<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AccountController;






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

// Route::get('/register', function () {
//     return view('user.register.index'); // Đường dẫn đến view
// });

Route::get('/news', function () {
    return view('user.news.index'); // Đường dẫn đến view
});

Route::get('/intro', function () {
    return view('user.introduce.index'); // Đường dẫn đến view
});

Route::get('/register', function () {
    return view('user.registration.index'); // Đường dẫn đến view
});

Route::get('/admin', function () {
    return view('admin.index'); // Đường dẫn đến view admin.index
})->name('admin');

Route::get('/ad-register', function () {
    return view('admin.register.index'); // Đường dẫn đến view
});

Route::get('/ad-contact', function () {
    return view('admin.contact.index'); // Đường dẫn đến view
});

Route::get('/account', function () {
    return view('admin.account.index'); // Đường dẫn đến view
});


Route::get('/ad-contact', action: [ContactController::class, 'showContact'])->name('contacts.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/ad-register', [RegistrationController::class, 'showRegistrations'])->name('registrations.index');
Route::post('/register', [RegistrationController::class, 'store'])->name('register');

Route::get('/', function () {
    return view('admin.regis-ad'); // Thay 'register' bằng tên tệp blade của bạn
});
Route::post('/registerAd', [AccountController::class, 'registerAd'])->name('registerAd');
Route::get('/account', [AccountController::class, 'index'])->name('account.index');


