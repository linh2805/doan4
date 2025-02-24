@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chỉnh sửa tin tức</h2>
    <form action="{{ route('news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nội dung</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $news->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
