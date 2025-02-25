<form action="{{ route('intros.update', $intro->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Để chỉ định phương thức PUT cho update -->
    <div>
        <label for="title">Tiêu đề</label>
        <input type="text" name="title" value="{{ old('title', $intro->title) }}" required>
    </div>
    <div>
        <label for="description">Mô tả</label>
        <textarea name="description" required>{{ old('description', $intro->description) }}</textarea>
    </div>
    <div>
        <label for="image">Chọn ảnh mới (nếu có)</label>
        <input type="file" name="image" accept="image/*">
    </div>
    <button type="submit">Cập nhật Intro</button>
</form>