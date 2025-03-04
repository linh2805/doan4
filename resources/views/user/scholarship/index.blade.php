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
            @foreach ($scholarships as $scholarship)
                <div class="scholarship-card">
                    <div class="scholarship-header text-primary">{{ $scholarship->title }}</div>
                    <p class="highlight">{{ $scholarship->description }}</p>
                    <p>Điều kiện nhận học bổng:</p>
                    <ul>
                        <li>{{ $scholarship->criteria }}</li>
                    </ul>
                </div>
            @endforeach
            <h3 class="text-warning mt-4">Điều Kiện Nhận Học Bổng</h3>
            <ul>
                <li>Thành tích học tập xuất sắc</li>
                <li>Hoàn cảnh khó khăn có giấy tờ chứng minh</li>
                <li>Tham gia các hoạt động ngoại khóa</li>
            </ul>

        </section>
    </div>

</body>

@include('user.home.footer')