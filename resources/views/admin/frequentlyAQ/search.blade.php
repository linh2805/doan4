@if($faqs->isEmpty())
    <tr>
        <td colspan="6" class="text-center">Không tìm thấy tin tức nào.</td>
    </tr>
@else

    @foreach($faqs as $index => $faq)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $faq->question }}</td>
            <td>{{ $faq->answer }}</td>
            <td>
                <button onclick="editAQ({{ $faq->id }})">Sửa</button>
            </td>
            <td>
                <form action="{{ route('FrequentlyAQ.destroy', $faq->id) }}" method="POST"
                    onsubmit="return confirm('Bạn có chắc chắn muốn xoá?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">Xoá</button>
                </form>
            </td>
        </tr>
    @endforeach
@endif  
<script>
    function editAQ(AQId) {
        var url = '/ad-frequentlyAQ-edit/' + AQId; // Create URL from ID

        $('#EditAQ').load(url, function (response, status, xhr) {
            if (status === "error") {
                var msg = "Error: " + xhr.status + " " + xhr.statusText;
                $('#EditAQ').html(msg); // Display error message
            } else {
                // Update URL
                history.pushState(null, '', url);
            }
        });

        // Optionally hide the corresponding row in the table
        $('#row-' + AQId).hide();
    }

    function cancelEdit(AQId) {
        $('#row-' + AQId).show(); // Show the row again
        $('#EditAQ').empty(); // Clear edit content

        // Go back to the previous URL
        history.back();
    }
</script>