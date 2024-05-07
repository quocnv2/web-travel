<header class="main-header main-header--five sticky-header sticky-header--normal sticky-header--five">
    <div class="container">
        <div class="main-header__inner">
            <div class="main-header__logo">
                <a href="">
                    <img src="{{ url('assets') }}/trevlo/images/logo-light-2.png" alt="Trevlo HTML"
                         width="187" class="main-header__logo__1">
                    <img src="{{ url('assets') }}/trevlo/images/logo-light-4.png" alt="Trevlo HTML"
                         width="187" class="main-header__logo__2">
                </a>
            </div><!-- /.main-header__logo -->
            <div class="main-header__right">
                <nav class="main-header__nav main-menu">
                    <ul class="main-menu__list">
                        <li>
                            <a href="{{route('home')}}">Trang chủ</a>
                        </li>
                        <li class="dropdown">
                            <span>Danh Mục</span>
                            <ul class="sub-menu">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="">{{ $category->name }}</a>
                                        {{--                                                <a href="{{ url('/' . $category->slug) }}">{{ $category->name }}</a>--}}
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('listTour')}}">Tour</a>
                        </li>
                        <li>
                            <a href="{{route('listRoom')}}">Phòng</a>
                        </li>
                        <li>
                            <a href="{{route('listBlog')}}">Bài viết</a>
                        </li>
                        <li>
                            <a href="https://dulichtrasau.vn/">Facebook</a>
                        </li>
                        <li>
                            <a href="https://dulichtrasau.vn/">Youtube</a>
                        </li>
                        <li>
                            <a href="https://dulichtrasau.vn/">Liên hệ</a>
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
                <a href=""
                   class="main-header__button trevlo-btn trevlo-btn--two trevlo-btn--base">
                    <span>Đăng Ký Tư Vấn</span>
                    <i class="trevlo-one-icon-up-right-arrow"></i>
                </a>
            </div><!-- /.main-header__right -->
        </div><!-- /.main-header__inner -->
    </div><!-- /.container-fluid -->
</header><!-- /.main-header -->
