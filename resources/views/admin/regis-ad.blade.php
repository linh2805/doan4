<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Đăng Ký Tài Khoản</h2>
    <!-- Kiểm tra thông báo thành công -->
    @if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
<form action="{{ route('registerAd') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="fullname">Họ và tên</label>
        <input type="text" name="fullname" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="tel" name="phone" required>
    </div>
    <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="confirm-password">Xác nhận mật khẩu</label>
        <input type="password" name="password_confirmation" required>
    </div>
    <div class="form-group">
        <label for="role">Vai trò</label>
        <select name="role">
            <option value="super-admin">Super Admin</option>
            <option value="recruitment-manager">Quản lý Tuyển sinh</option>
            <option value="support-staff">Nhân viên hỗ trợ</option>
        </select>
    </div>
    <!-- <div class="form-group">
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" id="avatar" name="avatar" accept="image/*">
    </div> -->
    <button type="submit">Đăng Ký</button>
</form>
</div>

</body>
</html>