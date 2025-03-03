<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin tức</title>
    <link rel="stylesheet" href="{{ asset('source/css/bootstrap.min.css') }}">

</head>

<body>
    <div id="editFormContainer" class="container">
        <form action="{{ route('ad-news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" width="100">
                @endif
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea class="form-control" id="content" name="content" rows="3"
                    required>{{ $news->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="extra_content">Nội dung mở rộng</label>
                <textarea id="extra_content" name="extra_content" class="form-control"
                    rows="5" value="extra_content"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>

    </div>