<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

Route::get('/comments', function () {
    return view('admin.comment.index');
});

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments', action: [CommentController::class, 'showComment'])->name('comments.index');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
// routes/web.php
Route::get('/user', function () {
    return view('user.home.index');
});
Route::get('/user', [CommentController::class, 'index'])->name('home');

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
})->name('admin.index');


Route::get('/ad-register', function () {
    return view('admin.register.index'); // Đường dẫn đến view
});

Route::get('/ad-contact', function () {
    return view('admin.contact.index'); // Đường dẫn đến view
});

Route::get('/account', function () {
    return view('admin.account.index'); // Đường dẫn đến view
});

Route::get('/regis-ad', function () {
    return view('admin.regis-ad'); // Thay 'register' bằng tên tệp blade của bạn
});


// get, post liên hệ user 
Route::get('/ad-contact', action: [ContactController::class, 'showContact'])->name('contacts.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// get, post đky user 
Route::get('/ad-register', [RegistrationController::class, 'showRegistrations'])->name('registrations.index');
Route::post('/register', [RegistrationController::class, 'store'])->name('register');

// đăng ký tk admin 
Route::post('/registerAd', [AccountController::class, 'registerAd'])->name('registerAd');
Route::get('/account', [AccountController::class, 'index'])->name('account.index');

// đăng nhập 
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


