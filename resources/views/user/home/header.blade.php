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
                                <li id="menu-item-80" class="menu-item">
                                <a href="{{ url('/intro') }}" >Giới thiệu</a>
                                </li>
                                <li id="menu-item-84" class="menu-item">
                                    <a href="#training-program" class="scroll-link">Chương trình đào tạo</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/college') }}">Cao đẳng mầm non</a></li>
                                        <li><a href="{{ url('/intermediate') }}">Trung cấp mầm non</a></li>
                                        <li><a href="{{ url('/connection') }}">Liên thông cao đẳng</a></li>
                                        <li><a href="{{ url('/university') }}">Liên thông đại học</a></li>
                                    </ul>
                                </li>

                                <li id="menu-item-86" class="menu-item">
                                    <a href="{{ url('/scholarship') }}" >Học bổng</a>
                                </li>
                                <li id="menu-item-87" class="menu-item">
                                    <a href="{{ url('/news') }}" >Tin tức</a>
                                </li>
                                <div class="search-bar" >
                                    <input type="text" placeholder="Tìm kiếm"
                                        style="border-radius: 20px; padding: 8px 16px 8px 40px; border: 1px solid #ccc;">
                                    <i class="fa fa-search"
                                        style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #666;"></i>
                                </div>
                                <div class="header-button" style="margin-left: 250px;">
                                    <a href="{{ url('/register') }}" class="button primary is-large" style="border-radius:5px">
                                        <span>Đăng kí</span>
                                    </a>
                                </div>
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </header> -->
