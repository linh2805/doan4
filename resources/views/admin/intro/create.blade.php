<form id="createForm" method="POST" enctype="multipart/form-data" action="{{ route('intros.store') }}">
    @csrf
    <label for="intro_school">Giới thiệu về trường:</label>
    <input type="text" name="intro_school" placeholder="Giới thiệu về trường" required><br><br>

    <label for="job">Cơ hội việc làm:</label>
    <input type="text" name="job" placeholder="Cơ hội việc làm" required><br><br>

    <label for="image1">Ảnh giới thiệu:</label>
    <img id="preview1" style="display:none; width: 200px; height: auto;" alt="Ảnh xem trước">
    <input type="file" name="image1" id="image1" accept="image/*" required
        onchange="previewImage(event, 'preview1')"><br><br>

    <label for="image2">Ảnh việc làm 1:</label>
    <img id="preview2" style="display:none; width: 200px; height: auto;" alt="Ảnh xem trước">
    <input type="file" name="image2" id="image2" accept="image/*" required
        onchange="previewImage(event, 'preview2')"><br><br>

    <label for="image3">Ảnh việc làm 2:</label>
    <img id="preview3" style="display:none; width: 200px; height: auto;" alt="Ảnh xem trước">
    <input type="file" name="image3" id="image3" accept="image/*" required
        onchange="previewImage(event, 'preview3')"><br><br>

    <label for="image4">Ảnh việc làm 3:</label>
    <img id="preview4" style="display:none; width: 200px; height: auto;" alt="Ảnh xem trước">
    <input type="file" name="image4" id="image4" accept="image/*" required
        onchange="previewImage(event, 'preview4')"><br><br>

    <label for="image5">Ảnh việc làm 4:</label>
    <img id="preview5" style="display:none; width: 200px; height: auto;" alt="Ảnh xem trước">
    <input type="file" name="image5" id="image5" accept="image/*" required
        onchange="previewImage(event, 'preview5')"><br><br>

    <button type="submit">Lưu</button>
</form>