@if($news->isEmpty())
    <tr>
        <td colspan="6" class="text-center">Không tìm thấy tin tức nào.</td>
    </tr>
@else
    @foreach($news as $index => $new)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td><a href="#">{{ $new->title }}</a></td>
            <td>
                @if($new->image)
                    <img src="{{ asset('storage/' . $new->image) }}" width="100">
                @else
                    <img src="/source/images/1.jpg" width="100">
                @endif
            </td>
            <td>{{ Str::limit($new->content, 50) }}</td>
            <td>{{ $new->extra_content }}</td>
            <td>
                <button class="btn btn-warning edit-btn" data-id="{{ $new->id }}" data-title="{{ $new->title }}"
                    data-image="{{ asset('storage/' . $new->image) }}"
                    data-content="{{ $new->content }}">Sửa</button>
                <form action="{{ route('ad-news.delete', $new->id) }}" method="POST" style="display:inline;"
                    class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger delete-btn" data-id="{{ $new->id }}">Xóa</button>
                </form>
            </td>
        </tr>
    @endforeach
@endif
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