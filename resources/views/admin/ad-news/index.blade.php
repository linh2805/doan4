@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Quản lý tin tức</h2>
    <a href="{{ route('news.create') }}" class="btn btn-primary">Thêm tin tức</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $n)
                <tr>
                    <td>{{ $n->title }}</td>
                    <td><img src="{{ asset('storage/' . $n->image) }}" width="100"></td>
                    <td>
                        <a href="{{ route('news.edit', $n->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('news.destroy', $n->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
