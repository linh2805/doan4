<!-- admin/intro/edit.blade.php -->
<form id="editForm" action="{{ route('intros.update', $intros->id) }}" method="POST" enctype="multipart/form-data"
    onsubmit="return saveIntro(event, {{ $intros->id }})">
    @csrf
    <label for="intro_school">Giới thiệu về trường:</label>
    <input type="text" name="intro_school" id="intro_school" value="{{ $intros->intro_school }}" required><br><br>

    <label for="job">Cơ hội việc làm:</label>
    <textarea name="job" id="job">{{ $intros->job }}</textarea><br><br>
    <label for="image1">Ảnh giới thiệu:</label>
    <img id="preview1" src="{{ asset($intros->image1) }}" alt="Ảnh 1"
        style="display: {{ $intros->image1 ? 'block' : 'none' }};">
    <input type="file" name="image1" id="image1" onchange="previewImage(event, 'preview1')"><br><br>

    <label for="image2">Ảnh việc làm 1:</label>
    <img id="preview2" src="{{ asset($intros->image2) }}" alt="Ảnh 2"
        style="display: {{ $intros->image2 ? 'block' : 'none' }};">
    <input type="file" name="image2" id="image2" onchange="previewImage(event, 'preview2')"><br><br>

    <label for="image3">Ảnh việc làm 2:</label>
    <img id="preview3" src="{{ asset($intros->image3) }}" alt="Ảnh 3"
        style="display: {{ $intros->image3 ? 'block' : 'none' }};">
    <input type="file" name="image3" id="image3" onchange="previewImage(event, 'preview3')"><br><br>

    <label for="image4">Ảnh việc làm 3:</label>
    <img id="preview4" src="{{ asset($intros->image4) }}" alt="Ảnh 4"
        style="display: {{ $intros->image4 ? 'block' : 'none' }};">
    <input type="file" name="image4" id="image4" onchange="previewImage(event, 'preview4')"><br><br>

    <label for="image5">Ảnh việc làm 4:</label>
    <img id="preview5" src="{{ asset($intros->image5) }}" alt="Ảnh 5"
        style="display: {{ $intros->image5 ? 'block' : 'none' }};">
    <input type="file" name="image5" id="image5" onchange="previewImage(event, 'preview5')"><br><br>

    <!-- Các trường khác tương tự -->

    <button type="submit">Lưu</button>
    <button type="button" onclick="cancelEdit({{ $intros->id }})">Hủy</button>
</form>
<script>
    function cancelEdit(introId) {
        $('#row-' + introId).show(); // Hiển thị lại hàng
        $('#editContent').empty(); // Xóa nội dung chỉnh sửa

        // Quay lại URL trước đó
        history.back();
    }
</script>
<script>
    function saveIntro(event, introId) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của form

        var formData = new FormData(document.getElementById('editForm')); // Tạo FormData từ form

        $.ajax({
            url: "{{ route('intros.edit', ['id' => '__ID__']) }}".replace('__ID__', introId),
            type: 'POST',
            data: formData,
            processData: false, // Không xử lý dữ liệu
            contentType: false, // Không đặt content type
            success: function (response) {
                // Xử lý phản hồi thành công
                $('#editContent').empty(); // Xóa nội dung chỉnh sửa
                $('#row-' + introId).show(); // Hiển thị lại hàng trong bảng

                // Có thể cập nhật nội dung trong bảng nếu cần
                // alert('Cập nhật thành công!');
                window.location.href = '/admin'; // Thay đổi đường dẫn nếu cần

            },
            error: function (xhr) {
                // Xử lý lỗi
                var msg = "Lỗi: " + xhr.status + " " + xhr.statusText;
                alert(msg);
            }
        });
    }
</script>