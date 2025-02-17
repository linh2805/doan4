@extends('user.index')
@section('name')
@include('user.home.header')
<body>
    <div class="container">
        <section class="header-section">
            <div class="centered">
                <h1 class="fw-bold scale">Trung Cấp Mầm Non</h1>
                <p class="text scale">Chương trình giúp bạn phát triển sự nghiệp trong lĩnh vực giáo dục mầm non.</p>
            </div>
        </section>

        <!-- Giới Thiệu -->
        <div class="row align-items-stretch mb-5 ">
            <div class="col-lg-6 p-0">
                <img src="./images/intro3.jpg" alt="Giới thiệu" class="img-fluid"
                    style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center" style="height: 100%;">
                <div class="centered">
                    <h2 class="fw-bold">
                        <span class="fade-in" style="animation-delay: 0s;">Giới</span>
                        <span class="fade-in" style="animation-delay: 0.1s;">Thiệu</span>
                        <span class="fade-in" style="animation-delay: 0.2s;">Chương</span>
                        <span class="fade-in" style="animation-delay: 0.3s;">Trình</span>
                    </h2>
                    <p class="fade-in" style="animation-delay: 0.4s;">Cao Đẳng Mầm Non hướng tới
                        việc nâng cao trình độ cho những người đã có bằng trung cấp hoặc cao đẳng trong lĩnh vực giáo
                        dục.</p>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">⏳ Thời gian: 2 năm (học sinh tốt nghiệp THPT) hoặc 2,5 - 3 năm (học sinh
                        tốt nghiệp THCS).</li>
                    <li class="list-group-item">🎓 Bằng cấp:Nhận bằng trung cấp chính quy chuyên ngành sư phạm mầm non.
                    </li>
                    <li class="list-group-item">📍 Địa điểm: Trường Cao đẳng Sư phạm Mầm non.</li>
                </ul>
            </div>
        </div>

        <!-- Mục Tiêu & Đối Tượng -->
        <div class="mb-5 animate-section">
            <section class="p-4 bg-light rounded shadow">
                <h2 class="section-title">🎓 Mục tiêu và Đào tạo của Cao đẳng Sư phạm Mầm non</h2>
                <div>
                    <h3>🎯 Mục Tiêu Đào Tạo</h3>
                    <ul>
                        <li><strong>Kiến thức:</strong> Cung cấp nền tảng sư phạm, tâm lý trẻ em và kỹ năng tổ chức hoạt
                            động giáo dục.</li>
                        <li><strong>Kỹ năng:</strong> Thành thạo việc giảng dạy, soạn giáo án, và giao tiếp với phụ
                            huynh.</li>
                        <li><strong>Thái độ:</strong> Đề cao tinh thần trách nhiệm, yêu nghề, yêu trẻ.</li>
                    </ul>
                </div>

                <div>
                    <h3>📘 Chương Trình Đào Tạo</h3>
                    <ul>
                        <li><strong>Thời gian:</strong> 2 năm (hoặc 1 năm hệ liên thông).</li>
                        <li><strong>Môn học chính:</strong>
                            <ul>
                                <li>Tâm lý trẻ em, Giáo dục học mầm non</li>
                                <li>Phát triển ngôn ngữ và kỹ năng giao tiếp</li>
                                <li>Thực hành giảng dạy và xử lý tình huống sư phạm</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </section>
        </div>

        <!-- Nội Dung Chương Trình -->
        <section class="mb-5 animate-section">
            <h2 class="fw-bold text-center">Nội Dung Chương Trình Học</h2>
            <ul>
                <li>💡 Tâm lý học trẻ em và phát triển tâm lý lứa tuổi.</li>
                <li>📚 Phương pháp giảng dạy và xây dựng chương trình học.</li>
                <li>🎨 Kỹ năng tổ chức hoạt động vui chơi và học tập.</li>
                <li>📝 Thực tập tại các cơ sở giáo dục mầm non.</li>
            </ul>
        </section>

        <!-- Cơ Hội Nghề Nghiệp -->
        <div class="p-4 bg-light rounded shadow mb-5 animate-section">
            <h2 class="text-center fw-bold">Cơ Hội Nghề Nghiệp</h2>
            <p>✔️ Giảng dạy tại các trường mầm non công lập và tư thục.</p>
            <p>✔️ Tham gia vào các chương trình giáo dục mầm non tại các tổ chức phi lợi nhuận.</p>
            <p>✔️ Quản lý và điều hành các cơ sở giáo dục mầm non.</p>
            <p>✔️ Tư vấn cho phụ huynh về phương pháp giáo dục trẻ em.</p>
            <p>✔️ Nghiên cứu và phát triển các chương trình giáo dục cho trẻ nhỏ.</p>
        </div>

        <!-- Testimonials -->
        <div class="testimonials animate-section">
            <h2 class="fw-bold text-center">Những Lời Chứng Thực</h2>

            <!-- Danh sách lời chứng thực -->
            <div class="testimonial-slider">
                <div class="testimonial-item active">
                    <div class="testimonial-content">
                        <img src="./images/Ellipse 1.png" alt="Nguyễn Văn A" class="rounded-circle">
                        <h5>Nguyễn Văn A</h5>
                        <p>“Chương trình rất bổ ích và giúp tôi tự tin hơn trong việc giảng dạy!”</p>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <img src="./images/Ellipse 2.png" alt="Trần Thị B" class="rounded-circle">
                        <h5>Trần Thị B</h5>
                        <p>“Đội ngũ giảng viên rất nhiệt tình và chuyên nghiệp!”</p>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <img src="./images/Ellipse 3.png" alt="Lê Văn C" class="rounded-circle">
                        <h5>Lê Văn C</h5>
                        <p>“Chương trình đã giúp tôi tìm ra niềm đam mê thực sự của mình.”</p>
                    </div>
                </div>

                <!-- Thêm nhiều lời chứng thực khác nếu cần -->
            </div>

            <!-- Nút điều hướng -->
            <div class="pagination">
                <span class="dot active" onclick="currentTestimonial(1)"></span>
                <span class="dot" onclick="currentTestimonial(2)"></span>
                <span class="dot" onclick="currentTestimonial(3)"></span>
                <!-- Thêm nhiều nút nếu có -->
            </div>
        </div>

        <!-- FAQ -->
        <div class="faq animate-section">
            <h2 class="fw-bold text-center">Câu Hỏi Thường Gặp</h2>
            <div class="accordion" id="faqAccordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Câu Hỏi 1 :Chương trình có thực tập không?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#faqAccordion">
                        <div class="card-body">
                            <p>Có, sinh viên sẽ có thời gian thực tập tại các trường mầm non để áp dụng kiến thức đã học
                                vào thực tế.</p>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Câu Hỏi 2 :Có thể học lên các bậc học cao hơn không?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                        <div class="card-body">
                            <p>Có, sinh viên tốt nghiệp Trung Cấp Mầm Non có thể tiếp tục học lên đại học chuyên ngành
                                giáo dục mầm non hoặc các ngành liên quan khác.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Câu Hỏi 3 :Có cần chứng chỉ gì sau khi tốt nghiệp không?
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                        <div class="card-body">
                            <p>Sau khi tốt nghiệp, sinh viên thường cần có chứng chỉ sư phạm để đủ điều kiện làm giáo viên mầm non.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
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

                <button type="submit" class="btn btn-primary btn-block" style="animation: pulse 2s infinite ease-in-out;">Gửi yêu cầu</button>
            </form>
        </div>

    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener("scroll", function () {
            document.querySelectorAll(".animate-section").forEach(el => {
                if (el.getBoundingClientRect().top < window.innerHeight - 100) {
                    el.classList.add("appear");
                }
            });
        });
    </script>
</body>


@include('user.home.footer')