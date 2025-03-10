<head>
    <link rel="stylesheet" href="/source/css/admin.css" type="text/css">

</head>
<div class="header-container" style="display: flex; align-items: center; justify-content: space-between;height:80px;background-color:rgb(236, 172, 52); border-radius:20px;">
        <h2 style="padding-bottom: 10px; white-space: nowrap; padding-left: 10px;font-weight: bold;font-size: 34px;color: white;">Quản lý thông tin đăng ký</h2>
        <div class="input-group" style="position: relative; width: 30%; display:flex;">
            <form id="search-form" method="GET" style="display: flex; align-items: center; margin: 20px; padding-top: 20px;">
                <input type="text" name="query" id="search-content" class="search-input" placeholder="Tìm kiếm nội dung"
                    style=" border-radius: 27px;width: 100%;padding: 10px 20px;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);border: 1px solid #ccc;transition: border-color 0.3s;">
                    <button type="submit" style="background-color: #40d946;color: white;border: none;border-radius: 27px;padding: 10px 20px;margin-left: 10px;cursor: pointer;  transition: background-color 0.3s;">Search</button>
            </form>
           
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
            <th>Trường THPT đã học</th>
            <th>Nơi sinh sống</th>
            <th>Ngành học đăng ký</th>
            <th>Xem</th>
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($registrations as $index => $registration)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $registration->full_name }}</td>
            <td>{{ $registration->phone_number }}</td>
            <td>{{ $registration->email }}</td>
            <td>{{ $registration->school }}</td>
            <td>{{ $registration->residence }}</td>
            <td>{{ $registration->major }}</td>
            <td><button class="">Xem</button></td>
            <td><button class="" class="btn btn-warning delete-btn">Xoá</button></td>
        </tr>
        @endforeach
    </tbody>
</table>