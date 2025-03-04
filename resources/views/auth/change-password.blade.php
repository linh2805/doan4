<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đổi Mật Khẩu</title>
</head>
<body>
    <h2>Đổi Mật Khẩu</h2>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('change.password.submit') }}" method="POST">
        @csrf
        <div>
            <label for="username">Tên đăng nhập hiện tại:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="current_password">Mật khẩu hiện tại:</label>
            <input type="password" name="current_password" id="current_password" required>
        </div>
        <div>
            <label for="new_password">Mật khẩu mới:</label>
            <input type="password" name="new_password" id="new_password" required>
        </div>
        <div>
            <label for="new_password_confirmation">Xác nhận mật khẩu mới:</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" required>
        </div>
        <button type="submit">Đổi Mật Khẩu</button>
    </form>
</body>
</html>