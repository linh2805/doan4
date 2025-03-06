<head>
    <link rel="stylesheet" href="/source/css/admin.css" type="text/css">

</head>
<div class="header-container" style="display: flex; align-items: center; justify-content: space-between; ">
    <h2 style="padding-bottom: 10px; white-space: nowrap;">Quản lý bình luận</h2>
    <div class="input-group" style="position: relative; width: 30%;">
    <form id="search-form" method="GET">
        <input type="text" name="query" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung" style="
            border-radius: 27px;
            width: 100%;
            padding: 10px 40px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            height: 40px;">
        <button type="submit">Tìm</button>
    </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Tải nội dung ad-news vào div #content
        $('#registerLink3').click(function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-comment'); // Tải nội dung từ /ad-news vào div content
        });

        // Tìm kiếm
        $('#search-form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('ad-comment.search') }}", // Đường dẫn tới route tìm kiếm
                method: "GET",
                data: $(this).serialize(), // Gửi dữ liệu từ form
                success: function (data) {
                    // Thay thế nội dung bảng bằng kết quả tìm kiếm
                    $('table tbody').html(data); // Cập nhật tbody của bảng
                },
                error: function (xhr) {
                    console.log(xhr.responseText); // Xử lý lỗi nếu có
                }
            });
        });
    });
</script>
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