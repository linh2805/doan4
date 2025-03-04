<!-- @extends('user.index') -->
@section('name')
<!-- @include('user.home.header') -->

<head>
    <link rel="stylesheet" href="/source/css/cd.css" type="text/css">
</head>

<div class="thucontainer">
    @include('user.home.header')
    <section class="contianer">
        <section class="university-section">
            <div class="centered-title">
                <h1 class="new-title">Trung Cấp Mầm Non</h1>
                <p class="new-subtitle">Chương trình giúp bạn phát triển sự nghiệp trong lĩnh vực giáo dục mầm non.</p>
            </div>
        </section>

        <!-- Giới Thiệu -->
        <div style="display: flex;">
            <div class="row align-items-stretch mb-5">
                @foreach($intermediates as $intermediate)
                    <div class="col-lg-6 p-0">
                        <img src="{{ asset($intermediate->introductory_photo) }}" alt="Giới thiệu" class="img-fluid"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @endforeach
            </div> <!-- Đóng div row ở đây -->
            @foreach($intermediates as $intermediate)

                <div class="col-lg-6 d-flex flex-column justify-content-center" style="height: 100%;">
                    <h2 class="fw-bold" style="font-size: 30px;  color: #FF8C00;">Giới Thiệu Chương Trình</h2>
                    <p style="font-size: 20px;">{{ $intermediate->introduce }}</p>
                    <ul class="list-group">
                        <li class="list-group-item">⏳ Thời gian: {{ $intermediate->time }}</li>
                        <li class="list-group-item">🎓 Bằng cấp: Cao đẳng Sư phạm Mầm non</li>
                        <li class="list-group-item">📍 Địa điểm: {{ $intermediate->location }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
        <!-- Mục Tiêu & Đối Tượng -->
        <div class="mb-5 animate-section">
            <section class="p-4 bg-light rounded shadow" style="padding: 2.5rem !important;">
                <h2 class="text-primary mb-3" style="font-size: 30px;">🎯 Mục Tiêu & Đối Tượng Đào Tạo</h2>
                <ul class="mb-4">
                    <li style="font-size: 20px;"><strong>Kiến thức:</strong> Cung cấp nền tảng sư phạm, tâm lý trẻ em và
                        kỹ
                        năng tổ chức
                        hoạt
                        động giáo dục.</li>
                    <li style="font-size: 20px;"><strong>Kỹ năng:</strong> Thành thạo việc giảng dạy, soạn giáo án, và
                        giao
                        tiếp với phụ
                        huynh.</li>
                    <li style="font-size: 20px;"><strong>Thái độ:</strong> Đề cao tinh thần trách nhiệm, yêu nghề, yêu
                        trẻ.
                    </li>
                </ul>

                <h4 class="text-info" style="font-size: 30px;">Đối Tượng Đào Tạo:</h4>
                <ul>
                    <li style="font-size: 20px;">Giáo viên mầm non đã tốt nghiệp trung cấp hoặc cao đẳng sư phạm mầm
                        non.</li>
                    <li style="font-size: 20px;">Sinh viên tốt nghiệp trung cấp, cao đẳng thuộc nhóm ngành giáo dục muốn
                        chuyển đổi ngành học.
                    </li>
                    <li style="font-size: 20px;">Người đang làm việc trong lĩnh vực giáo dục mầm non muốn nâng cao trình
                        độ chuyên môn.</li>
                </ul>
            </section>

        </div>
        <!-- Nội Dung Chương Trình -->
        <div class="mb-5 " style="margin-left: 60px;">
            <h2 class="fw-bold " style="font-size: 30px;">Nội Dung Chương Trình Học</h2>
            <ul>
                @foreach($intermediate->curriculum_content as $content)
                    <li>{{ $content }}</li>
                @endforeach
            </ul>
        </div>
        <!-- Cơ Hội Nghề Nghiệp -->
        <div class="p-4 bg-light rounded shadow mb-5 animate-section"
            style="padding: 2.5rem !important; border: 2px solid #ccc;">
            <h2 class="text-center fw-bold" style="font-size: 30px;">Cơ Hội Nghề Nghiệp</h2>
            <p style="font-size: 20px;">✔️ Giảng dạy tại các trường mầm non công lập và tư thục.</p>
            <p style="font-size: 20px;">✔️ Tham gia vào các chương trình giáo dục mầm non tại các tổ chức phi lợi nhuận.
            </p>
            <p style="font-size: 20px;">✔️ QQuản lý và điều hành các cơ sở giáo dục mầm non.</p>
            <p style="font-size: 20px;">✔️ Cố vấn giáo dục sớm: Tư vấn cho phụ huynh về phương pháp giáo dục trẻ nhỏ.
            </p>
            <p style="font-size: 20px;">✔️ Nghiên cứu và phát triển các chương trình giáo dục cho trẻ nhỏ.</p>
        </div>
        <div class="prove ">
            <h2 class="fw-bold ">Những Lời Chứng Thực</h2>
            <div class="prove-slider">
                @foreach ($comments as $index => $comment)
                    <div class="prove-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="prove-content">
                            <h5>Name: {{ $comment->name }}</h5>
                            <h4>Comment: {{ $comment->comment }}</h4>
                        </div>
                    </div>
                @endforeach

            </div>


            <!-- Navigation Dots -->
            <div class="pagination">
                <span class="dot active" onclick="currentProve(1)"></span>
                <span class="dot" onclick="currentProve(2)"></span>
                <span class="dot" onclick="currentProve(3)"></span>
            </div>
        </div>
        <!-- FAQ -->
        <div class="faq-section">
            <h2 class="faq-title">Câu Hỏi Thường Gặp</h2>
            <div class="accordion" id="faqAccordion">
                @if($faqs->isEmpty())
                    <li>Không có câu hỏi thường gặp nào cho danh mục này.</li>
                @else
                    @php $index = 1; @endphp
                    @foreach($faqs as $faq)

                        <div class="faq-card">
                            <div class="faq-card-header">
                                <h2>
                                    <div class="faq-question" data-toggle="collapse" data-target="#collapse{{ $index }}">Câu Hỏi
                                        {{ $index }}: {{ $faq->question }}
                                    </div>
                                </h2>
                            </div>
                            <div id="collapse{{ $index }}" class="collapse">
                                <div class="faq-card-body">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                        @php $index++; @endphp
                    @endforeach
                @endif

            </div>
        </div>

        <!-- Contact Form -->

    </section>
    <div class="contact-form-section">
        <h3 class="form-title" style="text-align: center;">Liên Hệ để được tư vấn</h3>
        <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
            @csrf <!-- Thêm token CSRF để bảo mật -->
            <div class="form-group">
                <input type="text" name="fullname" class="form-control" placeholder="Họ và tên" required>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" class="form-control" placeholder="Số điện thoại" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="message" rows="4" placeholder="Tin nhắn" required></textarea>
            </div>
            <div class="button-container">
                <button type="submit" class="btn-submit">Gửi yêu cầu</button>
            </div>
        </form>
    </div>
    @include('user.home.footer')
    <script>
        document.addEventListener("scroll", function () {
            document.querySelectorAll(".animate-section").forEach(el => {
                if (el.getBoundingClientRect().top < window.innerHeight - 100) {
                    el.classList.add("appear");
                }
            });
        });
        let currentIndex = 1;

        function showProve(index) {
            const items = document.querySelectorAll('.prove-item');
            const dots = document.querySelectorAll('.dot');

            // Loop through items and dots to hide/show accordingly
            items.forEach((item, i) => {
                item.classList.remove('active');
                dots[i].classList.remove('active');
                if (i === index - 1) {
                    item.classList.add('active');
                    dots[i].classList.add('active');
                }
            });
        }

        // Function to handle dot clicks
        function currentProve(index) {
            currentIndex = index;
            showProve(currentIndex);
        }
        window.onscroll = function () {
            const button = document.getElementById("backToTop");
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                button.style.display = "block";
            } else {
                button.style.display = "none";
            }
        };

        document.getElementById("backToTop").onclick = function () {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        };
        $(document).ready(function () {
            $('.collapse').collapse('hide'); // Hide all collapsible items initially
            $('.faq-card-header').on('click', function () {
                $(this).next('.collapse').collapse('toggle'); // Toggle the collapse on click
            });
        });
    </script>
</div>