@extends('user.index')
@section('name')
@include('user.home.header')

<head>
    <link rel="stylesheet" href="source/css/contact.css" type="text/css">

</head>
<div class="container mt-5" style="padding-top:100px;">
    <h1 class="registration-title" style="font-size:30px;">Đăng ký tuyển sinh</h1>
    <div class="" style="height:300px ;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.022146360118!2d105.78179321501318!3d21.037466279005684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab355cc2239b%3A0x9ae247114fb38da3!2zVHLhuqduZyBEw6FpbmcgS2FvIGRhbW5nIEjhu41jIEzhu6luZyBwaG9uZyBhbmQgdGVybQ!5e0!3m2!1svi!2s!4v1610012345678!5m2!1svi!2s"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="registration-container" style="margin-top: 30px;padding-bottom: 30px;">
        <div class="registration-image col-md-7 mb-4">
            <img src="./images/tuvan.jpg" style="height: 100%; width: 100%; object-fit: cover;"
                alt="Sinh viên tham gia lớp học">
        </div>
        <div class="registration-form col-md-5 d-flex flex-column justify-content-between">
            <form class="form">
                <input type="text" placeholder="Họ và tên" class="input-field" required>
                <input type="tel" placeholder="Số điện thoại" class="input-field" required>
                <input type="email" placeholder="Email" class="input-field" required>
                <input type="text" placeholder="Bạn học trường THPT nào?" class="input-field" required>
                <input type="text" placeholder="Bạn đang sinh sống ở đâu?" class="input-field" required>
                <select class="input-field" required>
                    <option value="">— Chọn ngành học —</option>
                    <option value="new_student">Học sinh mới</option>
                    <option value="transfer_major">Chuyển ngành</option>
                    <option value="kindergarten_education">Giáo dục mầm non</option>
                    <option value="primary_education">Giáo dục tiểu học</option>
                    <option value="special_education">Giáo dục đặc biệt</option>
                    <option value="foreign_languages">Ngoại ngữ</option>
                    <option value="information_technology">Công nghệ thông tin</option>
                </select>
                <div class="button-container">
                    <button type="submit" class="submit-button">GỬI YÊU CẦU</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

@include('user.home.footer')
