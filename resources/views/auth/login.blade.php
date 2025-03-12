<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập</title>
    <style>
    /* Hiệu ứng nền động */
    @keyframes gradientBG {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #fad0c4, #ffdde1);
        background-size: 400% 400%;
        animation: gradientBG 10s ease infinite;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        flex-direction: column;
    }

    /* Tiêu đề */
    h2 {
        color: #e65100;
        font-size: 26px;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
        position: relative;
        animation: fadeIn 1s ease-in-out;
    }

    h2::after {
        content: "";
        width: 80px;
        height: 4px;
        background-color: #e65100;
        display: block;
        margin: 8px auto 0;
        border-radius: 2px;
    }

    /* Hiệu ứng mờ dần */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Thiết kế form */
    form {
        background: rgba(255, 255, 255, 0.9);
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        width: 360px;
        text-align: center;
        backdrop-filter: blur(10px);
        animation: slideUp 0.8s ease-in-out;
    }

    @keyframes slideUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    label {
        font-weight: bold;
        color: #e65100;
        display: block;
        text-align: left;
        margin-bottom: 5px;
    }

    input {
        width: 95%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
        font-size: 14px;
        transition: all 0.3s ease-in-out;
    }

    input:focus {
        border-color: #e65100;
        outline: none;
        box-shadow: 0 0 8px rgba(230, 81, 0, 0.5);
    }

    button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(45deg, #ff9800, #ff5722);
        border: none;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border-radius: 6px;
        cursor: pointer;
        transition: transform 0.2s, background 0.3s;
    }

    button:hover {
        background: linear-gradient(45deg, #e65100, #d84315);
        transform: scale(1.05);
    }

    .submit-container {
        display: flex;
        gap: 10px;
    }

    .change a {
        text-decoration: none;
        /* Bỏ gạch chân */
        color: white;
        /* Màu chữ mặc định */
        font-weight: bold;
        display: block;
        transition: color 0.3s ease-in-out;
    }

    .change:active a {
        color: yellow;
        /* Màu chữ khi ấn vào */
    }
    </style>
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
        <div class="submit-container">
            <button type="submit">Đăng Nhập</button>
            <button type="submit" class="change"><a href="{{ route('change.password') }}">Đổi mật khẩu</a></button>
        </div>
    </form>
</body>

</html>