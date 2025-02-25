<head>
<link rel="stylesheet" href="/source/css/admin.css" type="text/css">

</head>       
       <div class="header-container" style="display: flex; align-items: center; justify-content: space-between; ">
            <h2 style="padding-bottom: 10px; white-space: nowrap;">Quản lý trang giới thiệu</h2>
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
        <th>Ảnh 1 </th>
            <th>Ảnh 2:                         
            </th>
            <th>Ảnh 3:                         
            </th>
            <th>Ảnh 4:                                 </th>
            <th>Ảnh 5:                                  </th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>

    <tr>
        
    <td style="width: 200px"><img src="{{ asset($intros->image1) }}" alt="Tuyển sinh Cao Đẳng XYZ" class="w-full h-auto object-cover rounded-lg shadow-lg"></td>
    <td style="width: 200px"><img src="{{ asset($intros->image2) }}" alt="Dịch vụ chăm sóc học sinh 1" class="img-fluid rounded-circle"></td>
    <td style="width: 200px"><img src="{{ asset($intros->image3) }}" alt="Dịch vụ chăm sóc học sinh 2" class="img-fluid rounded-circle"></td>
    <td style="width: 200px"><img src="{{ asset($intros->image4) }}" alt="Dịch vụ chăm sóc học sinh 3" class="img-fluid rounded-circle"></td>
    <td style="width: 200px"><img src="{{ asset($intros->image5) }}" alt="Dịch vụ chăm sóc học sinh 4" class="img-fluid rounded-circle"></td>

        
</tr>

            </tr>
    </tbody>
</table>
    