@extends('user.index')
@section('name')
@include('user.home.header')

<head>
    <link rel="stylesheet" href="./css/intro.css" type="text/css">
    <link rel="stylesheet" href="./css/text.css" type="text/css">
    <style>
    .info-card img {
        border: 2px solid #ffb885;
        /* Đặt viền đậm hơn */
        border-radius: 8px;
        /* overflow: hidden; */

        margin: 10px;
        transition: transform 0.2s;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Thêm bóng */
    }

    .info-card p {
        color: #f08233;
        padding: 0 10px 10px;
    }

    .info-card h5 {
        color: #ac4c07;
        margin: 10px 0;
    }

    .info-card {
        text-align: center;
    }

    .info-card img:hover {
        transform: scale(1.05);
    }

    .info-card img {
        width: 100%;
        height: 200px;
        /* Chiều cao cố định cho ảnh */
        object-fit: cover;
        /* Đảm bảo ảnh không bị méo */
    }

    .info-card h5:hover,
    .info-card p:hover {
        cursor: pointer;
        transform: scale(1.05);
    }

    .row {
        display: flex;
        justify-content: center;
        /* Căn giữa các div nhỏ */
        flex-wrap: wrap;
        /* Cho phép các div nhỏ xuống hàng khi không đủ chỗ */
    }

    .number-div {
        text-align: center;
        margin-top: 20px;
    }

    .pagination {
        justify-content: center;
    }

    .animated-title {
        color: #f08233;
        font-size: 40px;
        text-align: center;
        animation: pulse 1s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
            /* Phóng to */
        }

        100% {
            transform: scale(1);
            /* Trở lại kích thước ban đầu */
        }
    }
    </style>
</head>

<body>
    <div class="container mt-5" style="padding-top:100px;">
        <h2 class="text-center animated-title" >Thông báo của ngành</h2>
        <div class="row" id="infoContainer">
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.png" alt="Thông tin 2">
                    <h5>Lịch Nghỉ Tết 2024</h5>
                    <p>Lịch nghỉ Tết Dương lịch năm 2024 sẽ được thông báo đến Hà Nội.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.png" alt="Thông tin 3">
                    <h5>Thông Báo</h5>
                    <p>Thông báo xét duyệt ngân sách năm học 2024-2025.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.png" alt="Thông tin 4">
                    <h5>Văn Bản Chỉ Đạo</h5>
                    <p>Văn bản chỉ đạo về công tác phòng chống dịch bệnh cho năm học 2023-2024.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>

        </div>
        <div class="number-div" id="numberDiv"></div>
        <nav aria-label="Page navigation" style="display: flex; justify-content: center; align-items: center;">
            <ul class="pagination" id="pagination"></ul>
        </nav>

        <h2 class="text-center animated-title" >Thông báo của trường</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.png" alt="Thông tin 2">
                    <h5>Lịch Nghỉ Tết 2024</h5>
                    <p>Lịch nghỉ Tết Dương lịch năm 2024 sẽ được thông báo đến Hà Nội.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.png" alt="Thông tin 3">
                    <h5>Thông Báo</h5>
                    <p>Thông báo xét duyệt ngân sách năm học 2024-2025.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.png" alt="Thông tin 4">
                    <h5>Văn Bản Chỉ Đạo</h5>
                    <p>Văn bản chỉ đạo về công tác phòng chống dịch bệnh cho năm học 2023-2024.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card">
                    <img src="/source/images/1.jfif" alt="Thông tin 1">
                    <h5>Lịch Làm Việc</h5>
                    <p>Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).</p>
                </div>
            </div>

        </div>
        <div class="number-div" id="numberDiv"></div>
        <nav aria-label="Page navigation">
            <ul class="pagination" id="pagination"></ul>
        </nav>
    </div>
</body>
<script>
const infoContainer = document.getElementById('infoContainer');
const numberDiv = document.getElementById('numberDiv');
const pagination = document.getElementById('pagination');

const items = [{
        img: '/source/images/1.jfif',
        title: 'Lịch Làm Việc',
        description: 'Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).'
    },
    {
        img: '/source/images/1.png',
        title: 'Lịch Nghỉ Tết 2024',
        description: 'Lịch nghỉ Tết Dương lịch năm 2024 sẽ được thông báo đến Hà Nội.'
    },
    {
        img: '/source/images/1.png',
        title: 'Thông Báo',
        description: 'Thông báo xét duyệt ngân sách năm học 2024-2025.'
    },
    {
        img: '/source/images/1.png',
        title: 'Văn Bản Chỉ Đạo',
        description: 'Văn bản chỉ đạo về công tác phòng chống dịch bệnh cho năm học 2023-2024.'
    },
    {
        img: '/source/images/1.jfif',
        title: 'Lịch Làm Việc',
        description: 'Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).'
    },
    {
        img: '/source/images/1.jfif',
        title: 'Lịch Làm Việc',
        description: 'Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).'
    },
    {
        img: '/source/images/1.jfif',
        title: 'Lịch Làm Việc',
        description: 'Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).'
    },
    {
        img: '/source/images/1.jfif',
        title: 'Lịch Làm Việc',
        description: 'Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).'
    },
    {
        img: '/source/images/1.jfif',
        title: 'Lịch Làm Việc',
        description: 'Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).'
    },
    {
        img: '/source/images/1.jfif',
        title: 'Lịch Làm Việc',
        description: 'Lịch làm việc của Sở GD&ĐT Hà Nội (Tuần thứ 3).'
    },
];

const itemsPerPage = 8;
const pageCount = Math.ceil(items.length / itemsPerPage);

function renderItems(page) {
    infoContainer.innerHTML = '';
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedItems = items.slice(start, end);

    paginatedItems.forEach(item => {
        const col = document.createElement('div');
        col.className = 'col-md-3';
        col.innerHTML = `
                <div class="info-card">
                    <img src="${item.img}" alt="${item.title}">
                    <h5>${item.title}</h5>
                    <p>${item.description}</p>
                </div>
            `;
        infoContainer.appendChild(col);
    });
}

function renderPagination() {
    pagination.innerHTML = '';
    for (let i = 1; i <= pageCount; i++) {
        const li = document.createElement('li');
        li.className = 'page-item';
        li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        li.onclick = (e) => {
            e.preventDefault();
            renderItems(i);
        };
        pagination.appendChild(li);
    }
}

// Render initial items and pagination
renderItems(1);
renderPagination();
</script>

@include('user.home.footer')
