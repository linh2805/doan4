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
        <a href="{{ url('/user') }}"><i class="fas fa-home"></i>Home</a>


        <section class="training-section">
            <h5>Chương trình đào tạo</h5>
            <!-- <select class="form-select mb-3" onchange="loadContent(this.value)"> -->
            <select class="form-select mb-3">

                <option value=""><a href="">Chọn ngành đào tạo</a></option>
                <option value="cao-dang-mam-non"><a href="">Cao đẳng mầm non</a></option>
                <option value="trung-cap-mam-non"><a href=""></a>Trung cấp mầm non</option>
                <option value="lien-thong-dai-hoc-mam-non"><a href="">Liên thông đại học mầm non</a></option>
                <option value="lien-thong-cao-dang-mam-non"><a href="">Liên thông cao đẳng mầm non</a></option>
            </select>
        </section>

        <h5>Quản lý khác</h5>
        <!-- <a onclick="loadContent('hoc-bong')"><i class="fas fa-gift"></i>Học bổng</a> -->
        <!-- <a onclick="loadContent('tin-tuc')"><i class="fas fa-newspaper"></i>Tin tức</a> -->
        <a href="" id="registerLink2"><i class="fas fa-user-edit"></i>Account</a>

        <a href="" id=""><i class="fas fa-user-edit"></i>Học bổng</a>
        <a href="" id=""><i class="fas fa-user-edit"></i>Tin tức</a>

        <a href="" id="registerLink"><i class="fas fa-user-edit"></i>Đăng ký của sinh viên</a>
        <a href="" id=""><i class="fas fa-user-edit"></i>Giới thiệu</a>

        <a href="" id="registerLink1"><i class="fas fa-user-edit"></i>Liên hệ tư vấn</a>

        <!-- <a onclick="loadContent('gioi-thieu')"><i class="fas fa-info-circle"></i>Giới thiệu</a> -->
        <!-- <a onclick="loadContent('lien-he')"><i class="fas fa-phone"></i>Liên hệ tư vấn</a> -->

        <div class="settings">
            <h5>Cài đặt</h5>
            <a {{ url('/logout') }}><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
        </div>
    </div>

    <div class="content" id="content">
        <h2>Chất lượng trường học</h2>
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Hệ thống lớp học</th>
                    <th>Ảnh 1</th>
                    <th>Ảnh 2</th>
                    <th>Ảnh 3</th>
                    <th>Ảnh 4</th>
                    <th>Hệ thống phòng thực hành</th>
                    <th>Quản lý</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Hệ thống lớp học được trang bị hiện đại, với không gian học tập thoải mái và sáng tạo. Mỗi lớp
                        học đều có đầy đủ thiết bị giảng dạy, đảm bảo môi trường học tập hiệu quả, giúp học sinh phát
                        huy tối đa khả năng sáng tạo và tiếp thu kiến thức.</td>
                    <td>Cao đẳng mầm non</td>
                    <td>Chương trình đào tạo hệ cao đẳng</td>
                    <td>Cao đẳng mầm non</td>
                    <td>Cao đẳng mầm non</td>
                    <td>Hệ thống phòng thực hành được thiết kế hiện đại, đầy đủ trang thiết bị và tiện nghi, tạo điều
                        kiện tối ưu cho việc học tập và nghiên cứu. Mỗi phòng đều đảm bảo an toàn và đáp ứng tiêu chuẩn
                        chất lượng, giúp sinh viên thực hành hiệu quả và thu được những kiến thức thực tiễn.

                    </td>
                    <!-- <td><button class="btn btn-primary">Xem</button></td> -->
                    <td><button class="btn btn-primary">Sửa</button></td>

                </tr>
            </tbody>
        </table>

        <h2>Ảnh trường</h2>
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <!-- <th>Hệ thống lớp họ</th> -->
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
                <tr>
                    <td>Cao đẳng mầm non</td>
                    <td>Chương trình đào tạo hệ cao đẳng</td>
                    <td>Cao đẳng mầm non</td>
                    <td>Cao đẳng mầm non</td>
                    <td>Cao đẳng mầm non</td>
                    <td>Cao đẳng mầm non</td>
                    <td>Cao đẳng mầm non</td>



                    <!-- <td><button class="btn btn-primary">Xem</button></td> -->
                    <td><button class="btn btn-primary">Sửa</button></td>

                </tr>
            </tbody>
        </table>
        
    </div>
</body>
<script>
    $(document).ready(function () {
        $('#registerLink').click(function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-register'); // Tải nội dung từ /ad-contact vào div content
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
        $('#registerLink2').click(function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/account'); // Tải nội dung từ /ad-contact vào div content
        });
    });
</script>

</html>