<head>
<link rel="stylesheet" href="/source/css/admin.css" type="text/css">

</head>       
       <div class="header-container" style="display: flex; align-items: center; justify-content: space-between; ">
            <h2 style="padding-bottom: 10px; white-space: nowrap;">Quản lý tài khoản admin</h2>
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
            <th>Vai trò</th>
            <!-- <th>Xem</th> -->
            <th>Chấp nhận</th>
            <th>Từ chối</th>
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($accounts as $key => $account)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $account->fullname }}</td>
                    <td>{{ $account->phone }}</td>
                    <td>{{ $account->email }}</td>
                    <td>{{ $account->role}}</td> 
                    <td><a href="">chấp nhận</a></td> 
                    <td>
                            <button type="submit">từ chối</button>
                        
                    </td>
                    <td><a href="">xoá</a></td> 

                </tr>
            @endforeach
    </tbody>
</table>
    