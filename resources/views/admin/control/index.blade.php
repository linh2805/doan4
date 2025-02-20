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
    <link rel="stylesheet" href="./css/admin.css" type="text/css">
    <script>
        let currentCategory = '';

        function loadContent(category) {
            let content = {
                'home': ['Trang chủ', 'Nơi quản lý thông tin chính'],
                'cao-dang-mam-non': ['Cao đẳng mầm non', 'Chương trình đào tạo hệ cao đẳng'],
                'trung-cap-mam-non': ['Trung cấp mầm non', 'Chương trình đào tạo hệ trung cấp'],
                'lien-thong-dai-hoc-mam-non': ['Liên thông đại học mầm non', 'Chương trình liên thông đại học'],
                'lien-thong-cao-dang-mam-non': ['Liên thông cao đẳng mầm non', 'Chương trình cao đẳng đại học'],
                'hoc-bong': ['Học bổng', 'Các gói học bổng dành cho sinh viên'],
                'tin-tuc': ['Tin tức', 'Cập nhật thông tin mới nhất về ngành học'],
                'dang-ky-sinh-vien': ['Đăng ký của sinh viên', 'Thông tin đăng ký và xét tuyển'],
                'gioi-thieu': ['Giới thiệu', 'Thông tin về trường và chương trình đào tạo'],
                'lien-he': ['Liên hệ tư vấn', 'Hỗ trợ tư vấn tuyển sinh'],
                'dang-nhap': ['Đăng nhập', 'Màn hình đăng nhập cho quản trị viên'],
                'dang-xuat': ['Đăng xuất', 'Thoát khỏi hệ thống quản lý']
            };

            currentCategory = category; // Store the current category
            if (content[category]) {
                let tableBody = document.querySelector('tbody');
                tableBody.innerHTML = `<tr>
                    <td>1</td>
                    <td>${content[category][0]}</td>
                    <td>${content[category][1]}</td>
                    <td><button class="btn btn-primary">Xem</button></td>
                </tr>`;
                document.getElementById('search-content').value = ''; // Clear search input
                document.getElementById('search-result').innerHTML = ''; // Clear previous search results
            } else {
                console.error("Category not found:", category);
            }
        }

        function searchCategories() {
            const input = document.getElementById('search-input').value.toLowerCase();
            const links = document.querySelectorAll('.sidebar a');
            links.forEach(link => {
                const text = link.textContent.toLowerCase();
                link.style.display = text.includes(input) ? 'flex' : 'none';
            });
        }

        function searchContent() {
            const input = document.getElementById('search-content').value.toLowerCase();
            const contentDiv = document.getElementById('search-result');
            let content = {
                'home': ['Trang chủ', 'Nơi quản lý thông tin chính'],
                'cao-dang-mam-non': ['Cao đẳng mầm non', 'Chương trình đào tạo hệ cao đẳng'],
                'trung-cap-mam-non': ['Trung cấp mầm non', 'Chương trình đào tạo hệ trung cấp'],
                'lien-thong-dai-hoc-mam-non': ['Liên thông đại học mầm non', 'Chương trình liên thông đại học'],
                'lien-thong-cao-dang-mam-non': ['Liên thông cao đẳng mầm non', 'Chương trình cao đẳng đại học'],
                'hoc-bong': ['Học bổng', 'Các gói học bổng dành cho sinh viên'],
                'tin-tuc': ['Tin tức', 'Cập nhật thông tin mới nhất về ngành học'],
                'dang-ky-sinh-vien': ['Đăng ký của sinh viên', 'Thông tin đăng ký và xét tuyển'],
                'gioi-thieu': ['Giới thiệu', 'Thông tin về trường và chương trình đào tạo'],
                'lien-he': ['Liên hệ tư vấn', 'Hỗ trợ tư vấn tuyển sinh'],
                'dang-nhap': ['Đăng nhập', 'Màn hình đăng nhập cho quản trị viên'],
                'dang-xuat': ['Đăng xuất', 'Thoát khỏi hệ thống quản lý']
            };

            // Clear previous results
            contentDiv.innerHTML = '';

            // Check if current category content matches the search
            if (currentCategory && content[currentCategory]) {
                const title = content[currentCategory][0].toLowerCase();
                const description = content[currentCategory][1].toLowerCase();

                if (title.includes(input) || description.includes(input)) {
                    contentDiv.innerHTML = `<h5>${content[currentCategory][0]}</h5><p>${content[currentCategory][1]}</p>`;
                } else {
                    contentDiv.innerHTML = '<p>No results found.</p>';
                }
            }
        }
    </script>
</head>

<body>
    <div class="sidebar">
        <h4>Quản lý Admin</h4>
        <div class="input-group mb-3">
            <input type="text" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung"
                oninput="searchContent()" style="border-radius: 27px;">
            <i class="fas fa-search search-icon"></i>
        </div>
        <a onclick="loadContent('home')"><i class="fas fa-home"></i>Home</a>

        <section class="training-section">
            <h5>Chương trình đào tạo</h5>
            <select class="form-select mb-3" onchange="loadContent(this.value)">
                <option value="">Chọn ngành đào tạo</option>
                <option value="cao-dang-mam-non">Cao đẳng mầm non</option>
                <option value="trung-cap-mam-non">Trung cấp mầm non</option>
                <option value="lien-thong-dai-hoc-mam-non">Liên thông đại học mầm non</option>
                <option value="lien-thong-cao-dang-mam-non">Liên thông cao đẳng mầm non</option>
            </select>
        </section>

        <h5>Quản lý khác</h5>
        <a onclick="loadContent('hoc-bong')"><i class="fas fa-gift"></i>Học bổng</a>
        <a onclick="loadContent('tin-tuc')"><i class="fas fa-newspaper"></i>Tin tức</a>
        <a onclick="loadContent('dang-ky-sinh-vien')"><i class="fas fa-user-edit"></i>Đăng ký của sinh viên</a>
        <a onclick="loadContent('gioi-thieu')"><i class="fas fa-info-circle"></i>Giới thiệu</a>
        <a onclick="loadContent('lien-he')"><i class="fas fa-phone"></i>Liên hệ tư vấn</a>

        <div class="settings">
            <h5>Cài đặt</h5>
            <a><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
        </div>
    </div>

    <div class="content">
        <div class="header-container" style="display: flex; align-items: center; justify-content: space-between; ">
            <h2 style="padding-bottom: 10px; white-space: nowrap;">Bảng quản lý nội dung</h2>
            <div class="input-group" style="position: relative; width: 30%;">
                <input type="text" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung"
                    oninput="searchContent()" style="
                    border-radius: 27px;
                    width: 100%;
                    padding: 10px 40px 10px 40px; /* Increased left padding */
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    border: 1px solid #ccc;
                    height: 40px; /* Consistent height */
                ">
                <i class="fas fa-search search-icon"
                    style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%);"></i>
                <!-- Adjusted left position -->
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
        </table>
    </div>
</body>

</html>
