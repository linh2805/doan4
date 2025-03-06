@if($comments->isEmpty())
    <tr>
        <td colspan="6" class="text-center">Không tìm thấy tin tức nào.</td>
    </tr>
@else
    @foreach ($comments as $index => $comment)
        <tr>
            <td>{{ $index + 1 }}</td> <!-- Số thứ tự -->
            <td>{{ $comment->name }}</td> <!-- Tên người dùng -->
            <td>{{ $comment->comment }}</td> <!-- Bình luận -->
            <!-- <td>{{ $comment->created_at }}</td>  -->
            <td>{{ \Carbon\Carbon::parse($comment->created_at)->format('Y-m-d') }}</td>

            <td>
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Xoá</button>
                </form>
            </td>
        </tr>
    @endforeach
@endif  