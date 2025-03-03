<!-- <div class="container"> -->
<h1>Liên thông cao đẳng mầm non</h1>

@if($connections->isEmpty())
    <p>Chưa có trường nào được thêm.</p>
@else
    <table class="table table-bordered table-hover mt-3">
        <thead class="table-dark">
            <tr>
                <th>Ảnh giới thiệu</th>
                <th>Giới thiệu</th>
                <th>Thời gian</th>
                <th>Địa điểm</th>
                <th>Nội dung chương trình</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($connections as $connection)
                <tr>
                    <td>
                        <img src="{{ asset($connection->introductory_photo) }}" alt="Ảnh giới thiệu"
                            style="width: 100px; height: auto;">
                    </td>
                    <td>{{ $connection->introduce }}</td>
                    <td>{{ $connection->time }}</td>
                    <td>{{ $connection->location }}</td>
                    <td>
                        <ul>
                            @foreach($connection->curriculum_content as $content)
                                <li>{{ $content }}</li>
                            @endforeach
                        </ul>
                    </td>
                
                    <td>
                        
                        <button id="ConnectionBtn" onclick="editConnection({{ $connection->id }})">Sửa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
<!-- </div> -->
<div id="editContent"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function editConnection(connectionId) {
    var url = '/ad-connection-edit/' + connectionId; // Tạo URL từ ID

    $('#editContent').load(url, function (response, status, xhr) {
        if (status === "error") {
            var msg = "Lỗi: " + xhr.status + " " + xhr.statusText;
            $('#editContent').html(msg); // Hiển thị thông báo lỗi
        } else {
            // Cập nhật URL
            history.pushState(null, '', url);
        }
    });

    // Ẩn hàng tương ứng trong bảng
    $('#row-' + connectionId).hide();
}
</script>