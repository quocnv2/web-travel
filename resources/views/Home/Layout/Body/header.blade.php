<header class="main-header main-header--five sticky-header sticky-header--normal sticky-header--five">
    <div class="container">
        <div class="main-header__inner">
            <div class="main-header__logo">
                <a href="{{ route('home') }}">
                    <img src="{{ url('assets') }}/trevlo/images/logo-light-2.png" alt="Trevlo HTML" width="187"
                        class="main-header__logo__1">
                    <img src="{{ url('assets') }}/trevlo/images/logo-light-4.png" alt="Trevlo HTML" width="187"
                        class="main-header__logo__2">
                </a>
            </div><!-- /.main-header__logo -->
            <div class="main-header__right">
                <nav class="main-header__nav main-menu">
                    <ul class="main-menu__list">
                        <li>
                            <a href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li class="dropdown">
                            <a>Danh Mục</a>
                            <ul class="sub-menu">
                                @foreach ($categories as $category)
                                    <li>
                                        <a
                                            href="{{ route('listTour_Category', $category->slug) }}">{{ $category->name }}</a>
                                        {{--                                                <a href="{{ url('/' . $category->slug) }}">{{ $category->name }}</a> --}}
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('listTour') }}">Tour</a>
                        </li>
                        <li>
                            <a href="{{ route('listRoom') }}">Phòng</a>
                        </li>
                        <li>
                            <a href="{{ route('listBlog') }}">Bài viết</a>
                        </li>
                        <li>
                            <a href="{{ route('list_blog_recruitment') }}">Tuyển dụng</a>
                        </li>
                        <li class="dropdown">
                            <a>Liên Kết</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100069226627675"
                                        target="black">Facebook</a>
                                </li>
                                <li>
                                    <a href="https://zalo.me/0888920092"
                                        target="black">Zalo</a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100069226627675"
                                        target="black">Youtube</a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100069226627675"
                                        target="black">Tiktok</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('contact_web') }}">Liên hệ</a>
                        </li>
                    </ul>
                </nav><!-- /.main-header__nav -->
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- /.mobile-nav__toggler -->
                <a href="" class="search-toggler main-header__search">
                    <i class="trevlo-one-icon-search" aria-hidden="true"></i>
                    <span class="sr-only">Search</span>
                </a><!-- /.search-toggler -->
                <a href="{{ route('tour_contact') }}"
                    class="main-header__button trevlo-btn trevlo-btn--two trevlo-btn--base">
                    <span>Thiết Kế Tour Riêng</span>
                    <i class="trevlo-one-icon-up-right-arrow"></i>
                </a>
            </div><!-- /.main-header__right -->
        </div><!-- /.main-header__inner -->
    </div><!-- /.container-fluid -->
</header><!-- /.main-header -->
