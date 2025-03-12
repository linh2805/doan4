<!-- resources/views/admin/frequentlyAQ/edit.blade.php -->
<form id="editForm" method="POST" action="{{ route('FrequentlyAQ.update', $faq->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="question">Câu hỏi:</label>
        <input style="width: 400px;" type="text" id="question" name="question" value="{{ $faq->question }}" required>
    </div>
    <div>
        <label for="answer">Câu trả lời:</label>
        <textarea style="height: 200px;" id="answer" name="answer" required>{{ $faq->answer }}</textarea>
    </div>
    <button type="submit"  class="btn btn-success">Cập nhật</button>
</form>