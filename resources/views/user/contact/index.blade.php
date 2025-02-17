@extends('user.index')
@section('name')
@include('user.home.header')
<head>
<link rel="stylesheet" href="source/css/contact.css" type="text/css">

</head>
<div class="container mt-5">
        <div class="" style="height:300px ;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.022146360118!2d105.78179321501318!3d21.037466279005684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab355cc2239b%3A0x9ae247114fb38da3!2zVHLhuqduZyBEw6FpbmcgS2FvIGRhbW5nIEjhu41jIEzhu6luZyBwaG9uZyBhbmQgdGVybQ!5e0!3m2!1svi!2s!4v1610012345678!5m2!1svi!2s"
                width="100%" height="100%" style="border:0;" allowfullscreen=""
                loading="lazy"></iframe>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-7 mb-4">
                <div class="registration-image" style="height: 100%;">
                    <img src="./images/tuvan.jpg" style="height: 90%;" alt="Sinh viên tham gia lớp học">
                </div>
            </div>
            <div class="col-md-5">
                <div class="registration-form">
                    <h2 style="color: #ff9800; font-size: 2rem; animation: pulse 1.5s infinite; text-align: center;">Đăng ký tuyển sinh</h2>
                    <form>
                        <input type="text" placeholder="Họ và tên" class="form-control mb-3" required>
                        <input type="tel" placeholder="Số điện thoại" class="form-control mb-3" required>
                        
                        <input type="email" placeholder="Email" class="form-control mb-3" required>
                        <input type="text" placeholder="Bạn học trường THPT nào?" class="form-control mb-3" required>
                        <input type="text" placeholder="Bạn đang sinh sống ở đâu?" class="form-control mb-3" required>
                        <select class="form-control mb-3" required>
                            <option value="">— Chọn ngành học —</option>
                            <option value="new_student">Học sinh mới</option>
                            <option value="transfer_major">Chuyển ngành</option>
                        </select>
                        <button type="submit" class="btn submit-btn btn-block">GỬI YÊU CẦU</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@include('user.home.footer')