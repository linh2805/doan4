<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập</title>
</head>
<body>
    <h2>Đăng Nhập</h2>

    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div>
            <label for="username">Tên người dùng:</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div>
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Đăng Nhập</button>
    </form>
</body>
</html>