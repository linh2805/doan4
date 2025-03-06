@if($scholarships->isEmpty())
    <tr>
        <td colspan="6" class="text-center">Không tìm thấy tin tức nào.</td>
    </tr>
@else
    @foreach($scholarships as $index => $scholarship)
    <tr>
                    <td>{{ $scholarship->title }}</td>
                    <td>{{ $scholarship->description }}</td>
                    <td>{{ $scholarship->criteria }}</td>
                    <td>
                        <button onclick="editHB({{ $scholarship->id }})">Sửa</button>
                        <form action="{{ route('ad-hb.delete', $scholarship->id) }}" method="POST" style="display:inline;"
                            class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger delete-btn"
                                data-id="{{ $scholarship->id }}">Xóa</button>
                        </form>
                    </td>
                </tr>
    @endforeach
@endif  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                if (confirm('Are you sure you want to delete this scholarship?')) {
                    this.closest('.delete-form').submit();
                }
            });
        });
    </script>
    <script>
        function editHB(HBId) {
            var url = '/admin/ad-hb/edit/' + HBId; // Tạo URL từ ID

            $('#editFormContainer').load(url, function (response, status, xhr) {
                if (status === "error") {
                    var msg = "Lỗi: " + xhr.status + " " + xhr.statusText;
                    $('#editFormContainer').html(msg); // Hiển thị thông báo lỗi
                } else {
                    // Cập nhật URL
                    history.pushState(null, '', url);
                }
            });

            // Ẩn hàng tương ứng trong bảng (tuỳ chọn)
            $('#row-' + HBId).hide();
        }
    </script>
    <script>
        $(document).ready(function () {
            $("#addFormContainer form").on("submit", function (e) {
                e.preventDefault(); // Prevent page reload

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('ad-hb.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        alert(response.success);

                        let newRow = `
                    <tr>
                        <td>${response.scholarship.title}</td>
                        <td>${response.scholarship.description}</td>
                        <td>${response.scholarship.criteria ?? ''}</td>
                        <td>
                            <a  class="btn btn-warning edit-btn" data-id="${response.scholarship.id}">Sửa</a>
                            <form action="{{ route('ad-hb.delete', '') }}/${response.scholarship.id}" method="POST" style="display:inline;" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger delete-btn" data-id="${response.scholarship.id}">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    `;

                        $("table tbody").append(newRow); // Add new row to the table

                        $("#addFormContainer form")[0].reset(); // Reset form
                        $("#addFormContainer").hide(); // Hide form
                    },
                    error: function () {
                        alert("Lỗi khi thêm học bổng!");
                    }
                });
            });
        });
    </script>