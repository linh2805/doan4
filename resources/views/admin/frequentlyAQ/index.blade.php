<div class="header-container" style="display: flex; align-items: center; justify-content: space-between; ">
    <h2 style="padding-bottom: 10px; white-space: nowrap;">Câu hỏi thường gặp</h2>
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