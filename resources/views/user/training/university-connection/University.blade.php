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
                <h1 class="new-title">Chương Trình Liên Thông Đại Học Mầm Non</h1>
                <p class="new-subtitle">Nâng bước ước mơ, phát triển sự nghiệp giáo dục mầm non.</p>
            </div>
        </section>

        <!-- Giới Thiệu -->
        <div style="display: flex;">
            <div class="row align-items-stretch mb-5">
                @foreach($universitys as $university)
                    <div class="col-lg-6 p-0">
                        <img src="{{ asset($university->introductory_photo) }}" alt="Giới thiệu" class="img-fluid"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @endforeach
            </div> <!-- Đóng div row ở đây -->
            @foreach($universitys as $university)

                <div class="col-lg-6 d-flex flex-column justify-content-center" style="height: 100%;">
                    <h2 class="fw-bold" style="font-size: 30px;  color: #FF8C00;">Giới Thiệu Chương Trình</h2>
                    <p style="font-size: 20px;">{{ $university->introduce }}</p>
                    <ul class="list-group">
                        <li class="list-group-item">⏳ Thời gian: {{ $university->time }}</li>
                        <li class="list-group-item">🎓 Bằng cấp: Cao đẳng Sư phạm Mầm non</li>
                        <li class="list-group-item">📍 Địa điểm: {{ $university->location }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
        <!-- Mục Tiêu & Đối Tượng -->
        <div class="mb-5 animate-section">
            <section class="p-4 bg-light rounded shadow" style="padding: 2.5rem !important;">
                <h2 class="text-primary mb-3" style="font-size: 30px;">🎯 Mục Tiêu & Đối Tượng Đào Tạo</h2>
                <ul class="mb-4">
                    <li style="font-size: 20px;"><strong>Kiến thức chuyên sâu:</strong> Cung cấp nền tảng lý thuyết và
                        thực hành vững chắc về
                        giáo dục mầm non.</li>
                    <li style="font-size: 20px;"><strong>Kỹ năng sư phạm:</strong> Rèn luyện kỹ năng giảng dạy, quản lý
                        lớp học và tổ chức các
                        hoạt động giáo dục.</li>
                    <li style="font-size: 20px;"><strong>Phát triển năng lực:</strong> Bồi dưỡng khả năng nghiên cứu,
                        sáng tạo và ứng dụng công
                        nghệ trong giảng dạy.</li>
                    <li style="font-size: 20px;"><strong>Đạo đức nghề nghiệp:</strong> Xây dựng phẩm chất đạo đức, tinh
                        thần trách nhiệm và lòng
                        yêu nghề.</li>
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
                @foreach($university->curriculum_content as $content)
                    <li>{{ $content }}</li>
                @endforeach
            </ul>
        </div>
        <!-- Cơ Hội Nghề Nghiệp -->
        <div class="p-4 bg-light rounded shadow mb-5 animate-section"
            style="padding: 2.5rem !important; border: 2px solid #ccc;">
            <h2 class="text-center fw-bold" style="font-size: 30px;">Cơ Hội Nghề Nghiệp</h2>
            <p style="font-size: 20px;">✔️ Giảng dạy tại các trường mầm non công lập, tư thục và quốc tế.</p>
            <p style="font-size: 20px;">✔️ Tham gia vào đội ngũ quản lý giáo dục mầm non hoặc trở thành chuyên viên đào
                tạo giáo viên.</p>
            <p style="font-size: 20px;">✔️ Quản lý cơ sở giáo dục mầm non: Làm hiệu trưởng, phó hiệu trưởng hoặc quản lý
                chuyên môn.</p>
            <p style="font-size: 20px;">✔️ Cố vấn giáo dục sớm: Tư vấn cho phụ huynh về phương pháp giáo dục trẻ nhỏ.
            </p>
            <p style="font-size: 20px;">✔️ Nghiên cứu viên giáo dục mầm non: Làm việc tại các viện nghiên cứu hoặc dự án
                phát triển giáo dục.</p>
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
                <div class="faq-card">
                    <div class="faq-card-header">
                        <h2>
                            <div class="faq-question" data-toggle="collapse" data-target="#collapseOne">Câu Hỏi 1: Hồ sơ
                                tuyển sinh Cao đẳng mầm non như thế nào?</div>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse">
                        <div class="faq-card-body">
                            <h3>Hồ sơ tuyển sinh Cao đẳng Mầm non</h3>
                            <ul>
                                <li>01 bản photo công chứng học bạ THPT.</li>
                                <li>01 bản photo công chứng giấy chứng nhận tốt nghiệp tạm thời hoặc bằng tốt nghiệp.
                                </li>
                                <li>02 ảnh 3x4 (ghi rõ họ tên, ngày sinh phía sau ảnh).</li>
                                <li>02 phong bì (ghi rõ họ tên, địa chỉ người nhận để nhận giấy báo nhập học).</li>
                                <li>Giấy tờ ưu tiên (nếu có).</li>
                            </ul>

                            <h3>Cách thức nộp hồ sơ</h3>
                            <p><strong>Cách 1:</strong> Nộp hồ sơ trực tiếp hoặc gửi qua đường bưu điện đến:</p>
                            <p><em>Cơ sở đào tạo Trường Cao đẳng Sư phạm Trung Ương</em></p>
                            <p><em>Địa chỉ: Số 212 Hoàng Quốc Việt, Cầu Giấy, Hà Nội</em></p>

                            <p><strong>Cách 2:</strong> Đăng ký trực tuyến qua đường link sau: <a href="#">[Link đăng
                                    ký]</a></p>
                        </div>
                    </div>
                </div>
                <div class="faq-card">
                    <div class="faq-card-header">
                        <h2>
                            <div class="faq-question" data-toggle="collapse" data-target="#collapseTwo">Câu Hỏi 2: Điểm
                                Chuẩn Ngành Sư Phạm Những Năm Gần Đây</div>
                        </h2>
                        <div id="collapseTwo" class="collapse">
                            <div class="faq-card-body">
                                <h2>Điểm chuẩn ngành Sư phạm Mầm non</h2>

                                <h3>1. Trường Đại học Sư phạm Hà Nội (Mã: SPH)</h3>
                                <table>
                                    <caption>Hệ Đại học</caption>
                                    <tr>
                                        <th>Năm</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>2014</td>
                                        <td>21.5</td>
                                    </tr>
                                    <tr>
                                        <td>2015</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td>2016</td>
                                        <td>21.25</td>
                                    </tr>
                                    <tr>
                                        <td>2017</td>
                                        <td>22.25</td>
                                    </tr>
                                    <tr>
                                        <td>2018</td>
                                        <td>21.15</td>
                                    </tr>
                                </table>

                                <h3>2. Trường Đại học Thủ đô (Mã: HNM)</h3>
                                <table>
                                    <caption>Hệ Đại học</caption>
                                    <tr>
                                        <th>Năm</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>2012</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td>2013</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <td>2014</td>
                                        <td>26</td>
                                    </tr>
                                    <tr>
                                        <td>2015</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td>2016</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <td>2017</td>
                                        <td>36.75</td>
                                    </tr>
                                    <tr>
                                        <td>2018</td>
                                        <td>37.58</td>
                                    </tr>
                                </table>
                                <table>
                                    <caption>Hệ Cao đẳng</caption>
                                    <tr>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>29.52</td>
                                    </tr>
                                </table>

                                <h3>3. Cao đẳng Sư phạm Trung ương (Mã: CM1)</h3>
                                <table>
                                    <caption>Hệ Cao đẳng</caption>
                                    <tr>
                                        <th>Năm</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>2014</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td>2015</td>
                                        <td>20.75</td>
                                    </tr>
                                    <tr>
                                        <td>Hệ nhu cầu xã hội</td>
                                        <td>14</td>
                                    </tr>
                                </table>

                                <h4>Năm 2016 - Giáo dục Mầm non</h4>
                                <table>
                                    <caption>Xét bằng điểm thi THPT Quốc gia</caption>
                                    <tr>
                                        <th>Hệ</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>Chất lượng cao</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>Nhu cầu xã hội</td>
                                        <td>15</td>
                                    </tr>
                                </table>
                                <table>
                                    <caption>Xét bằng học bạ THPT</caption>
                                    <tr>
                                        <th>Hệ</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>Chất lượng cao</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <td>Nhu cầu xã hội</td>
                                        <td>21</td>
                                    </tr>
                                </table>

                                <h4>Năm 2017</h4>
                                <p>Trường chấp nhận kết quả thi năng khiếu khối M từ các trường đại học công lập trên cả
                                    nước.</p>

                                <h4>Năm 2018 - Giáo dục Mầm non</h4>
                                <table>
                                    <caption>Xét bằng điểm thi THPT Quốc gia</caption>
                                    <tr>
                                        <th>Hệ</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>Chất lượng cao</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td>Nhu cầu xã hội</td>
                                        <td>18.25</td>
                                    </tr>
                                </table>
                                <table>
                                    <caption>Xét bằng học bạ THPT</caption>
                                    <tr>
                                        <th>Hệ</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>Nhu cầu xã hội</td>
                                        <td>19.5</td>
                                    </tr>
                                </table>
                                <h2>Điểm chuẩn ngành Sư phạm Mầm non</h2>

                                <h3>1. Trường Đại học Sư phạm Hà Nội (Mã: SPH)</h3>
                                <table>
                                    <caption>Hệ Đại học</caption>
                                    <tr>
                                        <th>Năm</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>2014</td>
                                        <td>21.5</td>
                                    </tr>
                                    <tr>
                                        <td>2015</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td>2016</td>
                                        <td>21.25</td>
                                    </tr>
                                    <tr>
                                        <td>2017</td>
                                        <td>22.25</td>
                                    </tr>
                                    <tr>
                                        <td>2018</td>
                                        <td>21.15</td>
                                    </tr>
                                </table>

                                <h3>2. Trường Đại học Thủ đô (Mã: HNM)</h3>
                                <table>
                                    <caption>Hệ Đại học</caption>
                                    <tr>
                                        <th>Năm</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>2012</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td>2013</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <td>2014</td>
                                        <td>26</td>
                                    </tr>
                                    <tr>
                                        <td>2015</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td>2016</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <td>2017</td>
                                        <td>36.75</td>
                                    </tr>
                                    <tr>
                                        <td>2018</td>
                                        <td>37.58</td>
                                    </tr>
                                </table>
                                <table>
                                    <caption>Hệ Cao đẳng</caption>
                                    <tr>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>29.52</td>
                                    </tr>
                                </table>

                                <h3>3. Cao đẳng Sư phạm Trung ương (Mã: CM1)</h3>
                                <table>
                                    <caption>Hệ Cao đẳng</caption>
                                    <tr>
                                        <th>Năm</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>2014</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td>2015</td>
                                        <td>20.75</td>
                                    </tr>
                                    <tr>
                                        <td>Hệ nhu cầu xã hội</td>
                                        <td>14</td>
                                    </tr>
                                </table>

                                <h4>Năm 2016 - Giáo dục Mầm non</h4>
                                <table>
                                    <caption>Xét bằng điểm thi THPT Quốc gia</caption>
                                    <tr>
                                        <th>Hệ</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>Chất lượng cao</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>Nhu cầu xã hội</td>
                                        <td>15</td>
                                    </tr>
                                </table>
                                <table>
                                    <caption>Xét bằng học bạ THPT</caption>
                                    <tr>
                                        <th>Hệ</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>Chất lượng cao</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <td>Nhu cầu xã hội</td>
                                        <td>21</td>
                                    </tr>
                                </table>

                                <h4>Năm 2017</h4>
                                <p>Trường chấp nhận kết quả thi năng khiếu khối M từ các trường đại học công lập trên cả
                                    nước.</p>

                                <h4>Năm 2018 - Giáo dục Mầm non</h4>
                                <table>
                                    <caption>Xét bằng điểm thi THPT Quốc gia</caption>
                                    <tr>
                                        <th>Hệ</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>Chất lượng cao</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td>Nhu cầu xã hội</td>
                                        <td>18.25</td>
                                    </tr>
                                </table>
                                <table>
                                    <caption>Xét bằng học bạ THPT</caption>
                                    <tr>
                                        <th>Hệ</th>
                                        <th>Điểm</th>
                                    </tr>
                                    <tr>
                                        <td>Nhu cầu xã hội</td>
                                        <td>19.5</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
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