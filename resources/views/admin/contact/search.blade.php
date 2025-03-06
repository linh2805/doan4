@if($contacts->isEmpty())
    <tr>
        <td colspan="6" class="text-center">Không tìm thấy tin tức nào.</td>
    </tr>
@else
    @foreach ($contacts as $index => $contact)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $contact->fullname }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->message }}</td>
            <!-- <td><button class="">Xem</button></td> -->
            <td>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn-danger" type="submit">Xóa</button>
                </form>
            </td>
        </tr>
    @endforeach
@endif  