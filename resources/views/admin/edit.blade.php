<form id="editForm" onsubmit="saveIntro(event, {{ $homeQuality->id }})" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    
    <div class="form-group">
        <label for="classroom_system">Classroom System</label>
        <input type="text" name="classroom_system" class="form-control" value="{{ $homeQuality->classroom_system }}" >
    </div>
    
    <div class="form-group">
        <label for="lab_system">Lab System</label>
        <input type="text" name="lab_system" class="form-control" value="{{ $homeQuality->lab_system }}" >
    </div>

    <div class="form-group">
        <label for="image1">Image 1</label>
        <img id="preview1" src="{{ asset($homeQuality->image1) }}" alt="Ảnh 1"
        style="display: {{ $homeQuality->image1 ? 'block' : 'none' }}; max-width: 200px;">
        <input type="file" name="image1" class="form-control" id="image1" onchange="previewImage(event, 'preview1')">
    </div>
    <div class="form-group">
        <label for="image2">Image 2</label>
        <img id="preview2" src="{{ asset($homeQuality->image2) }}" alt="Ảnh 2"
        style="display: {{ $homeQuality->image2 ? 'block' : 'none' }}; max-width: 200px;">
        <input type="file" name="image2" class="form-control" id="image2" onchange="previewImage(event, 'preview2')">
    </div>
    <div class="form-group">
        <label for="image3">Image 3</label>
        <img id="preview3" src="{{ asset($homeQuality->image3) }}" alt="Ảnh 3"
        style="display: {{ $homeQuality->image3 ? 'block' : 'none' }}; max-width: 200px;">
        <input type="file" name="image3" class="form-control" id="image3" onchange="previewImage(event, 'preview3')">
    </div>
    <div class="form-group">
        <label for="image4">Image 4</label>
        <img id="preview4" src="{{ asset($homeQuality->image4) }}" alt="Ảnh 4"
        style="display: {{ $homeQuality->image4 ? 'block' : 'none' }}; max-width: 200px;">
        <input type="file" name="image4" class="form-control" id="image4" onchange="previewImage(event, 'preview4')">
    </div>

    <!-- Thêm các trường ảnh khác tương tự -->

    <button type="submit" >Cập nhật</button>
    <button type="button" onclick="cancelEdit({{ $homeQuality->id }})">Hủy</button>

</form>
<script>
    function saveIntro(event, introId) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của form

        var formData = new FormData(document.getElementById('editForm')); // Tạo FormData từ form

        $.ajax({
            url: "{{ route('home-quality.update', '__ID__') }}".replace('__ID__', introId),
            type: 'POST',
            data: formData,
            processData: false, // Không xử lý dữ liệu
            contentType: false, // Không đặt content type
            success: function (response) {
                $('#editContent').empty(); // Xóa nội dung chỉnh sửa
                $('#row-' + introId).show(); // Hiển thị lại hàng trong bảng
                window.location.href = '/admin'; // Thay đổi đường dẫn nếu cần
            },
            error: function (xhr) {
                var msg = "Lỗi: " + xhr.status + " " + xhr.statusText;
                alert(msg);
            }
        });
    }

    function cancelEdit(introId) {
        $('#row-' + introId).show(); // Hiển thị lại hàng
        $('#editContent').empty(); // Xóa nội dung chỉnh sửa
        history.back();
    }
</script>
<script>
    function previewImage(event, previewId) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function (e) {
            const img = document.getElementById(previewId);
            img.src = e.target.result; // Cập nhật nguồn ảnh
            img.style.display = 'block'; // Hiển thị ảnh
        }

        if (file) {
            reader.readAsDataURL(file); // Đọc dữ liệu ảnh
        }
    }
</script>