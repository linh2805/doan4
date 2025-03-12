<!-- <div class="container"> -->
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
                        <div class="cell-content">

                            <img src="{{ asset($connection->introductory_photo) }}" alt="Ảnh giới thiệu"
                                style="width: 100px; height: auto;">
                        </div>
                    </td>
                    <td>
                        <div class="cell-content">
                            {{ $connection->introduce }}
                        </div>
                    </td>
                    <td>
                        <div class="cell-content">
                            {{ $connection->time }}
                        </div>
                    </td>
                    <td>
                        <div class="cell-content">
                            {{ $connection->location }}
                        </div>
                    </td>
                    <td>
                        <div class="cell-content">

                            <ul>
                                @foreach($connection->curriculum_content as $content)
                                    <li>{{ $content }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </td>

                    <td>

                        <button id="ConnectionBtn" onclick="editConnection({{ $connection->id }})"
                            class="btn btn-warning edit-btn">Sửa</button>
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