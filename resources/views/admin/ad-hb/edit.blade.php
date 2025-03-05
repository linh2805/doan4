<!-- resources/views/admin/ad-hb/edit.blade.php -->
<form id="editForm" action="{{ route('ad-hb.update', $scholarship->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="editTitle" class="form-label">Tiêu đề</label>
        <input type="text" class="form-control" id="editTitle" name="title" value="{{ $scholarship->title }}" required>
    </div>

    <div class="mb-3">
        <label for="editDescription" class="form-label">Mô tả</label>
        <textarea class="form-control" id="editDescription" name="description"
            rows="3">{{ $scholarship->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="editCriteria" class="form-label">Tiêu chí</label>
        <textarea class="form-control" id="editCriteria" name="criteria"
            rows="3">{{ $scholarship->criteria }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Cập nhật</button>
</form>