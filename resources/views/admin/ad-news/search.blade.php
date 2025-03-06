<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Ảnh</th>
            <th>Nội dung</th>
            <th>Nội dung mở rộng</th>
            <th>Quản lý</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($items) && count($items) > 0)
            @foreach ($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><a href="#">{{ $item->title }}</a></td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" width="100">
                        @else
                            <img src="/source/images/1.jpg" width="100">
                        @endif
                    </td>
                    <td>{{ Str::limit($item->content, 50) }}</td>
                    <td>{{ $item->extra_content }}</td>
                    <td>
                        <button class="btn btn-warning edit-btn" data-id="{{ $item->id }}" data-title="{{ $item->title }}"
                            data-image="{{ asset('storage/' . $item->image) }}"
                            data-content="{{ $item->content }}">Sửa</button>
                        <form action="{{ route('ad-news.delete', $item->id) }}" method="POST" style="display:inline;"
                            class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger delete-btn" data-id="{{ $item->id }}">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center">Không tìm thấy tin tức nào.</td>
            </tr>
        @endif
    </tbody>
</table>
<script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                // Get data from button attributes
                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const image = this.getAttribute('data-image');
                const content = this.getAttribute('data-content');

                // Populate edit form
                document.getElementById('editTitle').value = title;
                document.getElementById('editContent').value = content;
                const editImagePreview = document.getElementById('editImagePreview');

                if (image) {
                    editImagePreview.src = image;
                    editImagePreview.style.display = 'block';
                } else {
                    editImagePreview.style.display = 'none';
                }

                // Update the form action
                const form = document.getElementById('editForm');
                form.action = form.action.replace('placeholder', id);

                // Show the edit form
                document.getElementById('editFormContainer').style.display = 'block';
            });
        });
    </script>
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                if (confirm('Are you sure you want to delete?')) {
                    this.closest('.delete-form').submit();
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const image = this.getAttribute('data-image');
                const content = this.getAttribute('data-content');
                const extraContent = this.getAttribute('data-extra-content'); // Lấy nội dung mở rộng

                document.getElementById('editTitle').value = title;
                document.getElementById('editContent').value = content;
                document.getElementById('editExtraContent').value =
                    extraContent; // Cập nhật nội dung mở rộng

                const editImagePreview = document.getElementById('editImagePreview');
                if (image) {
                    editImagePreview.src = image;
                    editImagePreview.style.display = 'block';
                } else {
                    editImagePreview.style.display = 'none';
                }

                const form = document.getElementById('editForm');
                form.action = form.action.replace('placeholder', id);
                document.getElementById('editFormContainer').style.display = 'block';
            });
        });
    </script>