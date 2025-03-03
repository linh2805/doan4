@extends('user.index')
@section('name')
@include('user.home.header')

<head>
    <link rel="stylesheet" href="./css/intro.css" type="text/css">
    <link rel="stylesheet" href="./css/text.css" type="text/css">
    <style>
    .info-card img {
        border: 2px solid #ffb885;
        /* Đặt viền đậm hơn */
        border-radius: 8px;
        /* overflow: hidden; */

        margin: 10px;
        transition: transform 0.2s;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Thêm bóng */
    }

    .info-card p {
        color: #f08233;
        padding: 0 10px 10px;
    }

    .info-card h5 {
        color: #ac4c07;
        margin: 10px 0;
    }

    .info-card {
        text-align: center;
    }

    .info-card img:hover {
        transform: scale(1.05);
    }

    .info-card img {
        width: 100%;
        height: 200px;
        /* Chiều cao cố định cho ảnh */
        object-fit: cover;
        /* Đảm bảo ảnh không bị méo */
    }

    .info-card h5:hover,
    .info-card p:hover {
        cursor: pointer;
        transform: scale(1.05);
    }

    .row {
        display: flex;
        justify-content: center;
        /* Căn giữa các div nhỏ */
        flex-wrap: wrap;
        /* Cho phép các div nhỏ xuống hàng khi không đủ chỗ */
    }

    .number-div {
        text-align: center;
        margin-top: 20px;
    }

    .pagination {
        justify-content: center;
    }

    .animated-title {
        color: #f08233;
        font-size: 40px;
        text-align: center;
        animation: pulse 1s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
            /* Phóng to */
        }

        100% {
            transform: scale(1);
            /* Trở lại kích thước ban đầu */
        }
    }
    </style>
</head>

<body>
    <div class="container mt-5" style="padding-top:100px;">
        
        <h2 class="text-center animated-title">Thông báo của trường</h2>
        <div class="row">
            @foreach($news as $item)
            <div class="col-md-3">
                <div class="info-card">
                    <a href="{{ route('user.news.show', ['id' => $item->id]) }}">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                        <h5>{{ $item->title }}</h5>
                        <p>{!! nl2br(e(Str::limit($item->content, 100))) !!}</p> <!-- Giới hạn nội dung -->

                    </a>
                </div>
            </div>
            @endforeach

        </div>
        <div class="number-div" id="numberDiv"></div>
        <nav aria-label="Page navigation">
            <ul class="pagination" id="pagination"></ul>
        </nav>
    </div>
</body>

@include('user.home.footer')