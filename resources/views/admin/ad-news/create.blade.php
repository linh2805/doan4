@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm tin tức mới</h2>
    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nội dung</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Thêm tin</button>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
