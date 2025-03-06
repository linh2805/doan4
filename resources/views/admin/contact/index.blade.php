<head>
    <link rel="stylesheet" href="/source/css/admin.css" type="text/css">

</head>
<div class="header-container" style="display: flex; align-items: center; justify-content: space-between; ">
    <h2 style="padding-bottom: 10px; white-space: nowrap;">Quản lý thông thông tin liên hệ</h2>
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
        $('#registerLink1').click(function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định
            $('#content').load('/ad-contact'); // Tải nội dung từ /ad-news vào div content
        });

        // Tìm kiếm
        $('#search-form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('ad-contact.search') }}", // Đường dẫn tới route tìm kiếm
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
<!-- <div id="search-result"></div> -->
<table id="printableTable" class="table table-bordered table-hover mt-3">
    <thead class="table-dark">
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Message</th>
            <!-- <th>Xem</th> -->
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $index => $contact)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $contact->fullname }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <!-- <td><button class="">Xem</button></td> -->
                <td>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-danger" type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<form action="{{ route('contacts.deleteAll') }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button class="btn-danger" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả không?')">Xóa tất
        cả</button>
</form><button onclick="printTable()">In bảng</button>
<script>
    function printTable() {
        var printContents = document.getElementById('printableTable').outerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        window.location.reload(); // Tải lại trang sau khi in
    }
</script>
<style>
    @media print {

        button,
        form {
            display: none;
            /* Ẩn nút và form khi in */
        }
    }
</style>