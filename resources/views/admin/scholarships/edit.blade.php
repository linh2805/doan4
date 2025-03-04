<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý học bổng</title>
    <link rel="stylesheet" href="{{ asset('source/css/bootstrap.min.css') }}">

</head>

<body>
    <div id="editFormContainer" class="container">
        <form action="{{ route('ad-hb.update', $scholarship->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId" name="id" value="{{ $scholarship->id }}">

            <div class="mb-3">
                <label for="editTitle" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="editTitle" name="title" value="{{ $scholarship->title }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="editDescription" class="form-label">Mô tả</label>
                <textarea class="form-control" id="editDescription" name="description"
                    rows="3">{{ $scholarship->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="editCriteria" class="form-label">Tiêu chí</label>
                <textarea class="form-control" id="editCriteria" name="criteria"
                    rows="3">{{ $scholarship->criteria }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>

    <script>
    $(document).on("submit", "#editForm", function(e) {
        e.preventDefault();

        let id = $("#editId").val();
        let formData = new FormData(this);
        formData.append('_method', 'PUT'); // Laravel cần điều này

        $.ajax({
            url: "/admin/ad-hb/" + id,
            type: "POST", // Laravel yêu cầu POST khi gửi _method=PUT
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert("Cập nhật thành công!");
                location.reload();
            },
            error: function(xhr) {
                alert("Lỗi: " + xhr.responseText);
            }
        });
    });
    </script>
</body>