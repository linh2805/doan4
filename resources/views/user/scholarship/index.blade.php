@extends('user.index')
@section('name')
@include('user.home.header')
<head>
<link rel="stylesheet" href="/source/css/intro.css" type="text/css">

</head>
<div class="container">
        <div class="row mb-5 justify-content-center align-items-center" style="height: 100%;">
            <div class="col-lg-6 p-0 d-flex align-items-stretch">
                <img src="./images/intro.png" alt="Giới thiệu" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center" style="height: 100%;">
                <h2 class="fw-bold">Giới Thiệu Chương Trình</h2>
                <p>Chào mừng bạn đến với trang học bổng dành cho tuyển sinh mầm non. Chúng tôi cung cấp nhiều cơ hội học bổng cho các em nhỏ để giúp các em có điều kiện học tập tốt nhất.</p>
            </div>
        </div>
        
        <div class="scholarship-slider">
            <div class="scholarship-slides">
                <div class="scholarship-slide">
                    <div class="scholarship-slider-text" >
                        <h2>Học bổng xuất sắc</h2>
                    <p>Hỗ trợ toàn bộ học phí cho học sinh xuất sắc.</p>
                    <p><strong>Tiêu chí:</strong> Học sinh đạt điểm trung bình tối thiểu 9.0 trong năm học trước.</p>
                    <p><strong>Cách thức đăng ký:</strong> Nộp đơn đăng ký kèm bảng điểm và thư giới thiệu từ giáo viên.</p>
                    <p><strong>Thời hạn đăng ký:</strong> Từ 1/6 đến 31/7 hàng năm.</p>
                    </div>
                </div>
                <div class="scholarship-slide">
                    <h2>Học bổng hỗ trợ</h2>
                    <p>Giảm 50% học phí cho học sinh có hoàn cảnh khó khăn.</p>
                    <p><strong>Tiêu chí:</strong> Học sinh có hoàn cảnh gia đình khó khăn được xác nhận bởi địa phương.</p>
                    <p><strong>Cách thức đăng ký:</strong> Nộp đơn đăng ký cùng giấy tờ xác nhận hoàn cảnh.</p>
                    <p><strong>Thời hạn đăng ký:</strong> Từ 1/6 đến 31/7 hàng năm.</p>
                </div>
                <div class="scholarship-slide">
                    <h2>Học bổng Khuyến khích</h2>
                    <p>Thưởng 1 triệu đồng cho học sinh đạt thành tích cao.</p>
                    <p><strong>Tiêu chí:</strong> Học sinh đạt giải trong các cuộc thi học thuật hoặc thể thao.</p>
                    <p><strong>Cách thức đăng ký:</strong> Nộp đơn đăng ký kèm bằng khen hoặc giấy chứng nhận thành tích.</p>
                    <p><strong>Thời hạn đăng ký:</strong> Từ 1/6 đến 31/7 hàng năm.</p>
                </div>
            </div>
            <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="next" onclick="changeSlide(1)">&#10095;</button>
        </div>
    
        <h2>Thông Tin Liên Hệ</h2>
        
        <div class="main-container">
			<section class="contact-section mt-5" style="background-color: #ffe0b2; padding: 20px; border-radius: 10px;">
				<div class="row">
					<div class="col-md-6 mb-4">
						<div class="registration-image" style="height: 75%;">
							<img src="./images/tuvan.jpg" alt="Sinh viên tham gia lớp học">
						</div>
					</div>
					<div class="col-md-6 mb-4">
						<div class="contact-form">
							<h3 class="title">Liên Hệ để được tư vấn</h3>
							<form id="registrationForm">
								<div class="form-group">
									<input type="text" name="hoten" class="form-control" placeholder="Họ và tên" required>
								</div>
								<div class="form-group">
									<input type="tel" name="sodienthoai" class="form-control" placeholder="Số điện thoại" required>
								</div>
								<div class="form-group">
									<input type="email" name="diachiemail" class="form-control" placeholder="Email" required>
								</div>
								<div class="form-group">
									<textarea class="form-control" id="message" rows="4" placeholder="Message" required></textarea>
								</div>
								<div class="button-container"> <!-- New container -->
									<button type="submit" class="btn-primary btn-block">Gửi yêu cầu</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			
		</div>
            
        
    </div>
    <script>
        let currentSlide = 0;
    
        function showSlide(index) {
            const slides = document.querySelector('.scholarship-slides');
            const totalSlides = document.querySelectorAll('.scholarship-slide').length;
            
            if (index >= totalSlides) {
                currentSlide = 0;
            } else if (index < 0) {
                currentSlide = totalSlides - 1;
            } else {
                currentSlide = index;
            }
    
            slides.style.transform = 'translateX(' + (-currentSlide * 100) + '%)';
        }
    
        function changeSlide(direction) {
            showSlide(currentSlide + direction);
        }
    
        // Tự động chuyển slide mỗi 5 giây
        
    </script>
@include('user.home.footer')