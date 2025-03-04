<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản lý học bổng</title>
    <link rel="stylesheet" href="{{ asset('source/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="header-container" style="display: flex; align-items: center; justify-content: space-between;">
        <h2 style="padding-bottom: 10px; white-space: nowrap;">Quản lý học bổng</h2>
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
    <button id="showFormBtn" class="btn btn-primary mt-3"
        onclick="document.getElementById('addFormContainer').style.display='block'">THÊM</button>

    <!-- Form Thêm Học Bổng (Ẩn mặc định) -->
    <div id="addFormContainer" style="display: none; margin-top: 20px;">
        <form action="{{ route('ad-hb.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="criteria" class="form-label">Tiêu chí</label>
                <textarea style="height:150px;" class="form-control" id="criteria" name="criteria" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Thêm</button>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Tiêu chí</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($scholarships as $scholarship)
            <tr>
                <td>{{ $scholarship->title }}</td>
                <td>{{ $scholarship->description }}</td>
                <td>{{ $scholarship->criteria }}</td>
                <td>
                    <a href="#" class="btn btn-warning edit-btn" data-id="{{ $scholarship->id }}">Sửa</a>
                    <form action="{{ route('ad-hb.delete', $scholarship->id) }}" method="POST" style="display:inline;"
                        class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-btn"
                            data-id="{{ $scholarship->id }}">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>


    <!-- Form Sửa -->
    <div id="editFormContainer">

    </div>

    <!-- <script>
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('editFormContainer').style.display = 'block';
            document.getElementById('editId').value = this.dataset.id;
            document.getElementById('editTitle').value = this.dataset.title;
            document.getElementById('editDescription').value = this.dataset.description;
            document.getElementById('editCriteria').value = this.dataset.criteria;
            document.getElementById('editStatus').value = this.dataset.status;
            document.getElementById('editForm').action = '/admin/ad-hb/' + this.dataset.id;
        });
    });
    </script> -->

    <script>
    $(document).ready(function() {
        $(".edit-btn").on("click", function(e) {
            e.preventDefault();

            let scholarshipId = $(this).data("id"); // Lấy ID học bổng
            $.ajax({
                url: "/admin/ad-hb/" + scholarshipId + "/edit", // Route to edit scholarship
                type: "GET",
                success: function(response) {
                    $("#editFormContainer").html(response).show();
                },
                error: function() {
                    alert("Lỗi khi tải form chỉnh sửa!");
                }
            });

        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $("#addFormContainer form").on("submit", function(e) {
            e.preventDefault(); // Prevent page reload

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('ad-hb.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response.success);

                    let newRow = `
                <tr>
                    <td>${response.scholarship.title}</td>
                    <td>${response.scholarship.description}</td>
                    <td>${response.scholarship.criteria ?? ''}</td>
                    <td>
                        <a href="#" class="btn btn-warning edit-btn" data-id="${response.scholarship.id}">Sửa</a>
                        <form action="{{ route('ad-hb.delete', '') }}/${response.scholarship.id}" method="POST" style="display:inline;" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger delete-btn" data-id="${response.scholarship.id}">Xóa</button>
                        </form>
                    </td>
                </tr>
                `;

                    $("table tbody").append(newRow); // Add new row to the table

                    $("#addFormContainer form")[0].reset(); // Reset form
                    $("#addFormContainer").hide(); // Hide form
                },
                error: function() {
                    alert("Lỗi khi thêm học bổng!");
                }
            });
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
                    url: '/admin/ad-hb/' + id, // Đường dẫn chính xác
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

</body>

</html>