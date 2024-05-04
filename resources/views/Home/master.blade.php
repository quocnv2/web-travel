<!DOCTYPE html>
<html lang="en">

<head>
    <title>Du Lịch Trả Sau</title>
    @include('Home.Layout.Head.meta_header')
    @include('Home.Layout.Head.icon_header')
    @include('Home.Layout.Head.font_head')
    @include('Home.Layout.Head.css_header')
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image" style="background-image: url({{ url('assets') }}/trevlo/images/loader-3.png);">
        </div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        @include('Home.Layout.Body.header')
        <!-- /.main-header -->

        <!-- Page -->
        @yield('view')
        <!-- /Pager-->

        @include('Home.Layout.Fooder.footer')
        <!-- /.footer-three -->

    </div><!-- /.page-wrapper -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="" aria-label="logo image"><img src="{{ url('assets') }}/trevlo/images/logo-light-2.png"
                        width="187" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    {{-- <a href="mailto:needhelp@trevlo.com">needhelp@trevlo.com</a> --}}
                    <a href="mailto:Vadustra@gmail.com">Vadustra@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    {{-- <a href="tel:(303)5550105">(303) 555-0105</a> --}}
                    <a href="">Phone/Zalo 0888.92.00.92</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
                <a href="https://facebook.com/">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://pinterest.com/">
                    <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                    <span class="sr-only">Pinterest</span>
                </a>
            </div><!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="search-popup__btn trevlo-btn trevlo-btn--base">
                    <span class="icon-search"></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">Đầu Trang</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>

    @include('Home.Layout.Fooder.JS.js_header')
</body>

</html>
