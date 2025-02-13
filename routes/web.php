<?php

use Illuminate\Support\Facades\Route;

// routes/web.php
Route::get('/user', function () {
    return view('user.home.index');
});

Route::get('/training', function () {
    return view('user.training.index'); // Đường dẫn đến view
});

Route::get('/scholarship', function () {
    return view('user.scholarship.index'); // Đường dẫn đến view
});


