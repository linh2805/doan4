<form id="editForm" onsubmit="saveIntro(event, {{ $schoolPhoto->id }})" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    
    <div class="form-group">
        <label for="image1">Image 1</label>
        <img id="preview1" src="{{ asset($schoolPhoto->image1) }}" alt="Ảnh 1"
        style="display: {{ $schoolPhoto->image1 ? 'block' : 'none' }}; max-width: 200px;">
        <input type="file" name="image1" class="form-control" id="image1" onchange="previewImage(event, 'preview1')">
    </div>
    <div class="form-group">
        <label for="image2">Image 2</label>
        <img id="preview2" src="{{ asset($schoolPhoto->image2) }}" alt="Ảnh 2"
        style="display: {{ $schoolPhoto->image2 ? 'block' : 'none' }}; max-width: 200px;">
        <input type="file" name="image2" class="form-control" id="image2" onchange="previewImage(event, 'preview2')">
    </div>
    <div class="form-group">
        <label for="image3">Image 3</label>
        <img id="preview3" src="{{ asset($schoolPhoto->image3) }}" alt="Ảnh 3"
        style="display: {{ $schoolPhoto->image3 ? 'block' : 'none' }}; max-width: 200px;">
        <input type="file" name="image3" class="form-control" id="image3" onchange="previewImage(event, 'preview3')">
    </div>
    <div class="form-group">
        <label for="image4">Image 4</label>
        <img id="preview4" src="{{ asset($schoolPhoto->image4) }}" alt="Ảnh 4"
        style="display: {{ $schoolPhoto->image4 ? 'block' : 'none' }}; max-width: 200px;">
        <input type="file" name="image4" class="form-control" id="image4" onchange="previewImage(event, 'preview4')">
    </div>

    <div class="form-group">
        <label for="image5">Image 5</label>
        <img id="preview5" src="{{ asset($schoolPhoto->image5) }}" alt="Ảnh 45"
        style="display: {{ $schoolPhoto->image5 ? 'block' : 'none' }}; max-width: 200px;">
        <input type="file" name="image5" class="form-control" id="image5" onchange="previewImage(event, 'preview5')">
    </div>

    <div class="form-group">
        <label for="image6">Image 6</label>
        <img id="preview6" src="{{ asset($schoolPhoto->image6) }}" alt="Ảnh 6"
        style="display: {{ $schoolPhoto->image6 ? 'block' : 'none' }}; max-width: 200px;">
        <input type="file" name="image6" class="form-control" id="image6" onchange="previewImage(event, 'preview6')">
    </div>

    <div class="form-group">
        <label for="image7">Image 7</label>
        <img id="preview7" src="{{ asset($schoolPhoto->image7) }}" alt="Ảnh 7"
        style="display: {{ $schoolPhoto->image7 ? 'block' : 'none' }}; max-width: 200px;">
        <input type="file" name="image7" class="form-control" id="image7" onchange="previewImage(event, 'preview7')">
    </div>

    <!-- Thêm các trường ảnh khác tương tự -->

    <button type="submit" >Cập nhật</button>
    <button type="button" onclick="cancelEdit({{ $schoolPhoto->id }})">Hủy</button>

</form>
<script>
    function saveIntro(event, introId) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của form

        var formData = new FormData(document.getElementById('editForm')); // Tạo FormData từ form

        $.ajax({
            url: "{{ route('school_photo.update', '__ID__') }}".replace('__ID__', introId),
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