<head>
    <link rel="stylesheet" href="/source/css/admin.css" type="text/css">

</head>
<div class="header-container" style="display: flex; align-items: center; justify-content: space-between; ">
    <h2 style="padding-bottom: 10px; white-space: nowrap;">Quản lý bình luận</h2>
    <div class="input-group" style="position: relative; width: 30%;">
        <input type="text" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung"
            oninput="searchContent()" style="
        border-radius: 27px;
        width: 100%;
        padding: 10px 40px; /* Giữ padding phía trái và phải cho đều */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc;
        height: 40px; /* Chiều cao đồng nhất */
        ">
        <!-- <i class="fas fa-search search-icon"
        style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); font-size: 18px;"></i> -->

    </div>
</div>
<div id="search-result"></div>
<table class="table table-bordered table-hover mt-3">
    <thead class="table-dark">
        <tr>
            <th>STT</th>
            <th>Tên người dùng</th>
            <th>Bình luận</th>
            <th>Thời gian</th>
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $index => $comment)
            <tr>
                <td>{{ $index + 1 }}</td> <!-- Số thứ tự -->
                <td>{{ $comment->name }}</td> <!-- Tên người dùng -->
                <td>{{ $comment->comment }}</td> <!-- Bình luận -->
                <!-- <td>{{ $comment->created_at }}</td>  -->
                <td>{{ \Carbon\Carbon::parse($comment->created_at)->format('Y-m-d') }}</td>

                <td>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>