<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin tức</title>
    <link rel="stylesheet" href="{{ asset('source/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="header-container" style="display: flex; align-items: center; justify-content: space-between;">
        <h2 style="padding-bottom: 10px; white-space: nowrap;">Quản lý tin tức</h2>
        <div class="input-group" style="position: relative; width: 30%; display:flex;">
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
    <div id="showFind"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Tải nội dung ad-news vào div #content
        $('#registerLink5').click(function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-news'); // Tải nội dung từ /ad-news vào div content
        });

        // Tìm kiếm
        $('#search-form').on('submit', function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định

            $.ajax({
                url: "{{ route('ad-news.search') }}", // Đường dẫn tới route tìm kiếm
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
    <!-- Nút Thêm -->
    <button class="btn btn-primary mt-3"
        onclick="document.getElementById('addForm').style.display='block'">Thêm</button>

    <!-- Form Thêm Tin Tức -->
    <div id="addForm" style="display: none; margin-top: 20px;">
        <form action="{{ route('ad-news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="extra_content">Nội dung mở rộng</label>
                <textarea id="extra_content" name="extra_content" class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Thêm</button>
        </form>
    </div>

    <!-- Hiển thị danh sách tin tức -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Nội dung</th>
                <th>Nội dung mở rộng</th>
                <th>Quản lý</th>

            </tr>
        </thead>
        <tbody>
        @foreach($news as $index => $new)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><a href="#">{{ $new->title }}</a></td>
                        <td>
                            @if($new->image)
                                <img src="{{ asset('storage/' . $new->image) }}" width="100">
                            @else
                                <img src="/source/images/1.jpg" width="100">
                            @endif
                        </td>
                        <td>{{ Str::limit($new->content, 50) }}</td>
                        <td>{{ $new->extra_content }}</td>
                        <td>
                            <button class="btn btn-warning edit-btn" data-id="{{ $new->id }}" data-title="{{ $new->title }}"
                                data-image="{{ asset('storage/' . $new->image) }}"
                                data-content="{{ $new->content }}">Sửa</button>
                            <form action="{{ route('ad-news.delete', $new->id) }}" method="POST" style="display:inline;"
                                class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger delete-btn" data-id="{{ $new->id }}">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            
        </tbody>
    </table>
    <!-- Edit Form -->
    <div id="editFormContainer" style="display: none; margin-top: 20px;">
        <form id="editForm" action="{{ route('ad-news.update', 'placeholder') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="editTitle" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="editTitle" name="title" required>
            </div>
            <div class="mb-3">
                <label for="editImage" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="editImage" name="image">
                <img id="editImagePreview" width="100" style="display: none;">
            </div>
            <div class="mb-3">
                <label for="editContent" class="form-label">Nội dung</label>
                <textarea class="form-control" id="editContent" name="content" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="extra_content">Nội dung mở rộng</label>
                <textarea id="extra_content" name="extra_content" class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>

    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                // Get data from button attributes
                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const image = this.getAttribute('data-image');
                const content = this.getAttribute('data-content');

                // Populate edit form
                document.getElementById('editTitle').value = title;
                document.getElementById('editContent').value = content;
                const editImagePreview = document.getElementById('editImagePreview');

                if (image) {
                    editImagePreview.src = image;
                    editImagePreview.style.display = 'block';
                } else {
                    editImagePreview.style.display = 'none';
                }

                // Update the form action
                const form = document.getElementById('editForm');
                form.action = form.action.replace('placeholder', id);

                // Show the edit form
                document.getElementById('editFormContainer').style.display = 'block';
            });
        });
    </script>
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                if (confirm('Are you sure you want to delete?')) {
                    this.closest('.delete-form').submit();
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const image = this.getAttribute('data-image');
                const content = this.getAttribute('data-content');
                const extraContent = this.getAttribute('data-extra-content'); // Lấy nội dung mở rộng

                document.getElementById('editTitle').value = title;
                document.getElementById('editContent').value = content;
                document.getElementById('editExtraContent').value =
                    extraContent; // Cập nhật nội dung mở rộng

                const editImagePreview = document.getElementById('editImagePreview');
                if (image) {
                    editImagePreview.src = image;
                    editImagePreview.style.display = 'block';
                } else {
                    editImagePreview.style.display = 'none';
                }

                const form = document.getElementById('editForm');
                form.action = form.action.replace('placeholder', id);
                document.getElementById('editFormContainer').style.display = 'block';
            });
        });
    </script>
</body>

</html>