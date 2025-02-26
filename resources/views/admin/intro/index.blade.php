<head>
    <!-- <link rel="stylesheet" href="/source/css/admin.css" type="text/css"> -->

</head>
<style>
    #myModal {
            display: none;  /* Ẩn modal */
            position: fixed; /* Đặt modal ở vị trí cố định */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Màu nền mờ */
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
        }
        /* Nội dung modal */
        .modal-content {
            background: white;
            padding: 20px;
            width: 80%; /* Chiều rộng modal */
            max-width: 600px; /* Chiều rộng tối đa */
            height: 400px; /* Chiều cao cố định */
            overflow-y: auto; /* Cuộn dọc nếu nội dung quá dài */
            border-radius: 5px; /* Bo góc */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng */
        }
        img {
            max-width: 100px; /* Kích thước tối đa cho ảnh */
            display: block; /* Đảm bảo ảnh hiển thị theo chiều dọc */
            margin-bottom: 10px; /* Khoảng cách dưới ảnh */
        }
</style>
<div class="header-container" style="display: flex; align-items: center; justify-content: space-between; ">
    <h2 style="padding-bottom: 10px; white-space: nowrap;">Quản lý trang giới thiệu</h2>
    <div class="input-group" style="position: relative; width: 30%;">
        <input type="text" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung"
            oninput="searchContent()" style="
        border-radius: 27px;
        width: 100%;
        padding: 10px 40px; /* Giữ padding phía trái và phải cho đều */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc;
        height: 40px; /* Chiều cao đồng nhất */
        ">
        <!-- <i class="fas fa-search search-icon"
        style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); font-size: 18px;"></i> -->

    </div>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div id="search-result"></div>
<table class="table table-bordered table-hover mt-3">
    <thead class="table-dark">
        <tr>
            <th>Ảnh 1</th>
            <th>Ảnh 2</th>
            <th>Ảnh 3</th>
            <th>Ảnh 4</th>
            <th>Ảnh 5</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($intros as $intro)
            <tr id="row-{{$intro->id}}">
                <td>
                    <img src="{{ asset($intro->image1) }}" alt="Ảnh 1" class="img-fluid" style="max-width: 100px;">
                </td>
                <td>
                    <img src="{{ asset($intro->image2) }}" alt="Ảnh 2" class="img-fluid" style="max-width: 100px;">
                </td>
                <td>
                    <img src="{{ asset($intro->image3) }}" alt="Ảnh 3" class="img-fluid" style="max-width: 100px;">
                </td>
                <td>
                    <img src="{{ asset($intro->image4) }}" alt="Ảnh 4" class="img-fluid" style="max-width: 100px;">
                </td>
                <td>
                    <img src="{{ asset($intro->image5) }}" alt="Ảnh 5" class="img-fluid" style="max-width: 100px;">
                </td>
                <td>
                    <button type="button" onclick="editIntro({{ $intro->id }})">Sửa</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="editContent"></div> <!-- Vị trí để hiển thị form chỉnh sửa -->
<div id="content">

<div id="myModal">
    <div class="modal-content">
        <h2>Chỉnh Sửa Ảnh</h2>
        <form action="{{ route('intros.update', $intro->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Các trường input file như đã đề cập trước đó -->
            <label for="image1">Ảnh 1:</label>
            <img id="preview1" src="{{ asset($intro->image1) }}" alt="Ảnh 1" style="display: {{ $intro->image1 ? 'block' : 'none' }};">
            <input type="file" name="image1" id="image1" onchange="previewImage(event, 'preview1')"><br><br>
            
            <label for="image2">Ảnh 2:</label>
            <img id="preview2" src="{{ asset($intro->image2) }}" alt="Ảnh 2" style="display: {{ $intro->image2 ? 'block' : 'none' }};">
            <input type="file" name="image2" id="image2" onchange="previewImage(event, 'preview2')"><br><br>
            
            <label for="image3">Ảnh 3:</label>
            <img id="preview3" src="{{ asset($intro->image3) }}" alt="Ảnh 3" style="display: {{ $intro->image3 ? 'block' : 'none' }};">
            <input type="file" name="image3" id="image3" onchange="previewImage(event, 'preview3')"><br><br>
            
            <label for="image4">Ảnh 4:</label>
            <img id="preview4" src="{{ asset($intro->image4) }}" alt="Ảnh 4" style="display: {{ $intro->image4 ? 'block' : 'none' }};">
            <input type="file" name="image4" id="image4" onchange="previewImage(event, 'preview4')"><br><br>
            
            <label for="image5">Ảnh 5:</label>
            <img id="preview5" src="{{ asset($intro->image5) }}" alt="Ảnh 5" style="display: {{ $intro->image5 ? 'block' : 'none' }};">
            <input type="file" name="image5" id="image5" onchange="previewImage(event, 'preview5')"><br><br>
            
            <button type="submit">Lưu</button>
            <button type="button" onclick="closeModal()">Đóng</button>
        </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function editIntro(introId) {
        var url = '/ad-intro-edit/' + introId; // Tạo URL từ ID

        $('#editContent').load(url, function(response, status, xhr) {
            if (status === "error") {
                var msg = "Lỗi: " + xhr.status + " " + xhr.statusText;
                $('#editContent').html(msg); // Hiển thị thông báo lỗi
            } else {
                // Cập nhật URL
                history.pushState(null, '', url);
            }
        });

        // Ẩn hàng tương ứng trong bảng (tuỳ chọn)
        $('#row-' + introId).hide();
    }

    function cancelEdit(introId) {
        $('#row-' + introId).show(); // Hiển thị lại hàng
        $('#editContent').empty(); // Xóa nội dung chỉnh sửa

        // Quay lại URL trước đó
        history.back();
    }
</script>
<script>
        // function openModal() {
        //     document.getElementById('myModal').style.display = 'flex'; // Sử dụng flex để căn giữa
        // }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.getElementById(previewId);
                img.src = e.target.result; // Cập nhật nguồn ảnh
                img.style.display = 'block'; // Hiển thị ảnh
            }

            if (file) {
                reader.readAsDataURL(file); // Đọc dữ liệu ảnh
            }
        }
    </script>