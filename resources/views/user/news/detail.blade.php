@extends('user.index')
    @section('name')
    @include('user.home.header')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang Chi Tiết Tin Tức</title>
        <style>
        .detail {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding-top: 100px;
            text-align: center;
        }

        h1 {

            font-size: 2.5em;
            text-align: center;
            animation: pulse 1.5s infinite alternate ease-in-out;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.2);
            }
        }

        p {
            line-height: 1.6;
            color: #555;
        }

        .detail-img {
            width: 800px;
            height: 500px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
        }

        .detail-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }
        </style>
    </head>

    <body>
        <div class="container mt-5" style="padding-top:100px;">
            <div class="detail">
                <h1 style="color: #ff9800;">{{ $newsItem->title }}</h1>

                <div class="image-detail text-center">
                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Hình ảnh minh họa" class="detail-img">
                </div>

                <p style="padding-top: 10px;">
                    {!! nl2br(e($newsItem->content)) !!}
                </p>
                @if (!empty($newsItem->full_content))
                <p>{!! nl2br(e($newsItem->full_content)) !!}</p>
                @endif

                @if (!empty($newsItem->extra_content))
                <p>{!! nl2br(e($newsItem->extra_content)) !!}</p>
                @endif
                <div class="mt-4">
                    <a href="{{ route('user.news.index') }}" class="btn btn-primary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </body>
    @include('user.home.footer')