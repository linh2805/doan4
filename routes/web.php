<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController;



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
    return view('admin.index'); // Đường dẫn đến view
});

Route::get('/ad-comment', function () {
    return view('admin.comments.index', compact('comments')); // Truyền vào view
});
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/comments/{id}/edit', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

// Route dành cho user (khách có thể bình luận)
Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');

// Route dành cho admin (quản lý bình luận)
Route::delete('/admin/comments/delete/{id}', [CommentController::class, 'destroy']);
Route::get('/ad-comment', [CommentController::class, 'adminIndex'])->name('admin.comments');

Route::get('/home', [CommentController::class, 'index'])->name('home');





