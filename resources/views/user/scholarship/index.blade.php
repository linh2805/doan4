@extends('user.index')
@section('name')
@include('user.home.header')

<body>
    <style>
    .scholarship {
        padding-top: 100px;
        padding-bottom: 20px;
    }

    .scholarship-section {
        max-width: 1130px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .scholarship-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 20px;
        padding: 15px;
    }

    .scholarship-header {
        font-size: 22px;
        font-weight: bold;
        padding-bottom: 10px;
    }

    .btn-detail {
        width: 100%;
        background-color: #ffcc00;
        border: none;
        padding: 10px;
        font-weight: bold;
    }

    .highlight {
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
        padding: 10px;
        margin: 20px 0;
    }

    .form-scholarship {
        border: 2px solid #FFA500;
        border-radius: 10px;
        padding: 20px;
        max-width: 450px;
        margin: auto;
        background-color: #fff7e6;
    }

    .form-scholarship h3 {
        text-align: center;
        color: #FF8C00;
        /* Màu cam đậm */
        font-weight: bold;
    }

    .form-control {
        border-radius: 5px;
        border: none;
        height: 40px;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        appearance: none;
        background-color: #f9f9f9;
    }

    .form-control:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(255, 165, 0, 0.5);
    }

    .form-control[type="file"] {
        padding: 5px;
    }

    .btn-primary {
        background-color: #FFA500;
        border: none;
        font-weight: bold;
        height: 45px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        animation: pulse 1s infinite;
    }

    .btn-primary:hover {
        background-color: #FF8C00;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }
    </style>

    <div class="scholarship">
        <section class="scholarship-section py-4">
            <h2 class="text-center text-warning">Chương Trình Học Bổng Sinh Viên</h2>
            <div class="scholarship-card">
                <div class="scholarship-header text-primary">Học Bổng Xuất Sắc</div>
                <p class="highlight">
                    Hỗ trợ 100% học phí cho sinh viên có thành tích học tập vượt trội, điểm đầu vào cao nhất và tham
                    gia tích cực vào các hoạt động ngoại khóa.
                </p>
                <p>
                    Chương trình học bổng này nhằm khuyến khích và hỗ trợ những sinh viên có năng lực và đam mê
                    trong lĩnh vực giáo dục mầm non. Sinh viên được nhận học bổng không chỉ được miễn phí học phí mà
                    còn có cơ hội tham gia vào các hoạt động phát triển kỹ năng và giao lưu học hỏi.
                </p>
                <p>
                    Để đủ điều kiện nhận học bổng, sinh viên cần đáp ứng các tiêu chí sau:
                </p>
                <ul>
                    <li>Điểm thi đầu vào đạt tối thiểu 25 điểm.</li>
                    <li>Có thành tích học tập xuất sắc trong các cấp học trước đó.</li>
                    <li>Tham gia tích cực vào các hoạt động ngoại khóa, câu lạc bộ hoặc các chương trình tình
                        nguyện.</li>
                    <li>Được giới thiệu bởi giáo viên hoặc cán bộ trong trường.</li>
                </ul>
                <p>
                    Học bổng này không chỉ giúp sinh viên giảm bớt gánh nặng tài chính mà còn mở ra cơ hội để phát
                    triển bản thân thông qua các khóa học bổ trợ, hội thảo và sự kiện giao lưu quốc tế. Những sinh
                    viên nhận học bổng sẽ có cơ hội trở thành những nhà giáo dục mầm non có tâm huyết và tài năng
                    trong tương lai.
                </p>
            </div>

            <div class="scholarship-card">
                <div class="scholarship-header text-success">Học Bổng Hỗ Trợ</div>
                <p class="highlight">
                    Giảm 50% học phí cho sinh viên có hoàn cảnh khó khăn, đạt thành tích tốt và chứng minh được nhu
                    cầu hỗ trợ tài chính.
                </p>
                <p>
                    Chương trình học bổng này được thiết lập nhằm hỗ trợ những sinh viên có hoàn cảnh khó khăn nhưng
                    vẫn nỗ lực học tập để đạt thành tích tốt. Học bổng không chỉ giúp giảm bớt gánh nặng tài chính
                    cho sinh viên mà còn tạo điều kiện cho họ có thể theo đuổi ước mơ trong lĩnh vực giáo dục mầm
                    non.
                </p>
                <p>
                    Để đủ điều kiện nhận học bổng, sinh viên cần đáp ứng các tiêu chí sau:
                </p>
                <ul>
                    <li>Đạt điểm trung bình học tập từ 7.0 trở lên trong các kỳ học trước.</li>
                    <li>Có hoàn cảnh gia đình khó khăn, cần hỗ trợ tài chính.</li>
                    <li>Cung cấp các giấy tờ chứng minh hoàn cảnh và nhu cầu hỗ trợ.</li>
                    <li>Tham gia các hoạt động ngoại khóa hoặc tình nguyện trong cộng đồng.</li>
                </ul>
                <p>
                    Sinh viên nhận học bổng sẽ không chỉ được giảm học phí mà còn có cơ hội tham gia vào các chương
                    trình đào tạo kỹ năng, hội thảo và sự kiện giao lưu. Chương trình này hướng đến việc phát triển
                    toàn diện sinh viên, giúp họ trở thành những nhà giáo dục mầm non có tâm huyết và năng lực trong
                    tương lai.
                </p>
            </div>

            <div class="scholarship-card">
                <div class="scholarship-header text-warning">Học Bổng Khuyến Khích</div>
                <p class="highlight">
                    Học bổng khuyến khích dành cho sinh viên có thành tích học tập xuất sắc và tích cực tham gia các
                    hoạt động ngoại khóa.
                </p>
                <p>
                    Chương trình học bổng khuyến khích được thiết lập nhằm ghi nhận và hỗ trợ những sinh viên có
                    thành tích học tập nổi bật cũng như những đóng góp tích cực cho cộng đồng và các hoạt động
                    trường lớp. Học bổng này không chỉ giúp sinh viên giảm bớt gánh nặng tài chính mà còn tạo động
                    lực để họ tiếp tục phát huy năng lực học tập và tham gia hoạt động xã hội.
                </p>
                <p>
                    Để đủ điều kiện nhận học bổng, sinh viên cần đáp ứng các tiêu chí sau:
                </p>
                <ul>
                    <li>Điểm trung bình học tập từ 8.0 trở lên trong các học kỳ trước.</li>
                    <li>Tham gia tích cực vào các câu lạc bộ, tổ chức sự kiện hoặc hoạt động tình nguyện.</li>
                    <li>Có thư giới thiệu từ giáo viên hoặc cán bộ trường học.</li>
                    <li>Thể hiện tinh thần cầu tiến và đam mê trong lĩnh vực giáo dục mầm non.</li>
                </ul>
                <p>
                    Học bổng khuyến khích không chỉ giúp sinh viên giảm bớt chi phí học tập mà còn tạo cơ hội cho họ
                    tham gia vào các khóa học nâng cao, hội thảo chuyên đề và các chương trình phát triển bản thân.
                    Điều này sẽ góp phần giúp sinh viên trở thành những nhà giáo dục mầm non xuất sắc trong tương
                    lai.
                </p>
            </div>
            <h3 class="text-warning mt-4">Điều Kiện Nhận Học Bổng</h3>
            <ul>
                <li>Thành tích học tập xuất sắc</li>
                <li>Hoàn cảnh khó khăn có giấy tờ chứng minh</li>
                <li>Tham gia các hoạt động ngoại khóa</li>
            </ul>
            <div class="form-scholarship">
                <h3>Hồ Sơ Đăng Ký</h3>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Bản sao học bạ</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giấy báo nhập học</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giấy chứng nhận hoàn cảnh khó khăn</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="text-center">
                        <!-- Căn giữa -->
                        <button type="submit" class="btn btn-primary">Nộp Đơn</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

</body>

@include('user.home.footer')
