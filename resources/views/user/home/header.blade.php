<!-- <header> -->
<div id="header">
    <div class="header__nav">
        <div class="main-header container">
            <div class="col-md-3 col-sm-3 header-logo">
                <a href="{{ url('/user') }}" class="logo" title="">
                    <img src="/source/images/logo.webp" alt="DV15">
                </a>
            </div>
            <div id="right-header" class="col-md-9 col-sm-9">
                <div class="fl-nav-menu">
                    <nav>
                        <div class="mm-toggle-wrap">
                            <div class="mm-toggle">
                                <i class="fa fa-bars"></i>
                                <!-- <span class="mm-label">Menu</span>  -->
                            </div>
                        </div>
                        <div class="nav-inner" style=" justify-content: space-between; align-items: center;">
                            <ul id="nav" class="hidden-xs" style=" list-style: none; padding: 0; margin: 0;">
                                <li id="menu-item-84" class="menu-item">
                                    <a href="{{ url('/intro') }}" class="scroll-link">Giới thiệu</a>
                                </li>
                                <li id="menu-item-84" class="menu-item">
                                    <a href="{{ url('/intermediate') }}" class="scroll-link">Chương trình đào tạo</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/college') }}">Cao đẳng mầm non</a></li>
                                        <li><a href="{{ url('/intermediate') }}">Trung cấp mầm non</a></li>
                                        <li><a href="{{ url('/connection') }}">Liên thông cao đẳng</a></li>
                                        <li><a href="{{ url('/university') }}">Liên thông đại học</a></li>
                                    </ul>
                                </li>

                                <li id="menu-item-84" class="menu-item">
                                    <a href="{{ url('/scholarship') }}" class="scroll-link">Học bổng</a>
                                </li>
                                <li id="menu-item-84" class="menu-item">
                                    <a href="{{ url('/news') }}" class="scroll-link">Tin tức</a>
                                </li>
                                <div class="search-bar">
                                    <i class="fa fa-search" id="searchIcon"
                                        style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #666; cursor: pointer;"></i>

                                    <input type="text" id="searchInput" placeholder="Nhập từ khóa..."
                                        style="border-radius: 20px; padding: 8px 16px 8px 40px; border: 1px solid #ccc;">
                                    <div id="suggestionBox" class="suggestion-box"></div>
                                </div>

                                <!-- <div class="header-button" style="margin-left: 250px;">
                                    <a href="#contact" class="button primary is-large" style="border-radius:5px">
                                        <span>Đăng kí</span>
                                    </a>
                                </div> -->
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let searchInput = document.getElementById("searchInput");
        let searchIcon = document.getElementById("searchIcon");
        let suggestionBox = document.getElementById("suggestionBox");
        let currentIndex = -1; // Chỉ số gợi ý hiện tại

        // Ẩn hộp gợi ý khi tải trang mới
        suggestionBox.style.display = "none";

        function performSearch() {
            let keyword = searchInput.value.trim().toLowerCase();
            localStorage.setItem("searchKeyword", keyword); // Lưu từ khóa vào localStorage

            suggestionBox.innerHTML = "";
            if (keyword === "") {
                suggestionBox.style.display = "none";
                return;
            }

            let elements = document.querySelectorAll("h1, h2, h3, h4, h5, h6, p, span, ul, li, section, form");
            let suggestions = [];

            elements.forEach(el => {
                let text = el.textContent.trim().toLowerCase();
                if (text.includes(keyword)) {
                    suggestions.push({
                        text: el.textContent.substring(0, 50) + "...",
                        element: el
                    });
                }
            });

            if (suggestions.length > 0) {
                suggestions.forEach((item, index) => {
                    let suggestionItem = document.createElement("div");
                    suggestionItem.classList.add("suggestion-item");
                    suggestionItem.innerHTML = `<span>${item.text}</span>`;

                    suggestionItem.addEventListener("click", function () {
                        item.element.scrollIntoView({
                            behavior: "smooth",
                            block: "center"
                        });
                        setTimeout(() => {
                            item.element.style.backgroundColor = "transparent";
                        }, 2000);

                        searchInput.value = ""; // Xóa nội dung tìm kiếm
                        suggestionBox.innerHTML = ""; // Xóa các gợi ý
                        suggestionBox.style.display = "none"; // Ẩn hộp gợi ý
                    });


                    suggestionItem.dataset.index = index; // Lưu chỉ số
                    suggestionBox.appendChild(suggestionItem);
                });

                suggestionBox.style.display = "block"; // Hiện hộp gợi ý
                currentIndex = -1; // Reset chỉ số
            } else {
                suggestionBox.style.display = "none"; // Ẩn hộp gợi ý nếu không có gợi ý
            }
        }

        searchInput.addEventListener("input", performSearch);
        searchIcon.addEventListener("click", performSearch);

        // Điều khiển gợi ý bằng phím mũi tên
        searchInput.addEventListener("keydown", function (e) {
            let items = document.querySelectorAll(".suggestion-item");
            if (e.key === "ArrowDown") {
                currentIndex = (currentIndex + 1) % items.length; // Tăng chỉ số
                highlightSuggestion(items);
            } else if (e.key === "ArrowUp") {
                currentIndex = (currentIndex - 1 + items.length) % items.length; // Giảm chỉ số
                highlightSuggestion(items);
            } else if (e.key === "Enter") {
                if (currentIndex >= 0 && currentIndex < items.length) {
                    items[currentIndex].click(); // Nhấn Enter để chọn gợi ý
                }
            }
        });

        function highlightSuggestion(items) {
            items.forEach((item, index) => {
                item.classList.remove("highlighted"); // Xóa lớp nổi bật
                if (index === currentIndex) {
                    item.classList.add("highlighted"); // Thêm lớp nổi bật cho gợi ý hiện tại
                }
            });
        }

        document.addEventListener("click", function (e) {
            if (!searchInput.contains(e.target) && !suggestionBox.contains(e.target) && !searchIcon
                .contains(e.target)) {
                suggestionBox.style.display = "none"; // Ẩn hộp gợi ý khi nhấp ra ngoài
            }
        });
    });
</script>
<style>
    .suggestion-box {
        position: absolute;
        top: 100%;
        left: 0;
        width: 300px;
        background: white;
        border: 1px solid #ccc;
        max-height: 200px;
        overflow-y: auto;
        display: none;
        border-radius: 8px;
        /* Bo tròn mỗi item */
    }

    .search-bar:hover #clearSearch {
        display: block;
    }

    .suggestion-item {
        padding: 8px;
        cursor: pointer;
        border-bottom: 1px solid #ddd;
    }
</style>
<!-- </header> -->