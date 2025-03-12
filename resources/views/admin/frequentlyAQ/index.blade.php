<style>
    table {
        width: 100%;
        /* Use full width */
        border-collapse: collapse;
        /* Optional for better styling */
        table-layout: fixed;
        /* Ensure equal distribution of widths */
    }

    th,
    td {
        text-align: center;
        /* Center text in header and cells */
        vertical-align: top;
        /* Align content to the top */
    }

    .cell-content {
        max-height: 300px;
        /* Set desired height */
        overflow-y: auto;
        /* Enable vertical scrolling */
        scrollbar-width: none;
        vertical-align: top;
        /* Align content to the top */
    }
</style>
<div class="header-container"
    style="display: flex; align-items: center; justify-content: space-between;height:80px;background-color:rgb(236, 172, 52); border-radius:20px;">
    <h2
        style="padding-bottom: 10px; white-space: nowrap; padding-left: 10px;font-weight: bold;font-size: 34px;color: white;">
        Quản lý các câu hỏi</h2>
    <div class="input-group" style="position: relative; width: 30%; display:flex;">
        <form id="search-form" method="GET"
            style="display: flex; align-items: center; margin: 20px; padding-top: 20px;">
            <input type="text" name="query" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung"
                style=" border-radius: 27px;width: 100%;padding: 10px 20px;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);border: 1px solid #ccc;transition: border-color 0.3s;">
            <button type="submit"
                style="background-color: #40d946;color: white;border: none;border-radius: 27px;padding: 10px 20px;margin-left: 10px;cursor: pointer;  transition: background-color 0.3s;">Search</button>
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
<button id="addButton" type="button" class="btn btn-primary mt-3">Thêm</button>
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
                <td>
                    <div class="cell-content">
                        {{ $faq->question }}
                    </div>
                </td>
                <td>
                    <div class="cell-content">
                        {{ $faq->answer }}
                    </div>
                </td>
                <td>
                    <button onclick="editAQ({{ $faq->id }})" class="btn btn-warning edit-btn">Sửa</button>
                </td>
                <td>
                    <form action="{{ route('FrequentlyAQ.destroy', $faq->id) }}" method="POST"
                        onsubmit="return confirm('Bạn có chắc chắn muốn xoá?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">Xoá</button>
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