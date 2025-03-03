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
        <div class="input-group" style="position: relative; width: 30%;">
            <input type="text" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung" style="
            border-radius: 27px;
            width: 100%;
            padding: 10px 40px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            height: 40px;">
        </div>
    </div>

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
                <textarea id="extra_content" name="extra_content" class="form-control"
                    rows="5"></textarea>
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
            @if(isset($news) && count($news) > 0)
            @foreach ($news as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><a href="#">{{ $item->title }}</a></td>
                <td>
                    @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" width="100">
                    @else
                    <img src="/source/images/1.jpg" width="100">
                    @endif
                </td>
                <td>{{ Str::limit($item->content, 50) }}</td>
                <td>{{ $item->extra_content }}</td>
                <td>
                    <button class="btn btn-warning edit-btn" data-id="{{ $item->id }}" data-title="{{ $item->title }}"
                        data-image="{{ asset('storage/' . $item->image) }}"
                        data-content="{{ $item->content }}">Sửa</button>
                    <form action="{{ route('ad-news.delete', $item->id) }}" method="POST" style="display:inline;"
                        class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-btn" data-id="{{ $item->id }}">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center">Chưa có tin tức nào.</td>
            </tr>
            @endif
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
                <textarea id="extra_content" name="extra_content" class="form-control"
                    rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>

    <script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
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
    $(document).ready(function() {
        // Xử lý sự kiện nhấp nút Xóa
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            var id = $(this).data('id'); // Lấy ID từ thuộc tính data-id

            if (confirm('Bạn có chắc chắn muốn xóa không?')) {
                $.ajax({
                    url: '/admin/ad-news/' + id, // Đường dẫn chính xác
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}' // Gửi token CSRF
                    },
                    success: function(response) {
                        alert('Xóa thành công!');
                        location.reload(); // Tải lại trang để cập nhật danh sách
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText); // In thông tin chi tiết của lỗi
                        alert('Không thể xóa mục: ' + (xhr.responseJSON && xhr.responseJSON
                            .error ? xhr.responseJSON.error :
                            'Đã xảy ra lỗi không xác định.'));
                    }
                });
            }
        });
    });
    </script>
    <script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
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