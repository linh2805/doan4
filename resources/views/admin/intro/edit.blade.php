<!-- admin/intro/edit.blade.php -->
<form id="editForm" action="{{ route('intros.update', $intros->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return saveIntro(event, {{ $intros->id }})">
    @csrf
    <label for="title">Tiêu đề:</label>
    <input type="text" name="title" id="title" value="{{ $intros->title }}" required><br><br>
    
    <label for="description">Mô tả:</label>
    <textarea name="description" id="description">{{ $intros->description }}</textarea><br><br>
    <label for="image1">Ảnh 1:</label>
    <img id="preview1" src="{{ asset($intros->image1) }}" alt="Ảnh 1" style="display: {{ $intros->image1 ? 'block' : 'none' }};">
    <input type="file" name="image1" id="image1" onchange="previewImage(event, 'preview1')"><br><br>

    <label for="image2">Ảnh 2:</label>
    <img id="preview2" src="{{ asset($intros->image2) }}" alt="Ảnh 2" style="display: {{ $intros->image2 ? 'block' : 'none' }};">
    <input type="file" name="image2" id="image2" onchange="previewImage(event, 'preview2')"><br><br>

    <label for="image3">Ảnh 3:</label>
    <img id="preview3" src="{{ asset($intros->image3) }}" alt="Ảnh 3" style="display: {{ $intros->image3 ? 'block' : 'none' }};">
    <input type="file" name="image3" id="image3" onchange="previewImage(event, 'preview3')"><br><br>

    <label for="image4">Ảnh 4:</label>
    <img id="preview4" src="{{ asset($intros->image4) }}" alt="Ảnh 4" style="display: {{ $intros->image4 ? 'block' : 'none' }};">
    <input type="file" name="image4" id="image4" onchange="previewImage(event, 'preview4')"><br><br>

    <label for="image5">Ảnh 5:</label>
    <img id="preview5" src="{{ asset($intros->image5) }}" alt="Ảnh 5" style="display: {{ $intros->image5 ? 'block' : 'none' }};">
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
        url: '/ad-intro-edit/' + introId, // URL để gửi yêu cầu
        type: 'POST',
        data: formData,
        processData: false, // Không xử lý dữ liệu
        contentType: false, // Không đặt content type
        success: function(response) {
            // Xử lý phản hồi thành công
            $('#editContent').empty(); // Xóa nội dung chỉnh sửa
            $('#row-' + introId).show(); // Hiển thị lại hàng trong bảng
            // Có thể cập nhật nội dung trong bảng nếu cần
            alert('Cập nhật thành công!');
        },
        error: function(xhr) {
            // Xử lý lỗi
            var msg = "Lỗi: " + xhr.status + " " + xhr.statusText;
            alert(msg);
        }
    });
}
</script>