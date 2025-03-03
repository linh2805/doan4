<!-- <div class="container"> -->
    <h1>Cao đẳng mầm non</h1>

    @if($colleges->isEmpty())
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
                @foreach($colleges as $college)
                    <tr>
                        <td>
                            <img src="{{ asset($college->introductory_photo) }}" alt="Ảnh giới thiệu"
                                style="width: 100px; height: auto;">
                        </td>
                        <td>{{ $college->introduce }}</td>
                        <td>{{ $college->time }}</td>
                        <td>{{ $college->location }}</td>
                        <td>
                            <ul>
                                @foreach($college->curriculum_content as $content)
                                    <li>{{ $content }}</li>
                                @endforeach
                            </ul>
                        </td>
                    
                        <td>
                            
                            <button id="CollegeBtn" onclick="editCollege({{ $college->id }})">Sửa</button>
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
    function editCollege(collegeId) {
        var url = '/ad-college-edit/' + collegeId; // Tạo URL từ ID

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
        $('#row-' + collegeId).hide();
    }
</script>