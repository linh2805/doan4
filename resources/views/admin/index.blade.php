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
        <a href=""><i class="fas fa-home"></i>Home</a>


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
        <a href="" id=""><i class="fas fa-user-edit"></i>Học bổng</a>
        <a href="" id=""><i class="fas fa-user-edit"></i>Tin tức</a>
        <a href="" id="comment"><i class="fas fa-user-edit"></i>Quản lý bình luận</a>
        <a href="" id="registerLink"><i class="fas fa-user-edit"></i>Đăng ký của sinh viên</a>
        <a href="" id=""><i class="fas fa-user-edit"></i>Giới thiệu</a>

        <a href="" id="registerLink1"><i class="fas fa-user-edit"></i>Liên hệ tư vấn</a>

        <!-- <a onclick="loadContent('gioi-thieu')"><i class="fas fa-info-circle"></i>Giới thiệu</a> -->
        <!-- <a onclick="loadContent('lien-he')"><i class="fas fa-phone"></i>Liên hệ tư vấn</a> -->

        <div class="settings">
            <h5>Cài đặt</h5>
            <a><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
        </div>
    </div>

    <div class="content" id="content">
        <!-- <div class="header-container" style="display: flex; align-items: center; justify-content: space-between; ">
            <h2 style="padding-bottom: 10px; white-space: nowrap;">Bảng quản lý nội dung</h2>
            <div class="input-group" style="position: relative; width: 30%;">
                <input type="text" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung"
                    oninput="searchContent()" style="
                    border-radius: 27px;
                    width: 100%;
                    padding: 10px 40px 10px 40px; /* Increased left padding */
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    border: 1px solid #ccc;
                    height: 40px; /* Consistent height 
                ">
                <i class="fas fa-search search-icon"
                    style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%);"></i>
            </div>
        </div>
        <div id="search-result"></div>
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Danh mục</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Cao đẳng mầm non</td>
                    <td>Chương trình đào tạo hệ cao đẳng</td>
                    <td><button class="btn btn-primary">Xem</button></td>
                </tr>
            </tbody>
        </table> -->
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#registerLink').click(function(e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-register'); // Tải nội dung từ /ad-contact vào div content
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#registerLink1').click(function(e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-contact'); // Tải nội dung từ /ad-contact vào div content
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#comment').click(function(e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-comment'); // Tải nội dung từ /ad-contact vào div content
        });
    });
</script>


</html>
