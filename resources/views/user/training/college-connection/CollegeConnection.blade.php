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
                <h1 class="new-title">Cao Đẳng Mầm Non</h1>
                <p class="new-subtitle">Chương trình giúp bạn phát triển sự nghiệp trong lĩnh vực giáo dục mầm non.</p>
            </div>
        </section>

        <!-- Giới Thiệu -->
        <div class="row align-items-stretch mb-5">
            <div class="col-lg-6 p-0">
                <img src="/source/images/1.png" alt="Giới thiệu" class="img-fluid"
                    style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center" style="height: 100%;">
                <h2 class="fw-bold" style="font-size: 30px;  color: #FF8C00;">Giới Thiệu Chương Trình</h2>
                <p style="font-size: 20px;">Cao Đẳng Mầm Non hướng tới
                    việc nâng cao trình độ cho những người đã có bằng trung cấp hoặc cao đẳng trong lĩnh vực giáo
                    dục.</p>
                <ul class="list-group">
                    <li class="list-group-item">⏳ Thời gian: 2.5 năm (5 học kỳ).</li>
                    <li class="list-group-item">🎓 Bằng cấp: Bằng Cao đẳng chính quy.</li>
                    <li class="list-group-item">📍 Địa điểm: Trường Cao đẳng Sư phạm Mầm non.</li>
                </ul>
            </div>
        </div>
        <!-- Mục Tiêu & Đối Tượng -->
        <div class="mb-5 animate-section">
            <section class="p-4 bg-light rounded shadow" style="padding: 2.5rem !important;">
                <h2 class="text-primary mb-3" style="font-size: 30px;">🎯 Mục Tiêu & Đối Tượng Đào Tạo</h2>
                <ul class="mb-4">
                    <li style="font-size: 20px;"><strong>Mục tiêu chung:</strong> Đào tạo giáo viên mầm non có phẩm chất
                        đạo đức, kiến thức,
                        kỹ năng sư phạm vững vàng.</li>
                    <li style="font-size: 20px;"><strong>Mục tiêu cụ thể:</strong>
                        <ul>
                            <li style="font-size: 20px;"><strong>Kiến thức:</strong> Nắm vững tâm lý học, giáo dục học,
                                âm nhạc, mỹ thuật và
                                thể chất.</li>
                            <li style="font-size: 20px;"><strong>Kỹ năng:</strong> Soạn giáo án, tổ chức hoạt động, giao
                                tiếp với trẻ và phụ
                                huynh.</li>
                            <li style="font-size: 20px;"><strong>Thái độ:</strong> Yêu nghề, yêu trẻ, trách nhiệm và đạo
                                đức nghề nghiệp.
                            </li>
                        </ul>
                    </li>
                </ul>

                <h4 class="text-info" style="font-size: 30px;">Đối Tượng Đào Tạo:</h4>
                <ul>
                    <li style="font-size: 20px;">Giáo viên mầm non đã có bằng trung cấp hoặc cao đẳng.</li>
                    <li style="font-size: 20px;">Sinh viên tốt nghiệp các ngành liên quan đến giáo dục muốn chuyển sang
                        sư phạm mầm non.</li>
                    <li style="font-size: 20px;">Những người đang làm việc trong lĩnh vực giáo dục và muốn nâng cao
                        trình độ chuyên môn.</li>
                </ul>
            </section>

        </div>
        <!-- Nội Dung Chương Trình -->
        <div class="mb-5 " style="margin-left: 60px;">
            <h2 class="fw-bold " style="font-size: 30px;">Nội Dung Chương Trình Học</h2>
            <ul>
                <li style="font-size: 20px;">💡 Tâm lý trẻ em và phát triển lứa tuổi</li>
                <li style="font-size: 20px;">📚 Phương pháp giảng dạy và thiết kế bài giảng</li>
                <li style="font-size: 20px;">🎨 Kỹ năng tổ chức hoạt động vui chơi, sáng tạo</li>
                <li style="font-size: 20px;">📝 Thực tập sư phạm tại các trường mầm non</li>
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
                <div class="prove-item active">
                    <div class="prove-content">
                        <img src="/source/images/2.png" alt="Nguyễn Văn A" class="rounded-circle">
                        <h5>Nguyễn Văn A</h5>
                        <p>“Chương trình rất bổ ích và giúp tôi tự tin hơn trong việc giảng dạy!”</p>
                    </div>
                </div>
                <div class="prove-item">
                    <div class="prove-content">
                        <img src="/source/images/2.png" alt="Trần Thị B" class="rounded-circle">
                        <h5>Trần Thị B</h5>
                        <p>“Đội ngũ giảng viên rất nhiệt tình và chuyên nghiệp!”</p>
                    </div>
                </div>
                <div class="prove-item">
                    <div class="prove-content">
                        <img src="/source/images/2.png" alt="Lê Văn C" class="rounded-circle">
                        <h5>Lê Văn C</h5>
                        <p>“Chương trình đã giúp tôi tìm ra niềm đam mê thực sự của mình.”</p>
                    </div>
                </div>
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
                <div class="faq-card">
                    <div class="faq-card-header">
                        <h2>
                            <div class="faq-question" data-toggle="collapse" data-target="#collapseOne">Câu Hỏi 1:
                                Học cao đẳng mầm non có những môn học gì?</div>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse">
                        <div class="faq-card-body">
                            <p>Chương trình học tại cao đẳng mầm non thường bao gồm các môn như tâm lý học trẻ em,
                                phương pháp giáo dục mầm non, phát triển ngôn ngữ, giáo dục thể chất, và nghệ thuật
                                trong giáo dục. Sinh viên cũng sẽ học về dinh dưỡng và sức khỏe cho trẻ.</p>
                        </div>
                    </div>
                </div>
                <div class="faq-card">
                    <div class="faq-card-header">
                        <h2>
                            <div class="faq-question" data-toggle="collapse" data-target="#collapseTwo">Câu Hỏi 2: Sau khi tốt nghiệp có thể làm việc ở đâu?</div>
                        </h2>
                        <div id="collapseTwo" class="collapse">
                            <div class="faq-card-body">
                                <p> Sau khi tốt nghiệp, sinh viên có thể làm giáo viên mầm non tại các trường học, trung tâm
                                    giáo dục mầm non, hoặc làm việc trong các tổ chức phi chính phủ liên quan đến giáo dục
                                    trẻ em.</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-card">
                        <div class="faq-card-header">
                            <h2>
                                <div class="faq-question" data-toggle="collapse" data-target="#collapseThree">Câu Hỏi
                                    3:Có
                                    cần chứng chỉ gì sau khi tốt nghiệp không?</div>
                            </h2>
                            <div id="collapseThree" class="collapse">
                                <div class="faq-card-body">
                                    <p>Sau khi tốt nghiệp, sinh viên thường cần có chứng chỉ sư phạm để đủ điều kiện làm
                                        giáo viên mầm non.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-section">
                <h3 class="form-title" style="text-align: center;">Liên Hệ để được tư vấn</h3>
                <form id="registrationForm">

                    <div class="form-input-group">
                        <input type="text" name="hoten" class="form-input" placeholder="Họ và tên" required>
                    </div>

                    <div class="form-input-group">
                        <input type="tel" name="sodienthoai" class="form-input" placeholder="Số điện thoại" required>
                    </div>

                    <div class="form-input-group">
                        <input type="email" name="diachiemail" class="form-input" placeholder="Email" required>
                    </div>

                    <div class="form-input-group">
                        <textarea class="form-input" id="message" rows="4" placeholder="Message" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block"
                        style="animation: pulse 2s infinite ease-in-out;">Gửi yêu cầu</button>
                </form>
            </div>
    </section>
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
