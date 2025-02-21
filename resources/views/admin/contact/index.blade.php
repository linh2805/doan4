<head>
<link rel="stylesheet" href="/source/css/admin.css" type="text/css">

</head>       
       <div class="header-container" style="display: flex; align-items: center; justify-content: space-between; ">
            <h2 style="padding-bottom: 10px; white-space: nowrap;">Quản lý thông thông tin liên hệ</h2>
            <div class="input-group" style="position: relative; width: 30%;">
    <input type="text" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung"
        oninput="searchContent()" style="
        border-radius: 27px;
        width: 100%;
        padding: 10px 40px; /* Giữ padding phía trái và phải cho đều */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc;
        height: 40px; /* Chiều cao đồng nhất */
        ">
    <!-- <i class="fas fa-search search-icon"
        style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); font-size: 18px;"></i> -->

    </div>
        </div>
        <div id="search-result"></div>
        <table class="table table-bordered table-hover mt-3">
    <thead class="table-dark">
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Message</th>
            <th>Xem</th>
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($contacts as $index => $contact)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $contact->full_name }}</td>
                <td>{{ $contact->phone_number }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <td><button class="">Xem</button></td>
                <td><button class="">Xoá</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
    