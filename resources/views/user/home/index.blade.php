@extends('user.index')
@section('name')
@include('user.home.header')
<div id="page">
    <section class="banner-section">
        <div class="content">
            <h1>Tuyển sinh cao đẳng mầm non</h1>
            @foreach($colleges as $college)
            <p>{{ $college->introduce }}</p>
            @endforeach

            <button class="btn-header"><a href="#training-program">Tìm hiểu thêm</a></button>
        </div>
        <div class="image">
            @foreach($colleges as $college)
            <div class="photo" style="padding-top:75px;">
                <img src="{{ asset($college->introductory_photo) }}" alt="Giới thiệu" class="img-fluid">
            </div>
            @endforeach
        </div>
    </section>
    <section class="awe-section-5" id="training-program">
        <div class="section_service">
            <div class="container" id="element3">
                <div class="section_service_title text-center">
                    <h3 class="train">Chương trình đào tạo</h3>
                </div>
                <div class="row">
                    <!-- SƯ PHẠM TIỂU HỌC -->
                    <div class="col-lg-3 col-md-3 col-sm-6" style="animation-delay: 0.8s;">
                        <div class="services-box">
                            <div class="icon">
                                <i class="fa-solid fa-book"
                                    style="width: 75px; height: 75px; color:#ffffff; padding-top: 17px;"></i>
                            </div>
                            <h3>CAO ĐẲNG MẦM NON</h3>
                            @foreach($colleges as $college)
                            <p>{{ $college->introduce }}</p>
                            @endforeach
                            <a href="{{ url('/college') }}" title="Xem thêm">xem thêm</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6" style="animation-delay: 0.8s;">
                        <div class="services-box">
                            <div class="icon">
                                <i class="fa-solid fa-globe"
                                    style="width: 75px; height: 75px; color:#ffffff; padding-top: 17px;"></i>
                            </div>
                            <h3>TRUNG CẤP MẦM NON</h3>
                            @foreach($intermediates as $intermediate)
                            <p>{{ $intermediate->introduce }}</p>
                            @endforeach
                            <a href="{{ url('/intermediate') }}" title="Xem thêm">xem thêm</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6" style="animation-delay: 0.8s;">
                        <div class="services-box">
                            <div class="icon">
                                <i class="fa-solid fa-calculator"
                                    style="width: 75px; height: 75px; color:#ffffff; padding-top: 17px;"></i>
                            </div>
                            <h3>LIÊN THÔNG CAO ĐẲNG</h3>
                            @foreach($connections as $connection)
                            <p>{{ $connection->introduce }}</p>
                            @endforeach
                            <a href="{{ url('/connection') }}" title="Xem thêm">xem thêm</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6" style="animation-delay: 0.8s;">
                        <div class="services-box">
                            <div class="icon">
                                <i class="fa-solid fa-atom"
                                    style="width: 75px; height: 75px; color:#ffffff; padding-top: 17px;"></i>
                            </div>
                            <h3>LIÊN THÔNG ĐẠI HỌC</h3>
                            @foreach($universitys as $university)
                            <p>{{ $university->introduce }}</p>
                            @endforeach
                            <a href="{{ url('/university') }}" title="Xem thêm">xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_professional section_effect" id="scholarship">
        <div class="container">
            <h1 class="professional-tilte">Học Bổng</h1>
            <div class="row">
                @if(isset($scholarships) && $scholarships->count() > 0)
                @foreach ($scholarships as $scholarship)
                <div class="col-lg-4 col-sm-4">
                    <div class="single-box-item">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <h3>{{ $scholarship->title }}</h3>
                        <p>{{ $scholarship->description }}</p>
                        <a href="{{ url('/scholarship') }}" title="Xem thêm">Xem thêm</a>
                    </div>
                </div>
                @endforeach
                @else
                <p>Không có học bổng nào!</p>
                @endif
            </div>
        </div>
    </section>
    <!-- HTML -->
    @foreach ($homeQualities as $homeQuality)

    <section class="container py-5 facility-section">
        <div class="facility">
            <h1 class="facility-title">CHẤT LƯỢNG TRƯỜNG HỌC</h1>
            <div class="section">
                <div class="left-column">
                    <div class="card">
                        <h2>Hệ thống lớp học</h2>
                        <p>{{ $homeQuality->classroom_system }}</p>
                    </div>
                </div>
                <div class="right-column img-container">
                    <img src="{{ asset($homeQuality->image1) }}" alt="Hệ thống lớp học">
                    <img src="{{ asset($homeQuality->image2) }}" alt="Hệ thống lớp học">
                </div>
            </div>
            <div class="section">
                <div class="left-column img-container">
                    <img src="{{ asset($homeQuality->image3) }}" alt="Giáo dục thể chất">
                    <img src="{{ asset($homeQuality->image4) }}" alt="Hệ thống lớp học">
                </div>
                <div class="right-column">
                    <div class="card">
                        <h2>Hệ thống phòng thực hành</h2>
                        <p>{{ $homeQuality->lab_system }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach

    <section>
        <h2 style="text-align: center;">Bình luận</h2>
        <div class="mt-5 ct-testimonial">
            <!-- <div class="testimonial">
                <h5>Eugene Freeman</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed diam nonummy nibh euismod tincidunt
                    ut
                    laoreet dolore magna aliquam erat volutpat.</p>
            </div> -->
            <div class="testimonials">

                <!-- @isset($comments) -->

                @foreach ($comments as $comment)
                <div class="testimonial">
                    <!-- Nếu bạn có hình ảnh của người dùng, hãy bỏ comment dòng dưới -->
                    <h5>{{ $comment->name }}</h5>
                    <p>{{ $comment->comment }}</p>
                </div>
                @endforeach
                <!-- @endisset -->

            </div>
        </div>

        <!-- New Comments Will Appear Here -->
        <div id="comments-section" class="ct-testimonial"></div>

        <!-- Comment Form -->
        <div class="comment-form">
            <h3>Write a Comment</h3>
            <!-- <textarea id="comment-input" rows="4" placeholder="Write your comment here..."></textarea>
            <button type="submit">Post Comment</button> -->
            @if(session('success'))
            <div>{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <input type="text" name="name" placeholder="Tên bạn" required>

                <textarea id="comment-input" name="comment" rows="4"
                    placeholder="Write your comment here..."></textarea>
                <button type="submit">Post Comment</button>
            </form>
        </div>
    </section>
    @foreach ($schoolPhotos as $schoolPhoto)

    <section class="content-wrapper">
        <div class="gallery-container">
            <!-- Row 1 -->
            <div class="gallery-row">
                <div class="gallery-item">
                    <img src="{{ asset($schoolPhoto->image1) }}" alt="Students sitting" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset($schoolPhoto->image2) }}" alt="Students at desk" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset($schoolPhoto->image3) }}" alt="Stage performance" class="gallery-img">
                </div>
            </div>
            <div class="gallery-row">
                <div class="gallery-item">
                    <img src="{{ asset($schoolPhoto->image4) }}" alt="School building" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset($schoolPhoto->image5) }}" alt="Students outside" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset($schoolPhoto->image6) }}" alt="Stage performance" class="gallery-img">
                </div>
            </div>

        </div>
    </section>
    @endforeach

    <div class="main-container" id="contact">
        <section class="contact-section mt-5">
            <div class="row">
                <div class="col-md-6 mb-4">
                    @foreach ($schoolPhotos as $schoolPhoto)

                    <div class="contact-image">
                        <img src="{{ asset($schoolPhoto->image7) }}" alt="Sinh viên tham gia lớp học">
                    </div>
                    @endforeach

                </div>
                <div class="col-md-6 mb-4">
                    <div class="contact-form"
                        style="border: 2px solid #ff9800; border-radius: 10px; padding: 20px; background-color: white;">

                        <h3 class="contact-title">Liên Hệ để được tư vấn</h3>
                        <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <!-- Thêm token CSRF để bảo mật -->
                            <div class="form-group">
                                <input type="text" name="fullname" class="form-control" placeholder="Họ và tên"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" placeholder="Số điện thoại"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="4" placeholder="Tin nhắn"
                                    required></textarea>
                            </div>
                            <div class="button-container">
                                <button type="submit" class="btn-submit">Gửi yêu cầu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


</div>
<!-- Mobile Menu-->
<div id="mobile-menu">
    <div class="mobile-menu ">
        <div class="mm-close">
            <div class="mm-toggle">
                <i class="fa fa-times" aria-hidden="true" style="color:#071b0c"></i>
            </div>
        </div>
    </div>
    <ul id="menu-menu-main" class="">
        <li
            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-8 current_page_item menu-item-78 level parent drop-menu">
            <a href="#about-us" aria-current="page">Giới thiệu</a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80 level parent drop-menu"><a
                href="#training-program">Chương trình đào tạo</a></li>
        <li
            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-84 level parent drop-menu">
            <a href="#scholarship">Học bổng</a>
        </li>
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-85 level parent drop-menu">
            <a href="#quality">Tin tức</a>

        </li>
        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-85 level parent drop-menu">
            <a href="#job">Đăng kí</a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-146 level parent drop-menu"><a
                href="#contact">Liên hệ</a></li>
    </ul>
</div>

<div class="chat-section">
    <div class="chat-icon" onclick="window.open('https://www.facebook.com/DHSPHN2')">
        <img src="/source/images/mes.webp" alt="Zalo" class="zalo-icon">
    </div>
    <div class="chat-icon" onclick="window.open()">
        <img src="/source/images/zalo.png" alt="Zalo" class="zalo-icon"> <!-- Biểu tượng Zalo -->
    </div>
    <div class="chat-icon" onclick="showQR()">
        <i class="fa-solid fa-phone fa-xl" style="color: #ffffff;"></i>
    </div>
</div>
@include('user.home.footer')




<script>
// Hàm kiểm tra khi phần tử vào viewport
function checkVisibility() {
    const elements = document.querySelectorAll('.single-box');

    elements.forEach(element => {
        const rect = element.getBoundingClientRect();

        if (rect.top < window.innerHeight && rect.bottom >= 0) {
            element.classList.add('show');
        }
    });
}

// Gọi hàm khi người dùng cuộn trang
window.addEventListener('scroll', checkVisibility);

// Kiểm tra ngay khi tải trang
document.addEventListener('DOMContentLoaded', checkVisibility);
</script>



<script>
// Chọn tất cả các thẻ card
const cards = document.querySelectorAll('.card');

// Hàm kiểm tra xem phần tử đã vào viewport chưa
const isInViewport = (element) => {
    const rect = element.getBoundingClientRect();
    return rect.top <= window.innerHeight && rect.bottom >= 0;
};

// Hàm kích hoạt hiệu ứng
const handleScroll = () => {
    cards.forEach((card) => {
        if (isInViewport(card)) {
            card.classList.add('show');
        }
    });
};

// Lắng nghe sự kiện scroll
window.addEventListener('scroll', handleScroll);

// Kích hoạt khi load trang
handleScroll();
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Lấy tất cả các phần tử cần hiệu ứng
    const sections = document.querySelectorAll('.section_effect');

    // Tạo một đối tượng IntersectionObserver để kiểm tra khi phần tử vào viewport
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add(
                    'active'); // Thêm class "active" để kích hoạt hiệu ứng
                observer.unobserve(entry.target); // Dừng quan sát khi đã kích hoạt hiệu ứng
            }
        });
    }, {
        threshold: 0.5 // Kích hoạt khi phần tử chiếm ít nhất 10% viewport
    });

    // Quan sát tất cả các phần tử cần hiệu ứng
    sections.forEach(section => {
        observer.observe(section);
    });
});
</script>

<script>
window.onscroll = function() {
    var topLink = document.getElementById("top-link");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        topLink.style.display = "block"; // Hiển thị nút khi cuộn xuống
    } else {
        topLink.style.display = "none"; // Ẩn nút khi ở đầu trang
    }
};
</script>
<script>
document.getElementById('top-link').addEventListener('click', function(e) {
    e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

    const targetPosition = 0; // Vị trí đích
    const startPosition = window.scrollY; // Vị trí hiện tại
    const distance = targetPosition - startPosition; // Khoảng cách cần cuộn
    const duration = 1500; // Thời gian cuộn (3 giây)
    let startTime = null; // Thời gian bắt đầu

    function animation(currentTime) {
        if (startTime === null) startTime = currentTime; // Lưu thời gian bắt đầu
        const timeElapsed = currentTime - startTime; // Thời gian đã trôi qua
        const progress = Math.min(timeElapsed / duration, 1); // Tính tỷ lệ hoàn thành

        // Tính vị trí hiện tại dựa trên tỷ lệ hoàn thành
        window.scrollTo(0, startPosition + distance * progress);

        if (timeElapsed < duration) {
            requestAnimationFrame(animation); // Tiếp tục gọi hàm cho đến khi hoàn thành
        }
    }

    requestAnimationFrame(animation); // Bắt đầu hoạt động
});
</script>