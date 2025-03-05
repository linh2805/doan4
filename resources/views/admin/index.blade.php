<!-- @extends('user.index') -->
<!-- @section('name') -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/source/css/admin.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <div class="sidebar">
        <h4>Quản lý Admin</h4>
        <div class="input-group mb-3">
            <input type="text" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung"
                oninput="searchContent()" style="border-radius: 27px;">
            <!-- <i class="fas fa-search search-icon"></i> -->
        </div>
        <!-- <a onclick="loadContent('home')"><i class="fas fa-home"></i>Home</a> -->
        <a href="{{ url('/admin') }}"><i class="fas fa-home"></i>Home</a>


        <section class="training-section">
            <h5>Chương trình đào tạo</h5>
            <!-- <select class="form-select mb-3" onchange="loadContent(this.value)"> -->
            <select class="form-select mb-3" id="collegeSelect">

                <option value=""><a href="">Chọn ngành đào tạo</a></option>
                <option value="cao-dang-mam-non">Cao đẳng mầm non</option>
                <option value="trung-cap-mam-non">Trung cấp mầm non</option>
                <option value="lien-thong-dai-hoc-mam-non">Liên thông đại học mầm non</option>
                <option value="lien-thong-cao-dang-mam-non">Liên thông cao đẳng mầm non</option>
            </select>
        </section>

        <h5>Quản lý khác</h5>
        <!-- <a onclick="loadContent('hoc-bong')"><i class="fas fa-gift"></i>Học bổng</a> -->
        <!-- <a onclick="loadContent('tin-tuc')"><i class="fas fa-newspaper"></i>Tin tức</a> -->
        <!-- <a href="" id="registerLink2"><i class="fas fa-user-edit"></i>Account</a> -->

        <!-- <a href="" id=""><i class="fas fa-user-edit"></i>Học bổng</a> -->
        <a href="" id="registerLink5"><i class="fas fa-user-edit"></i>Tin tức</a>

        <a href="" id="registerLink7"><i class="fas fa-user-edit"></i>Học bổng</a>
        <a href="" id="registerLink4"><i class="fas fa-user-edit"></i>Giới thiệu</a>
        <a href="" id="registerLink3"><i class="fas fa-user-edit"></i>Bình luận</a>

        <a href="" id="registerLink6"><i class="fas fa-user-edit"></i>Câu hỏi thường gặp</a>

        <a href="" id="registerLink1"><i class="fas fa-user-edit"></i>Liên hệ tư vấn</a>

        <!-- <a onclick="loadContent('gioi-thieu')"><i class="fas fa-info-circle"></i>Giới thiệu</a> -->
        <!-- <a onclick="loadContent('lien-he')"><i class="fas fa-phone"></i>Liên hệ tư vấn</a> -->

        <div class="settings">
            <h5>Cài đặt</h5>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Đăng Xuất</button>
            </form>
        </div>
    </div>

    <div class="content" id="content">
        <h2>Chất lượng trường học</h2>
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Hệ thống lớp học</th>
                    <th>Ảnh trường 1</th>
                    <th>Ảnh trường 2</th>
                    <th>Ảnh trường 3</th>
                    <th>Ảnh trường 4</th>
                    <th>Hệ thống phòng thực hành</th>
                    <th>Quản lý</th>

                </tr>
            </thead>
            <tbody>
                @foreach($homeQualities as $homeQuality)
                    <tr>
                        <td>{{ $homeQuality->classroom_system }}</td>
                        <td> <img src="{{ asset($homeQuality->image1) }}" alt="Ảnh 1" style="max-width: 200px;">
                        </td>

                        <td> <img src="{{ asset($homeQuality->image2) }}" alt="Ảnh 2" style="max-width: 200px;">
                        </td>
                        <td> <img src="{{ asset($homeQuality->image3) }}" alt="Ảnh 3" style="max-width: 200px;">
                        </td>
                        <td> <img src="{{ asset($homeQuality->image4) }}" alt="Ảnh 4" style="max-width: 200px;">
                        </td>
                        <td>{{ $homeQuality->lab_system }}</td>
                        <td>
                            <button id="HomeQualityBtn" onclick="editIntro({{ $homeQuality->id }})">Sửa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h2>Ảnh trường</h2>
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Ảnh 1</th>
                    <th>Ảnh 2</th>
                    <th>Ảnh 3</th>
                    <th>Ảnh 4</th>
                    <th>Ảnh 5</th>
                    <th>Ảnh 6</th>
                    <th>Ảnh 7</th>
                    <th>Sửa</th>

                </tr>
            </thead>
            <tbody>
                @foreach($schoolPhotos as $schoolPhoto)

                    <tr>
                        <td> <img src="{{ asset($schoolPhoto->image1) }}" alt="Ảnh 1" style="max-width: 100px;">
                        </td>
                        <td> <img src="{{ asset($schoolPhoto->image2) }}" alt="Ảnh 2" style="max-width: 100px;">
                        </td>
                        <td> <img src="{{ asset($schoolPhoto->image3) }}" alt="Ảnh 3" style="max-width: 100px;">
                        </td>
                        <td> <img src="{{ asset($schoolPhoto->image4) }}" alt="Ảnh 4" style="max-width: 100px;">
                        </td>
                        <td> <img src="{{ asset($schoolPhoto->image5) }}" alt="Ảnh 5" style="max-width: 100px;">
                        </td>
                        <td> <img src="{{ asset($schoolPhoto->image6) }}" alt="Ảnh 6" style="max-width: 100px;">
                        </td>
                        <td> <img src="{{ asset($schoolPhoto->image7) }}" alt="Ảnh 7" style="max-width: 100px;">
                        </td>
                        <td> <button onclick="editPhoto({{ $schoolPhoto->id }})">Sửa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="editContent"></div>


    </div>
</body>
<script>
    $(document).ready(function () {
        $('#collegeSelect').change(function () {
            var selectedValue = $(this).val();
            var url = '';

            switch (selectedValue) {
                case 'cao-dang-mam-non':
                    url = '/ad-college'; // Đường dẫn cho Cao đẳng mầm non
                    break;
                case 'trung-cap-mam-non':
                    url = '/ad-intermediate'; // Đường dẫn cho Trung cấp mầm non
                    break;
                case 'lien-thong-dai-hoc-mam-non':
                    url = '/ad-university'; // Đường dẫn cho Liên thông đại học mầm non
                    break;
                case 'lien-thong-cao-dang-mam-non':
                    url = '/ad-connection'; // Đường dẫn cho Liên thông cao đẳng mầm non
                    break;
                default:
                    url = ''; // Không có đường dẫn
                    break;
            }

            if (url) {
                $('#content').load(url, function (response, status, xhr) {
                    if (status === "error") {
                        console.log("Error: " + xhr.status + " " + xhr.statusText); // Kiểm tra lỗi
                    } else {
                        console.log("Content loaded successfully"); // Kiểm tra nội dung đã tải
                    }
                });
            } else {
                $('#content').empty(); // Xóa nội dung nếu không có lựa chọn
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('#registerLink1').click(function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-contact'); // Tải nội dung từ /ad-contact vào div content
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#registerLink3').click(function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/comments'); // Tải nội dung từ /ad-contact vào div content
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#registerLink4').click(function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-intro'); // Tải nội dung từ /ad-contact vào div content
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#registerLink5').click(function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-news'); // Tải nội dung từ /ad-contact vào div content
        });
    });
    
</script>
<script>
    $(document).ready(function () {
        $('#registerLink6').click(function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-frequentlyAQ'); // Tải nội dung từ /ad-contact vào div content
        });
    });
</script>
<script>
$(document).ready(function() {
    $('#registerLink7').click(function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định

        // Gửi yêu cầu AJAX để tải nội dung của trang tin tức
        $.ajax({
            url: '/admin/ad-hb',// Đường dẫn tới phương thức để lấy nội dung
            type: "GET",
            success: function(response) {
                $("#content").html(response); // Chèn nội dung vào div content
            },
            error: function() {
                alert("Không thể tải trang quản lý học bổng!"); // Thông báo lỗi
            }
        });
    });
});
</script>
<script>
    function editIntro(introId) {
        var url = '/ad-home-edit/' + introId; // Tạo URL từ ID

        $('#editContent').load(url, function (response, status, xhr) {
            if (status === "error") {
                var msg = "Lỗi: " + xhr.status + " " + xhr.statusText;
                $('#editContent').html(msg); // Hiển thị thông báo lỗi
            } else {
                // Cập nhật URL
                history.pushState(null, '', url);
            }
        });

        // Ẩn hàng tương ứng trong bảng (tuỳ chọn)
        $('#row-' + introId).hide();
    }


</script>
<script>
    function editPhoto(introId) {
        var url = '/ad-home-edit-photo/' + introId; // Tạo URL từ ID

        $('#editContent').load(url, function (response, status, xhr) {
            if (status === "error") {
                var msg = "Lỗi: " + xhr.status + " " + xhr.statusText;
                $('#editContent').html(msg); // Hiển thị thông báo lỗi
            } else {
                // Cập nhật URL
                history.pushState(null, '', url);
            }
        });

        // Ẩn hàng tương ứng trong bảng (tuỳ chọn)
        $('#row-' + introId).hide();
    }


</script>

</html>