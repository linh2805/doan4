<head>
    <link rel="stylesheet" href="/source/css/admin.css" type="text/css">

</head>
<style>
    table {
        width: 100%;
        /* Use full width */
        border-collapse: collapse;
        /* Optional for better styling */
        table-layout: fixed;
        /* Ensure equal distribution of widths */
    }

    th,
    td {
        text-align: center;
        /* Center text in header and cells */
        vertical-align: top;
        /* Align content to the top */
    }

    .cell-content {
        max-height: 300px;
        /* Set desired height */
        overflow-y: auto;
        /* Enable vertical scrolling */
        scrollbar-width: none;
        vertical-align: top;
        /* Align content to the top */
    }
</style>
<div class="header-container"
    style="display: flex; align-items: center; justify-content: space-between;height:80px;background-color:rgb(236, 172, 52); border-radius:20px;">
    <h2
        style="padding-bottom: 10px; white-space: nowrap; padding-left: 10px;font-weight: bold;font-size: 34px;color: white;">
        Quản lý bình luận</h2>
    <div class="input-group" style="position: relative; width: 30%; display:flex;">
        <form id="search-form" method="GET"
            style="display: flex; align-items: center; margin: 20px; padding-top: 20px;">
            <input type="text" name="query" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung"
                style=" border-radius: 27px;width: 100%;padding: 10px 20px;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);border: 1px solid #ccc;transition: border-color 0.3s;">
            <button type="submit"
                style="background-color: #40d946;color: white;border: none;border-radius: 27px;padding: 10px 20px;margin-left: 10px;cursor: pointer;  transition: background-color 0.3s;">Search</button>
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
                <td>
                    <div class="cell-content">
                        {{ $comment->name }}
                    </div>
                </td> <!-- Tên người dùng -->
                <td>
                    <div class="cell-content">
                        {{ $comment->comment }}
                    </div>
                </td> <!-- Bình luận -->
                <!-- <td>{{ $comment->created_at }}</td>  -->
                <td>
                    <div class="cell-content">
                        {{ \Carbon\Carbon::parse($comment->created_at)->format('Y-m-d') }}
                    </div>
                </td>

                <td>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" class="btn btn-danger delete-btn">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>