<!-- resources/views/admin/frequentlyAQ/edit.blade.php -->
<form id="editForm" method="POST" action="{{ route('FrequentlyAQ.update', $faq->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="question">Câu hỏi:</label>
        <input type="text" id="question" name="question" value="{{ $faq->question }}" required>
    </div>
    <div>
        <label for="answer">Câu trả lời:</label>
        <textarea id="answer" name="answer" required>{{ $faq->answer }}</textarea>
    </div>
    <button type="submit">Cập nhật</button>
</form>