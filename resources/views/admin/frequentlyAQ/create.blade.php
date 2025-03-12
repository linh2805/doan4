<!-- resources/views/admin/frequentlyAQ/create.blade.php -->
<form id="createForm" method="POST" enctype="multipart/form-data" action="{{ route('FrequentlyAQ.store') }}">
    @csrf
    <div>
        <label for="question">Câu hỏi:</label>
        <input style="width: 400px;" type="text" id="question" name="question" required>
    </div>
    <div>
        <label for="answer">Câu trả lời:</label>
        <textarea style="height: 200px;" id="answer" name="answer" required></textarea>
    </div>
    <button type="submit"  class="btn btn-success">Lưu</button>
</form>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif