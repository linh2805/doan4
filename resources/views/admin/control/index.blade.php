<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bình luận</title>
    <link rel="stylesheet" href="/source/css/admin.css" type="text/css">
</head>

<body>
    <div class="header-container" style="display: flex; align-items: center; justify-content: space-between;">
        <h2 style="padding-bottom: 10px; white-space: nowrap;">Quản lý bình luận</h2>
        <div class="input-group" style="position: relative; width: 30%;">
            <input type="text" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung"
                oninput="searchContent()" style="
                border-radius: 27px;
                width: 100%;
                padding: 10px 40px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                border: 1px solid #ccc;
                height: 40px;">
        </div>
    </div>

    <div id="search-result"></div>

    <table>
        <thead>
            <tr>
                <th>Người dùng</th>
                <th>Bình luận</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->user->name ?? 'Khách' }}</td>
                <td>{{ $comment->content }}</td>
                <td>
                    <button onclick="editComment({{ $comment->id }})">Sửa</button>
                    <button onclick="deleteComment({{ $comment->id }})">Xóa</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
    function deleteComment(commentId) {
        if (confirm("Bạn có chắc muốn xóa bình luận này?")) {
            fetch(`/admin/comments/delete/${commentId}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }).then(response => response.json()).then(data => {
                alert(data.message);
                location.reload();
            }).catch(error => console.error("Lỗi:", error));
        }
    }
    </script>
</body>

</html>
