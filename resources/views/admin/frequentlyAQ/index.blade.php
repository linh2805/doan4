<div class="header-container" style="display: flex; align-items: center; justify-content: space-between; ">
    <h2 style="padding-bottom: 10px; white-space: nowrap;">Câu hỏi thường gặp</h2>
    <div class="input-group" style="position: relative; width: 30%;">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Tải nội dung ad-news vào div #content
        $('#registerLink6').click(function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-frequentlyAQ'); // Tải nội dung từ /ad-news vào div content
        });

        // Tìm kiếm
        $('#search-form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('ad-frequentlyAQ.search') }}", // Đường dẫn tới route tìm kiếm
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
<button id="addButton" type="button">Thêm</button>
<table class="table table-bordered table-hover mt-3">
    <thead class="table-dark">
        <tr>
            <th>STT</th>
            <th>Câu hỏi</th>
            <th>Câu trả lời</th>
            <th>Sửa</th>
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach($faqs as $index => $faq)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $faq->question }}</td>
                <td>{{ $faq->answer }}</td>
                <td>
                    <button onclick="editAQ({{ $faq->id }})">Sửa</button>
                </td>
                <td>
                    <form action="{{ route('FrequentlyAQ.destroy', $faq->id) }}" method="POST"
                        onsubmit="return confirm('Bạn có chắc chắn muốn xoá?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="CreateContent"></div>
<div id="EditAQ"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('addButton').addEventListener('click', function () {
        fetch('/ad-frequentlyAQ-create') // Đường dẫn tới route
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                document.getElementById('CreateContent').innerHTML = data; // Chèn nội dung vào div
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<script>
    function editAQ(AQId) {
        var url = '/ad-frequentlyAQ-edit/' + AQId; // Tạo URL từ ID

        $('#EditAQ').load(url, function (response, status, xhr) {
            if (status === "error") {
                var msg = "Lỗi: " + xhr.status + " " + xhr.statusText;
                $('#EditAQ').html(msg); // Hiển thị thông báo lỗi
            } else {
                // Cập nhật URL
                history.pushState(null, '', url);
            }
        });

        // Ẩn hàng tương ứng trong bảng (tuỳ chọn)
        $('#row-' + AQId).hide();
    }

    function cancelEdit(AQId) {
        $('#row-' + AQId).show(); // Hiển thị lại hàng
        $('#EditAQ').empty(); // Xóa nội dung chỉnh sửa

        // Quay lại URL trước đó
        history.back();
    }
</script>