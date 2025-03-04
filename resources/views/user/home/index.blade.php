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
                <div class="col-lg-6 p-0">
                    <img src="{{ asset($college->introductory_photo) }}" alt="Giới thiệu" class="img-fluid"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            @endforeach
        </div>
    </section>
    <section class="awe-section-5" id="training-program">
        <div class="section_service">
            <div class="container" id="element3">
                <div class="section_service_title text-center fade-in">
                    <h3 class="train">Chương trình đào tạo</h3>
                </div>
                <div class="row">
                    <!-- SƯ PHẠM TIỂU HỌC -->
                    <div class="col-lg-3 col-md-3 col-sm-6 fade-in" style="animation-delay: 0.8s;">
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
                    <div class="col-lg-3 col-md-3 col-sm-6 fade-in" style="animation-delay: 0.8s;">
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
                    <div class="col-lg-3 col-md-3 col-sm-6 fade-in" style="animation-delay: 0.8s;">
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
                    <div class="col-lg-3 col-md-3 col-sm-6 fade-in" style="animation-delay: 0.8s;">
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
                <div class="col-lg-4 col-sm-4">
                    <div class="single-box-item">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <h3>Học Bổng Xuất Sắc</h3>
                        <p>Ưu đãi 100% học phí cho sinh viên đạt điểm đầu vào cao nhất hoặc có thành tích học
                            tập
                            xuất sắc.</p>
                        <a href="{{ url('/scholarship') }}" title="Xem thêm">xem thêm</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="single-box-item">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <h3>Học Bổng Hỗ Trợ</h3>
                        <p>Giảm 50% học phí cho sinh viên có hoàn cảnh đặc biệt khó khăn nhưng đạt yêu cầu xét
                            tuyển.</p>
                        <a href="{{ url('/scholarship') }}" title="Xem thêm">xem thêm</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="single-box-item">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <h3>Học Bổng Khuyến Khích</h3>
                        <p>Giảm 30% học phí cho sinh viên đăng ký sớm trước ngày X và đáp ứng đủ điều kiện.</p>
                        <a href="{{ url('/scholarship') }}" title="Xem thêm">xem thêm</a>
                    </div>
                </div>
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
                            @csrf <!-- Thêm token CSRF để bảo mật -->
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


<script type='text/javascript'
    src='https://dv15.mediawz.com/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.5.1'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var twentyseventeenScreenReaderText = {
        "quote": "<svg class=\"icon icon-quote-right\" aria-hidden=\"true\" role=\"img\"> <use href=\"#icon-quote-right\" xlink:href=\"#icon-quote-right\"><\/use> <\/svg>"
    };
    /* ]]> */
</script>

<script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    function showSlide(index) {
        const offset = -index * 100; // Tính toán vị trí để chuyển đổi
        document.querySelector('.slides').style.transform = `translateX(${offset}%)`; // Di chuyển slides
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides; // Cập nhật chỉ số
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides; // Cập nhật chỉ số
        showSlide(currentIndex);
    }

    setInterval(nextSlide, 55000); // Chuyển slide mỗi 3 giây
</script>
<!-- 
>>>>>>> 58ee25ef7acbeb0faeeacdc9e23cd1b59c7303d4
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const section = document.querySelector('.register-section');


			const observer = new IntersectionObserver((entries, observer) => {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						section.classList.add('show');
						
						observer.disconnect(); 
						
					}
				});
			}, {
				threshold: 0.5 
				
			});

			observer.observe(section); 
			
		});
	</script>
 -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sections = [{
            id: 'element1',
            fadeClass: 'fade-in-left',
            duration: 3000
        },
        {
            id: 'element2',
            fadeClass: 'fade-in-right',
            duration: 3000
        },
        // { id: 'element1', fadeClass: 'fade-in', duration: 3000 }, // Để xuất hiện lần lượt
        // { id: 'element2', fadeClass: 'fade-in', duration: 3000 }, // Để xuất hiện lần lượt

        {
            id: 'element3',
            fadeClass: 'fade-in',
            duration: 3000
        } // Để xuất hiện lần lượt
        ];

        function checkVisibility() {
            sections.forEach(section => {
                const elements = document.querySelectorAll(`#${section.id} .${section.fadeClass}`);
                elements.forEach((element, index) => {
                    const rect = element.getBoundingClientRect();
                    // Kiểm tra xem phần tử có trong viewport không
                    if (rect.top < window.innerHeight && rect.bottom > 0) {
                        element.classList.add('visible'); // Thêm lớp visible để kích hoạt hiệu ứng
                        if (section.fadeClass === 'fade-in') {
                            element.style.animationDelay =
                                `${index * 0.2}s`; // Thêm độ trễ cho từng div
                        }
                    }
                });
            });
        }

        // Lắng nghe sự kiện cuộn
        window.addEventListener('scroll', checkVisibility);
        // Kiểm tra ngay khi tải trang
        checkVisibility();

        // Lắng nghe sự kiện click trên các liên kết với class scroll-link
        document.querySelectorAll('.scroll-link').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

                const targetId = this.getAttribute('href'); // Lấy ID từ href
                const targetElement = document.querySelector(targetId); // Tìm phần tử theo ID

                // Cuộn đến phần tử
                if (targetElement) {
                    const startPosition = window.pageYOffset; // Vị trí hiện tại của cuộn
                    const targetPosition = targetElement.getBoundingClientRect().top +
                        startPosition; // Vị trí mục tiêu
                    const distance = targetPosition - startPosition; // Khoảng cách cần cuộn
                    const duration = 1000; // Thời gian cuộn (3 giây)
                    let startTime = null;

                    // Hàm cuộn
                    function animation(currentTime) {
                        if (startTime === null) startTime = currentTime;
                        const timeElapsed = currentTime - startTime;
                        const progress = Math.min(timeElapsed / duration, 1); // Tính tỷ lệ tiến độ

                        // Cuộn theo hàm easing
                        window.scrollTo(0, startPosition + distance * progress);

                        if (timeElapsed < duration) {
                            requestAnimationFrame(animation); // Gọi lại hàm cho lần tiếp theo
                        } else {
                            checkVisibility(); // Kiểm tra ngay lập tức để áp dụng hiệu ứng
                        }
                    }

                    requestAnimationFrame(animation); // Bắt đầu hoạt động cuộn
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const blogEntries = document.querySelectorAll('.blog_entry');

        // Tạo observer để theo dõi khi phần tử vào viewport
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Thêm class 'show' khi phần tử vào viewport
                    entry.target.classList.add('show');
                    observer.unobserve(entry.target); // Ngừng theo dõi phần tử sau khi đã hiển thị
                }
            });
        }, {
            threshold: 0.5 // Kích hoạt khi 50% phần tử vào viewport
        });

        // Quan sát tất cả các phần tử blog_entry
        blogEntries.forEach(entry => {
            observer.observe(entry);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const contents = document.querySelectorAll('.about-content');
        const image = document.getElementById('image1');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Hiện từng phần tử nội dung với độ trễ
                    contents.forEach((content, index) => {
                        setTimeout(() => {
                            content.classList.add(
                                'show'); // Thêm lớp show cho nội dung
                        }, index * 300); // Độ trễ 300ms cho mỗi phần tử
                    });

                    // Hiện hình ảnh sau khi nội dung đã xuất hiện
                    setTimeout(() => {
                        image.classList.add('show'); // Thêm lớp show cho hình ảnh
                    }, contents.length * 300); // Hiện hình ảnh sau khi đã hiện tất cả nội dung

                    observer.unobserve(entry.target); // Ngừng quan sát phần tử sau khi hiển thị
                }
            });
        }, {
            threshold: 0.1 // Điều chỉnh giá trị này để thay đổi điểm bắt đầu hiện
        });

        // Quan sát phần tử chứa nội dung
        observer.observe(document.getElementById('about-us'));
    });
</script>

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
    document.addEventListener('DOMContentLoaded', () => {
        const newAboutContents = document.querySelectorAll('.new-about-content');
        const newAboutImages = document.querySelectorAll('.new-about-image');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Hiện từng phần tử nội dung với độ trễ
                    newAboutContents.forEach((content, index) => {
                        setTimeout(() => {
                            content.classList.add(
                                'show'); // Thêm lớp show cho nội dung
                        }, index * 300); // Độ trễ 300ms cho mỗi phần tử
                    });

                    // Hiện hình ảnh sau khi nội dung đã xuất hiện
                    setTimeout(() => {
                        newAboutImages.forEach((image, index) => {
                            setTimeout(() => {
                                image.classList.add(
                                    'show'); // Thêm lớp show cho hình ảnh
                            }, index * 300); // Độ trễ 300ms cho mỗi hình ảnh
                        });
                    }, newAboutContents.length *
                    300); // Hiện hình ảnh sau khi đã hiện tất cả nội dung

                    observer.unobserve(entry.target); // Ngừng quan sát phần tử sau khi hiển thị
                }
            });
        }, {
            threshold: 0.1 // Điều chỉnh giá trị này để thay đổi điểm bắt đầu hiện
        });

        // Quan sát phần tử chứa nội dung
        observer.observe(document.querySelector('.section_why'));
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Lấy phần section với class '.awe-section-6'
        const section = document.querySelector('.awe-section-6');

        // Tạo observer để theo dõi khi phần section vào viewport
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Thêm class 'show' khi phần section vào viewport
                    entry.target.classList.add('show');
                    observer.unobserve(entry.target); // Ngừng theo dõi section sau khi đã hiển thị
                }
            });
        }, {
            threshold: 0.5 // Kích hoạt khi 50% phần tử vào viewport
        });

        // Quan sát section
        observer.observe(section);
    });
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
    window.onscroll = function () {
        var topLink = document.getElementById("top-link");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            topLink.style.display = "block"; // Hiển thị nút khi cuộn xuống
        } else {
            topLink.style.display = "none"; // Ẩn nút khi ở đầu trang
        }
    };
</script>
<script>
    document.getElementById('top-link').addEventListener('click', function (e) {
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
<script>
    // Khởi tạo IntersectionObserver
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                console.log('Ảnh đã vào khung nhìn'); // Kiểm tra trong console
                entry.target.classList.add('visible'); // Thêm lớp 'visible' khi ảnh vào khung nhìn
                observer.unobserve(entry.target); // Ngừng theo dõi ảnh sau khi đã xuất hiện
            }
        });
    }, {
        threshold: 0.5
    });

    const photos = document.querySelectorAll('.footer-photo');
    photos.forEach(photo => {
        observer.observe(photo);
    });
</script>

<script>
    let currentSlide = 0;
    let isAnimating = false; // Kiểm soát trạng thái animation

    function changeSlide(direction) {
        if (isAnimating) return; // Nếu đang trong quá trình animation, không cho phép click

        isAnimating = true; // Đánh dấu bắt đầu animation
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;

        // Cập nhật currentSlide
        if (direction === 1) {
            currentSlide = (currentSlide + 1) % totalSlides; // Chuyển đến slide tiếp theo
        } else {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; // Chuyển về slide trước
        }

        const offset = -currentSlide * 100; // Tính toán offset
        const slidesContainer = document.querySelector('.slides');

        // Thêm hiệu ứng chuyển động
        slidesContainer.style.transition = 'transform 0.5s ease'; // Khôi phục hiệu ứng chuyển động
        slidesContainer.style.transform = `translateX(${offset}%)`; // Thực hiện chuyển động

        // Cập nhật caption
        slides.forEach((slide, index) => {
            slide.classList.remove('active'); // Xóa lớp active
            if (index === currentSlide) {
                slide.classList.add('active'); // Thêm lớp active cho slide hiện tại
            }
        });

        // Đặt lại trạng thái animation sau khi chuyển động hoàn tất
        setTimeout(() => {
            isAnimating = false; // Cho phép click lại
        }, 300); // Thời gian khớp với thời gian chuyển động
    }

    // Tự động chuyển slide sau mỗi 5 giây
    setInterval(() => changeSlide(1), 5000);

    // Khởi động với slide đầu tiên
    changeSlide(0); // Hiển thị slide đầu tiên
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.addEventListener("scroll", function () {
            const elementsRight = document.querySelectorAll(".animate-right");

            // Điểm kích hoạt hiệu ứng
            const triggerBottom = window.innerHeight / 5 * 4;

            elementsRight.forEach((el) => {
                const elementTop = el.getBoundingClientRect().top;

                if (elementTop < triggerBottom) {
                    el.classList.add("active"); // Thêm lớp 'active' khi phần tử hiển thị
                }
            });
        });
    });
</script>

@include('user.home.footer')
