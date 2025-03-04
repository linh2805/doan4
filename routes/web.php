<?php

use App\Http\Controllers\Training\CollegeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\Training\ConnectionController;
use App\Http\Controllers\Training\IntermediateController;
use App\Http\Controllers\Training\UniversityController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FrequentlyAQController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/change-password', function () {
    return view('auth.change-password');
});

Route::get('/comments', function () {
    return view('admin.comment.index');
});

// routes/web.php
Route::get('/user', function () {
    return view('user.home.index');
});

Route::get('/university', function () {
    return view('user.training.university-connection.University'); // Đường dẫn đến view
});

Route::get('/ad-university', function () {
    return view('admin.training.university'); // Đường dẫn đến view
});

Route::get('/ad-university-edit', function () {
    return view('admin.training.editUniversity'); // Đường dẫn đến view
});


Route::get('/intermediate', function () {
    return view('user.training.preschool-intermediate.Intermediate'); // Đường dẫn đến view
});
Route::get('/ad-intermediate', function () {
    return view('admin.training.intermediate'); // Đường dẫn đến view
});
Route::get('/ad-intermediate-edit', function () {
    return view('admin.training.editIntermediate'); // Đường dẫn đến view
});

Route::get('/college', function () {
    return view('user.training.preschool-college.PreschoolCollege'); // Đường dẫn đến view
});
Route::get('/ad-college', function () {
    return view('admin.training.college'); // Đường dẫn đến view
});
Route::get('/ad-college-edit', function () {
    return view('admin.training.editCollege'); // Đường dẫn đến view
});




Route::get('/connection', function () {
    return view('user.training.college-connection.CollegeConnection'); // Đường dẫn đến view
});

Route::get('/ad-connection', function () {
    return view('admin.training.connection'); // Đường dẫn đến view
});
Route::get('/ad-connection-edit', function () {
    return view('admin.training.editConnection'); // Đường dẫn đến view
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

Route::get('/ad-home-edit', function () {
    return view('admin.edit'); // Đường dẫn đến view
});
Route::get('/ad-home-edit-photo', function () {
    return view('admin.editPhoto'); // Đường dẫn đến view
});
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

Route::get('/ad-intro', function () {
    return view('admin.intro.index'); // Thay 'register' bằng tên tệp blade của bạn
});
Route::get('/ad-intro-edit', function () {
    return view('admin.intro.edit'); // Thay 'register' bằng tên tệp blade của bạn
});
// Route::get('/ad-intro-create', function () {
//     return view('admin.intro.create');
// });

Route::get('/ad-news', function () {
    return view('admin.ad-news.index'); // Thay 'register' bằng tên tệp blade của bạn
});

// get, post liên hệ user 
Route::get('/ad-contact', action: [ContactController::class, 'showContact'])->name('contacts.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');


// giới thiệu 
Route::get('/ad-intro', [IntroController::class, 'index'])->name('intros.index'); // Hiển thị danh sách tất cả bản ghi
Route::get('/ad-intro-edit/{id}', [IntroController::class, 'edit'])->name('intros.edit'); // Hiển thị form chỉnh sửa
Route::post('/ad-intro-edit/{id}', [IntroController::class, 'update'])->name('intros.update'); // Cập nhật bản ghiRoute::get('/ad-intro', [IntroController::class, 'index'])->name('intros.index'); // Hiển thị danh sách tất cả bản ghi
Route::get('/ad-create', [IntroController::class, 'create'])->name('ad-intro-create');
Route::post('/admin', [IntroController::class, 'store'])->name('intros.store');
Route::get('/intro', [IntroController::class, 'showIntroUser'])->name('user.introduce.index');

// bình luận
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments', action: [CommentController::class, 'showComment'])->name('comments.index');
Route::get('/user', action: [CommentController::class, 'showCommentUser'])->name('home');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

// admin home
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/ad-home-edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('/ad-home-edit/{id}', [AdminController::class, 'update'])->name('home-quality.update');
Route::get('/ad-home-edit-photo/{id}', [AdminController::class, 'editPhoto'])->name('admin.editPhoto');
Route::post('/ad-home-edit-photo/{id}', [AdminController::class, 'updatePhoto'])->name('school_photo.update');
Route::get('/user', [AdminController::class, 'showHomeUser'])->name('user.index');

// training 
// college 
Route::get('/ad-college', [CollegeController::class, 'index'])->name('admin.index');
Route::get('/ad-college-edit/{id}', [CollegeController::class, 'editCollege'])->name('college.edit');
Route::post('/ad-college-edit/{id}', [CollegeController::class, 'updateCollege'])->name('college.update');
Route::get('/user', [AdminController::class, 'showHomeUser'])->name('user.index');
Route::get('/college', [CollegeController::class, 'showCollegeAndComments'])->name('user.college');


// university
Route::get('/ad-university', [UniversityController::class, 'index'])->name('admin.index');
Route::get('/ad-university-edit/{id}', [UniversityController::class, 'editUniversity'])->name('university.edit');
Route::post('/ad-university-edit/{id}', [UniversityController::class, 'updateUniversity'])->name('university.update');
Route::get('/user', [AdminController::class, 'showHomeUser'])->name('user.index');
Route::get('/university', [UniversityController::class, 'showHomeUniversity'])->name('user.university');


// intermediate
Route::get('/ad-intermediate', [IntermediateController::class, 'index'])->name('admin.index');
Route::get('/ad-intermediate-edit/{id}', [IntermediateController::class, 'editIntermediate'])->name('intermediate.edit');
Route::post('/ad-intermediate-edit/{id}', [IntermediateController::class, 'updateIntermediate'])->name('intermediate.update');
Route::get('/user', [AdminController::class, 'showHomeUser'])->name('user.index');
Route::get('/intermediate', [IntermediateController::class, 'showHomeIntermediate'])->name('user.intermediate');

// connection
Route::get('/ad-connection', [ConnectionController::class, 'index'])->name('admin.index');
Route::get('/ad-connection-edit/{id}', [ConnectionController::class, 'editConnection'])->name('connection.edit');
Route::post('/ad-connection-edit/{id}', [ConnectionController::class, 'updateConnection'])->name('connection.update');
Route::get('/user', [AdminController::class, 'showHomeUser'])->name('user.index');
Route::get('/connection', [ConnectionController::class, 'showHomeConnection'])->name('user.connection');

//tintuctuc
Route::prefix('admin')->group(function () {
    Route::get('/ad-news', [NewsController::class, 'index'])->name('admin.ad-news.index');
    Route::get('/ad-news/{id}', [NewsController::class, 'show'])->name('ad-news.show');
    Route::get('/ad-news/create', [NewsController::class, 'create'])->name('ad-news.create');
    Route::post('/ad-news', [NewsController::class, 'store'])->name('ad-news.store');    // Đây là route cần kiểm tra
    Route::get('/ad-news/{id}/edit', [NewsController::class, 'edit'])->name('ad-news.edit');
    Route::put('/ad-news/{id}', [NewsController::class, 'update'])->name('ad-news.update');
    Route::delete('/ad-news/{id}', [NewsController::class, 'destroy'])->name('ad-news.delete');
    
});
Route::get('/ad-news', [NewsController::class, 'index'])->name('ad-news.index');
Route::get('/news', [NewsController::class, 'list'])->name('user.news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('user.news.show');

// comment 4
Route::get('/user', [AdminController::class, 'showHomeUser'])->name('user.index');

// câu hỏi thường gặp 
Route::get('/ad-frequentlyAQ', function () {
    return view('admin.frequentlyAQ.index'); // Thay 'register' bằng tên tệp blade của bạn
});
Route::get('/ad-frequentlyAQ-create', function () {
    return view('admin.frequentlyAQ.create'); // Thay 'register' bằng tên tệp blade của bạn
});
Route::get('/ad-frequentlyAQ-edit', function () {
    return view('admin.frequentlyAQ.edit'); // Thay 'register' bằng tên tệp blade của bạn
});
Route::post('/ad-frequentlyAQ', [FrequentlyAQController::class, 'store'])->name('FrequentlyAQ.store');
Route::get('/ad-frequentlyAQ', [FrequentlyAQController::class, 'index'])->name('FrequentlyAQ.index');
Route::get('/ad-frequentlyAQ-edit/{id}', [FrequentlyAQController::class, 'edit'])->name('FrequentlyAQ.edit');
Route::put('/frequentlyAQ/{id}', [FrequentlyAQController::class, 'update'])->name('FrequentlyAQ.update');
Route::delete('/frequentlyAQ/{id}', [FrequentlyAQController::class, 'destroy'])->name('FrequentlyAQ.destroy');

// đăng nhập 
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Route cho hiển thị form đăng nhập
Route::post('/login', [LoginController::class, 'login'])->name('login.submit'); // Route xử lý đăng nhập
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('change.password');
Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change.password.submit');
