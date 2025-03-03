<div class="container">
    <h1>Chỉnh sửa chương trình liên thông cao đẳng mầm non</h1>

    <form id="editForm" onsubmit="saveConnection(event, {{ $connection->id }})" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="introductory_photo">Ảnh giới thiệu</label>
            <img id="preview" src="{{ asset($connection->introductory_photo) }}" alt="Ảnh giới thiệu"
                 style="display: {{ $connection->introductory_photo ? 'block' : 'none' }}; max-width: 200px;">
            <input type="file" name="introductory_photo" class="form-control" id="introductory_photo" onchange="previewImage(event, 'preview')">
        </div>

        <div class="form-group">
            <label for="introduce">Giới thiệu</label>
            <input type="text" name="introduce" class="form-control" value="{{ $connection->introduce }}">
        </div>

        <div class="form-group">
            <label for="time">Thời gian</label>
            <input type="text" name="time" class="form-control" value="{{ $connection->time }}">
        </div>

        <div class="form-group">
            <label for="location">Địa điểm</label>
            <input type="text" name="location" class="form-control" value="{{ $connection->location }}">
        </div>
<div id="curriculumContentContainer">
    @foreach ($connection->curriculum_content as $index => $content)
        <div class="form-group">
            <label for="curriculum_content_{{ $index }}">Nội dung chương trình {{ $index + 1 }}</label>
            <input type="text" name="curriculum_content[]" class="form-control" value="{{ $content }}" oninput="checkEmpty(this)">
            <button type="button" class="btn-danger" onclick="removeContent(this)">Xóa</button>
        </div>
    @endforeach
</div>
<button type="button" class="btn-primary" onclick="addContent()">Thêm nội dung chương trình</button>


        <button type="submit" class="btn-primary">Cập nhật</button>
        <button type="button" onclick="cancelEdit({{ $connection->id }})" class="btn-secondary">Hủy</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
<script>
    function saveConnection(event, connectionId) {
    event.preventDefault(); // Ngăn chặn hành vi mặc định của form

    var formData = new FormData(document.getElementById('editForm')); // Tạo FormData từ form

    $.ajax({
        url: "{{ route('connection.update', '__ID__') }}".replace('__ID__', connectionId),
        type: 'POST',
        data: formData,
        processData: false, // Không xử lý dữ liệu
        contentType: false, // Không đặt content type
        success: function (response) {
            $('#editContent').empty(); // Xóa nội dung chỉnh sửa
            $('#row-' + connectionId).show(); // Hiển thị lại hàng trong bảng
            window.location.href = '/admin'; // Thay đổi đường dẫn nếu cần
        },
        error: function (xhr) {
            var msg = "Lỗi: " + xhr.status + " " + xhr.statusText;
            alert(msg);
        }
    });
}
</script>

<script>
    function addContent() {
        const container = document.getElementById('curriculumContentContainer');
        const index = container.children.length; // Tính toán chỉ số tiếp theo
        const newContent = `
            <div class="form-group">
                <label for="curriculum_content_${index}">Nội dung chương trình ${index + 1}</label>
                <input type="text" name="curriculum_content[]" class="form-control" value="" oninput="checkEmpty(this)">
                <button type="button" class="btn btn-danger" onclick="removeContent(this)">Xóa</button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newContent);
    }

    function removeContent(button) {
        button.parentElement.remove(); // Xóa trường tương ứng
    }

    function checkEmpty(input) {
        if (input.value.trim() === '') {
            removeContent(input.nextElementSibling); // Xóa trường nếu trống
        }
    }
</script>