<!DOCTYPE html>
<html lang="en">

<head>
    <title>Du Lịch Trả Sau</title>
    @include('Home.Layout.meta_header')
    @include('Home.Layout.icon_header')
    @include('Home.Layout.font_head')
    @include('Home.Layout.css_header')
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
        <header class="main-header main-header--five sticky-header sticky-header--normal sticky-header--five">
            <div class="container">
                <div class="main-header__inner">
                    <div class="main-header__logo">
                        <a href="index.html">
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
                                    <a href="/">Trang chủ</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Danh Mục</a>
                                    <ul class="sub-menu">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ url('/' . $category->slug) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li>
                                    <a href="/">Tour</a>
                                </li>
                                <li>
                                    <a href="/">Bài viết</a>
                                </li>
                                <li>
                                    <a href="/">Facebook</a>
                                </li>
                                <li>
                                    <a href="/">Youtube</a>
                                </li>
                                <li>
                                    <a href="/">Liên hệ</a>
                                </li>
                            </ul>
                        </nav><!-- /.main-header__nav -->
                        <div class="mobile-nav__btn mobile-nav__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- /.mobile-nav__toggler -->
                        <a href="#" class="search-toggler main-header__search">
                            <i class="trevlo-one-icon-search" aria-hidden="true"></i>
                            <span class="sr-only">Search</span>
                        </a><!-- /.search-toggler -->
                        <a href="tour-listing-side-filter-right.html"
                            class="main-header__button trevlo-btn trevlo-btn--two trevlo-btn--base">
                            <span>Start Booking</span>
                            <i class="trevlo-one-icon-up-right-arrow"></i>
                        </a>
                    </div><!-- /.main-header__right -->
                </div><!-- /.main-header__inner -->
            </div><!-- /.container-fluid -->
        </header><!-- /.main-header -->

        <!-- main-slider-start -->
        <section class="main-slider-five">
            <div class="main-slider-five__carousel trevlo-owl__carousel owl-carousel owl-theme"
                data-owl-options='{
		"items": 1,
		"margin": 0,
		"loop": true,
		"smartSpeed": 700,
		"animateOut": "fadeOut",
		"autoplayTimeout": 5000,
		"nav": true,
		"navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
		"dots": false,
		"autoplay": true
		}'>
                <div class="item">
                    <div class="main-slider-five__image"
                        style="background-image: url({{ url('assets') }}/trevlo/images/backgrounds/slider-5-1.jpg);">
                    </div>
                    <div class="social-links">
                        <a href="https://facebook.com/">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <span class="sr-only">Facebook</span>
                        </a>
                        <a href="https://twitter.com/">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            <span class="sr-only">Twitter</span>
                        </a>
                        <a href="https://instagram.com/">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                        <a href="https://youtube.com/">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                            <span class="sr-only">Youtube</span>
                        </a>

                    </div><!-- /.social-links -->
                    <div class="container">
                        <div class="row gutter-y-50">
                            <div class="col-lg-10 mx-auto">
                                <div class="main-slider-five__content">
                                    <h5 class="main-slider-five__sub-title">your best adventure partner</h5>
                                    <h3 class="main-slider-five__title">Embark on Your Next <br>
                                        Adventure with Us!</h3>
                                    <div class="main-slider-five__button">
                                        <a href="tour-listing-side-filter-right.html"
                                            class="trevlo-btn trevlo-btn--two trevlo-btn--base">
                                            <span>Start Booking</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div><!-- /.main-slider-five__content -->
                            </div><!-- /.col-lg-10 mx-auto -->
                        </div><!-- /.row -->
                    </div>
                    <img src="{{ url('assets') }}/trevlo/images/shapes/slider-cloud-5-1.png" alt="cloud"
                        class="main-slider-five__cloud">
                    <div class="main-slider-five__shape">
                        <img src="{{ url('assets') }}/trevlo/images/shapes/slider-shape-5-2.png" alt="shape"
                            class="main-slider-five__shape__one">
                        <img src="{{ url('assets') }}/trevlo/images/shapes/slider-shape-5-3.png" alt="shape"
                            class="main-slider-five__shape__two">
                    </div><!-- /.main-slider-five__shape -->
                </div><!-- item -->
                <div class="item">
                    <div class="main-slider-five__image"
                        style="background-image: url({{ url('assets') }}/trevlo/images/backgrounds/slider-5-2.jpg);">
                    </div>
                    <div class="social-links">
                        <a href="https://facebook.com/">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <span class="sr-only">Facebook</span>
                        </a>
                        <a href="https://twitter.com/">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            <span class="sr-only">Twitter</span>
                        </a>
                        <a href="https://instagram.com/">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                        <a href="https://youtube.com/">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                            <span class="sr-only">Youtube</span>
                        </a>

                    </div><!-- /.social-links -->
                    <div class="container">
                        <div class="row gutter-y-50">
                            <div class="col-lg-10 mx-auto">
                                <div class="main-slider-five__content">
                                    <h5 class="main-slider-five__sub-title">your best adventure partner</h5>
                                    <h3 class="main-slider-five__title">Experience the World <br> with trevlo Company
                                    </h3>
                                    <div class="main-slider-five__button">
                                        <a href="tour-listing-side-filter-right.html"
                                            class="trevlo-btn trevlo-btn--two trevlo-btn--base">
                                            <span>Start Booking</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div><!-- /.main-slider-five__content -->
                            </div><!-- /.col-lg-10 mx-auto -->
                        </div><!-- /.row -->
                    </div>
                    <img src="{{ url('assets') }}/trevlo/images/shapes/slider-cloud-5-1.png" alt="cloud"
                        class="main-slider-five__cloud">
                    <div class="main-slider-five__shape">
                        <img src="{{ url('assets') }}/trevlo/images/shapes/slider-shape-5-2.png" alt="shape"
                            class="main-slider-five__shape__one">
                        <img src="{{ url('assets') }}/trevlo/images/shapes/slider-shape-5-3.png" alt="shape"
                            class="main-slider-five__shape__two">
                    </div><!-- /.main-slider-five__shape -->
                </div><!-- item -->
                <div class="item">
                    <div class="main-slider-five__image"
                        style="background-image: url({{ url('assets') }}/trevlo/images/backgrounds/slider-5-3.jpg);">
                    </div>
                    <div class="social-links">
                        <a href="https://facebook.com/">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <span class="sr-only">Facebook</span>
                        </a>
                        <a href="https://twitter.com/">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            <span class="sr-only">Twitter</span>
                        </a>
                        <a href="https://instagram.com/">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                        <a href="https://youtube.com/">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                            <span class="sr-only">Youtube</span>
                        </a>

                    </div><!-- /.social-links -->
                    <div class="container">
                        <div class="row gutter-y-50">
                            <div class="col-lg-10 mx-auto">
                                <div class="main-slider-five__content">
                                    <h5 class="main-slider-five__sub-title">your best adventure partner</h5>
                                    <h3 class="main-slider-five__title">Amazing tour places <br> around the world</h3>
                                    <div class="main-slider-five__button">
                                        <a href="tour-listing-side-filter-right.html"
                                            class="trevlo-btn trevlo-btn--two trevlo-btn--base">
                                            <span>Start Booking</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div><!-- /.main-slider-five__content -->
                            </div><!-- /.col-lg-10 mx-auto -->
                        </div><!-- /.row -->
                    </div>
                    <img src="{{ url('assets') }}/trevlo/images/shapes/slider-cloud-5-1.png" alt="cloud"
                        class="main-slider-five__cloud">
                    <div class="main-slider-five__shape">
                        <img src="{{ url('assets') }}/trevlo/images/shapes/slider-shape-5-2.png" alt="shape"
                            class="main-slider-five__shape__one">
                        <img src="{{ url('assets') }}/trevlo/images/shapes/slider-shape-5-3.png" alt="shape"
                            class="main-slider-five__shape__two">
                    </div><!-- /.main-slider-five__shape -->
                </div><!-- item -->
            </div><!-- banner-slider -->
            <div class="banner-form banner-form--two banner-form--three wow fadeInUp" data-wow-delay="300ms">
                <div class="container">
                    <form class="banner-form__wrapper"
                        action="https://bracketweb.com/trevlo-html/tour-listing-top-search.html">
                        <div class="row">
                            <div class="banner-form__col banner-form__col--1">
                                <div class="banner-form__control banner-form__control--location">
                                    <div class="banner-form__icon">
                                        <span class="trevlo-one-icon-location"></span>
                                    </div><!-- /.banner-form__icon -->
                                    <label for="location">Location</label>
                                    <select name="location" class="selectpicker" id="location">
                                        <option value="select">Australia</option>
                                        <option value="spain">Spain</option>
                                        <option value="africa">Africa</option>
                                        <option value="europe">Europe</option>
                                        <option value="thailand">Thailand</option>
                                        <option value="dubai">Dubai</option>
                                        <option value="swizerlan">Swizerlan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="banner-form__col banner-form__col--2">
                                <div class="banner-form__control banner-form__control--type">
                                    <div class="banner-form__icon">
                                        <span class="trevlo-one-icon-bag"></span>
                                    </div><!-- /.banner-form__icon -->
                                    <label for="type">Activities Type</label>
                                    <select name="type" class="selectpicker" id="type">
                                        <option value="select">Adventure</option>
                                        <option value="africa">Beach</option>
                                        <option value="europe">Discovery</option>
                                        <option value="thailand">Mountain</option>
                                        <option value="dubai">Hills</option>
                                        <option value="australia">Couple</option>
                                    </select>
                                </div>
                            </div>
                            <div class="banner-form__col banner-form__col--3">
                                <div class="banner-form__control">
                                    <div class="banner-form__icon">
                                        <span class="trevlo-one-icon-clock"></span>
                                    </div><!-- /.banner-form__icon -->
                                    <label for="date">Activate Day</label>
                                    <input class="trevlo-multi-datepicker" id="date" type="text"
                                        name="date" placeholder="Select Date">
                                    <span class="trevlo-one-icon-chevron-down banner-form__datepicker-icon"></span>
                                </div>
                            </div>
                            <div class="banner-form__col banner-form__col--4">
                                <div class="banner-form__control banner-form__control--traveler">
                                    <div class="banner-form__icon">
                                        <span class="trevlo-one-icon-people"></span>
                                    </div><!-- /.banner-form__icon -->
                                    <label for="guests">Traveler</label>
                                    <button class="banner-form__qty-minus sub">
                                        <i class="trevlo-one-icon-chevron-up"></i>
                                    </button>
                                    <input id="guests" type="number" value="2" name="guests"
                                        placeholder="2">
                                    <button class="banner-form__qty-plus add">
                                        <i class="trevlo-one-icon-chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="banner-form__col banner-form__col--5">
                                <button type="submit" aria-label="search submit"
                                    class="trevlo-btn trevlo-btn--base">
                                    <span>Search</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- banner-form -->
        </section>
        <!-- main-slider-end -->

        <section class="about-six section-space">
            <div class="container">
                <div class="row gutter-y-50">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                        <div class="about-six__image">
                            <div class="about-six__image__one">
                                <img src="{{ url('assets') }}/trevlo/images/about/about-6-1.jpg" alt="about">
                                <div class="about-six__experience">
                                    <div class="about-six__experience__year">20+</div>
                                    <!-- /.about-six__experience__year -->
                                    <div class="about-six__experience__text">years of <br> experience</div>
                                    <!-- /.about-six__experience__text -->
                                </div><!-- /.about-six__experience -->
                            </div><!-- /.about-six__image__one -->
                            <div class="about-six__image__two">
                                <img src="{{ url('assets') }}/trevlo/images/about/about-6-2.jpg" alt="about">
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-btn video-popup">
                                    <i class="fas fa-play"></i>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div><!-- /.about-six__image__two -->
                        </div><!-- /.about-six__image -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="about-six__content">
                            <div class="sec-title sec-title--two text-left">

                                <p class="sec-title__tagline">About Us</p><!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">Experience the World <br> with Our trevio Company</h2>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="about-six__text wow fadeInUp" data-wow-duration="1500ms">It is a long
                                established fact
                                that a reader will be distracted the readable content of a page when looking at layout
                                the
                                point
                                of using lorem the is Ipsum less normal distribution of letters.</p>
                            <!-- /.about-six__text -->
                            <div class="about-six__inner">
                                <div class="about-six__box wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="about-six__box__icon"><span class="trevlo-one-icon-hard-hat"></span>
                                    </div>
                                    <div class="about-six__box__content">
                                        <h3 class="about-six__box__title">Safety first always</h3>
                                        <p class="about-six__box__text">There are many variations of passages of Lorem
                                            Ipsum
                                            available, but the majority have suffere</p>
                                    </div><!-- /.about-six__box__content -->
                                </div><!-- /.about-box -->
                                <div class="about-six__box wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="about-six__box__icon"><span class="trevlo-one-icon-low-price"></span>
                                    </div>
                                    <div class="about-six__box__content">
                                        <h3 class="about-six__box__title">Low price & friendly</h3>
                                        <p class="about-six__box__text">Travel agency Company also impressed us with
                                            their
                                            transpa regarding, Flexible Classes refers</p>
                                    </div><!-- /.about-six__box__content -->
                                </div><!-- /.about-box -->
                            </div><!-- /.about-six__inner -->
                            <div class="about-six__bottom wow fadeInUp" data-wow-duration="1500ms">
                                <a href="about.html" class="trevlo-btn trevlo-btn--two trevlo-btn--base">
                                    <span>more about us</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                                <div class="about-six__phone">
                                    <div class="about-six__phone__icon">
                                        <span class="trevlo-one-icon-telephone"></span>
                                    </div>
                                    <div class="about-six__phone__text">
                                        <p class="about-six__phone__title">Call Us Now</p>
                                        <h4 class="about-six__phone__number"><a
                                                href="tel:+208-555-0112">+208-555-0112</a>
                                        </h4>
                                    </div>
                                </div><!-- /.about-six__phone -->
                            </div><!-- /.about-five__bottom -->
                        </div><!-- /.about-six__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row gutter-y-40 -->
            </div><!-- /.container -->
            <img src="{{ url('assets') }}/trevlo/images/shapes/about-mountain-6-1.png" alt="mountain"
                class="about-six__mountain">
            <img src="{{ url('assets') }}/trevlo/images/shapes/about-parashoot-6-1.png" alt="mountain"
                class="about-six__parashoot">
        </section><!-- /.about-six section-space -->

        <section class="tour-listing-five section-space">
            <div class="container">
                <div class="tour-listing-five__top">
                    <div class="row gutter-y-40 align-items-center">
                        <div class="col-lg-8">
                            <div class="sec-title sec-title--two text-left">

                                <p class="sec-title__tagline">festered tours</p><!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">Amazing tour places around <br> the world</h2>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                        </div><!-- /.col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="tour-listing-five__custom-navs"></div><!-- /.tour-listing-five__custom-navs -->
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row gutter-y-40 -->
                </div><!-- /.tour-listing-five__top -->
                <div class="row g-0">
                    <div class="col-lg-12">
                        <div class="trevlo-stretch-element-inside-column">
                            <div class="tour-listing-five__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav trevlo-owl__carousel--with-shadow owl-theme owl-carousel"
                                data-owl-options='{
                        "items": 3,
                        "margin": 30,
                        "smartSpeed": 700,
                        "loop":true,
                        "autoplay": 6000,
                        "nav":true,
                        "dots":false,
                        "navContainer": ".tour-listing-five__custom-navs",
                        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                        "responsive":{
                            "0":{
                                "items": 1
                            },
                            "576":{
                                "items": 1.4
                            },
                            "768":{
                                "items": 1.9
                            },
                            "992":{
                                "items": 2.4
                            },
                            "1200":{
                                "items": 2.9
                            },
                            "1400":{
                                "items": 3.3
                            },
                            "1600":{
                                "items": 3.9
                            }
                        }
                        }'>
                                @foreach ($tour_list as $valueTour)
                                    <div class="item">
                                        <div class="tour-listing-five__card">
                                            <div class="tour-listing-five__card__bg"
                                                style="background-image: url({{ url('assets') }}/trevlo/images/shapes/tour-shape-bg-5-1.png);">
                                            </div>
                                            <!-- /.tour-listing-five__card__bg -->
                                            <div class="tour-listing-five__card__inner">
                                                <a href="" class="tour-listing-five__card__image">
                                                    <img src="{{ $valueTour->imgBanner }}" alt="tour">
                                                    <div class="tour-listing-five__card__featured">
                                                        {{ $valueTour->objCategory->name }}</div>
                                                    {{--                                                <div class="tour-listing-five__card__overlay"> --}}
                                                    {{--                                                    <span class="tour-listing-five__card__plus"> --}}
                                                    {{--                                                        <i class="icon-plus"></i> --}}
                                                    {{--                                                    </span> --}}
                                                    {{--                                                </div><!-- /.tour-listing-five__card__overlay --> --}}
                                                </a><!-- /.tour-listing-five__card__image -->
                                                <div class="tour-listing-five__card__content">
                                                    <div class="tour-listing-five__card__ratings">
                                                        <div class="trevlo-ratings">
                                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i>
                                                        </div>
                                                        <p class="tour-listing-five__card__ratings__text">4.9 (5)</p>
                                                    </div><!-- /.tour-listing-five__card__ratings -->
                                                    <h3 class="tour-listing-five__card__title">
                                                        <a href="">{{ $valueTour->name }}</a>
                                                    </h3><!-- /.tour-listing-five__card__title -->
                                                    <div class="tour-listing-five__card__location">
                                                        <span class="tour-listing-five__card__location__icon">
                                                            <i class="trevlo-one-icon-maps-and-flags"></i>
                                                        </span><!-- /.tour-listing-five__card__location__icon -->
                                                        @php
                                                            $address = '';
                                                            if (isset($valueTour->province)) {
                                                                $address .= $valueTour->province;
                                                            }
                                                            if (isset($valueTour->district)) {
                                                                if ($address !== '') {
                                                                    $address .= ' - ';
                                                                }
                                                                $address .= $valueTour->district;
                                                            }

                                                            // Kiểm tra và thêm thông tin phường xã
                                                            if (isset($valueTour->wards)) {
                                                                if ($address !== '') {
                                                                    $address .= ' - ';
                                                                }
                                                                $address .= $valueTour->wards;
                                                            }
                                                        @endphp
                                                        <p class="tour-listing-five__card__location__text">
                                                            {{ $address }}</p>
                                                        <!-- /.tour-listing-five__card__location__text -->
                                                    </div><!-- /.tour-listing-five__card__location -->
                                                    <div class="tour-listing-five__card__bottom">
                                                        <div class="tour-listing-five__card__price-box">
                                                            <p class="tour-listing-five__card__price-title">Giá Tour
                                                            </p>
                                                            <!-- /.tour-listing-five__card__price-title -->
                                                            <h4 class="tour-listing-five__card__price">
                                                                {{ number_format($valueTour->price, 0, ',', '.') }}vnđ</h4>
                                                            <!-- /.tour-listing-five__card__price -->
                                                        </div><!-- /.tour-listing-five__card__price-box -->
                                                        <div class="tour-listing-five__card__btn-group">
                                                            <a href="javascript:void(0);"
                                                                class="tour-listing-five__card__popup-btn tour-listing-five__card__popup-btn--camera trevlo-image-popup"
                                                                data-gallery-options='{
                                                    "items": [
                                                      {
                                                        "src": "{{ url('assets') }}/trevlo/images/tours/tour-7-1.jpg"
                                                      },
                                                      {
                                                        "src": "{{ url('assets') }}/trevlo/images/tours/tour-7-2.jpg"
                                                      },
                                                      {
                                                        "src": "{{ url('assets') }}/trevlo/images/tours/tour-7-3.jpg"
                                                      }
                                                    ],
                                                    "gallery": {
                                                      "enabled": true
                                                    },
                                                    "type": "image"
                                                }'>
                                                                <span class="icon-photo-camera-1"></span>
                                                            </a>
                                                            <a href="https://www.youtube.com/watch?v=h9MbznbxlLc"
                                                                class="tour-listing-five__card__popup-btn video-popup">
                                                                <span class="icon-video-camera-1-1"></span>
                                                            </a>
                                                        </div><!-- /.tour-listing-five__card__btn-group -->
                                                    </div><!-- /.tour-listing-five__card__bottom -->
                                                </div><!-- /.tour-listing-five__card__content -->
                                            </div><!-- /.tour-listing-five__card__inner -->
                                        </div><!-- /.tour-listing-five__card -->
                                    </div><!-- /.item -->
                                @endforeach
                            </div><!-- /.tour-listing-five__carousel -->
                        </div><!-- /.trevlo-stretch-element-inside-column -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <img src="{{ url('assets') }}/trevlo/images/shapes/tour-shape-5-1.png" alt="shape"
                class="tour-listing-five__shape">
        </section><!-- /.tour-listing-five section-space -->


        <section class="why-choose-five section-space">
            <div class="container">
                <div class="row gutter-y-40">
                    <div class="col-lg-6">
                        <div class="trevlo-accrodion why-choose-five__faq" data-grp-name="why-choose-five__faq">
                            <div class="accrodion active wow animated fadeInUp" data-wow-delay="0s"
                                data-wow-duration="1500ms">
                                <div class="accrodion-title">
                                    <h4>How long does it take to get a visa?</h4>
                                </div>
                                <div class="accrodion-content" style="display: none;">
                                    <div class="inner">
                                        <p>Bring to the table win-win survival strategies to ensure proactive
                                            domination. At
                                            the
                                            end of the day, going forward, a new normal that has evolved from generation
                                            X
                                            is on
                                            the</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accrodion wow animated fadeInUp" data-wow-delay="0.1s"
                                data-wow-duration="1500ms">
                                <div class="accrodion-title">
                                    <h4>When is the best time to book flights?</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>Bring to the table win-win survival strategies to ensure proactive
                                            domination. At
                                            the
                                            end of the day, going forward, a new normal that has evolved from generation
                                            X
                                            is on
                                            the</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accrodion wow animated fadeInUp" data-wow-delay="0.2s"
                                data-wow-duration="1500ms">
                                <div class="accrodion-title">
                                    <h4>How much luggage can I bring?</h4>
                                </div>
                                <div class="accrodion-content" style="display: none;">
                                    <div class="inner">
                                        <p>TBring to the table win-win survival strategies to ensure proactive
                                            domination.
                                            At
                                            the end of the day, going forward, a new normal that has evolved from
                                            generation
                                            X
                                            is on the</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accrodion wow animated fadeInUp" data-wow-delay="0.3s"
                                data-wow-duration="1500ms">
                                <div class="accrodion-title">
                                    <h4>How can I protect my finances while traveling?</h4>
                                </div>
                                <div class="accrodion-content" style="display: none;">
                                    <div class="inner">
                                        <p>Bring to the table win-win survival strategies to ensure proactive
                                            domination. At
                                            the
                                            end of the day, going forward, a new normal that has evolved from generation
                                            X
                                            is on
                                            the</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.why-choose-five__faq -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="why-choose-five__content">
                            <div class="sec-title sec-title--two text-left">

                                <p class="sec-title__tagline">get to know us</p><!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">Why You Should Choose <br> Our Company</h2>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <div class="why-choose-five__text-box wow fadeInUp" data-wow-duration="1500ms">
                                <p class="why-choose-five__text">There are many variations of passages of Lorem Ipsum
                                    available,
                                    but the majority have suffered alteradution in some form by injected humour, or
                                    randomised
                                    words which</p><!-- /.why-choose-five__text -->
                            </div><!-- /.why-choose-five__text-box -->
                            <div class="why-choose-five__inner">
                                <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="why-choose-five__item__left">
                                        <div class="why-choose-five__item__icon">
                                            <span class="trevlo-one-icon-check"></span>
                                        </div><!-- /.why-choose-five__item__icon -->
                                        <h3 class="why-choose-five__item__title">fast & easy process</h3>
                                        <!-- /.why-choose-five__item__title -->
                                    </div><!-- /.why-choose-five__item__left -->
                                    <div class="why-choose-five__item__right">
                                        <p class="why-choose-five__item__text">Travel agency Company also impressed us
                                            with
                                            their transpa regarding</p><!-- /.why-choose-five__item__text -->
                                    </div><!-- /.why-choose-five__item__right -->
                                </div><!-- /.why-choose-five__item -->
                                <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="why-choose-five__item__left">
                                        <div class="why-choose-five__item__icon">
                                            <span class="trevlo-one-icon-check"></span>
                                        </div><!-- /.why-choose-five__item__icon -->
                                        <h3 class="why-choose-five__item__title">save your money</h3>
                                        <!-- /.why-choose-five__item__title -->
                                    </div><!-- /.why-choose-five__item__left -->
                                    <div class="why-choose-five__item__right">
                                        <p class="why-choose-five__item__text">Flexible Classes refers to the process
                                            of
                                            acquiring is knowledge free</p><!-- /.why-choose-five__item__text -->
                                    </div><!-- /.why-choose-five__item__right -->
                                </div><!-- /.why-choose-five__item -->
                            </div><!-- /.why-choose-five__inner -->
                        </div><!-- /.why-choose-five__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.why-choose-five section-space -->

        <section class="offer-three section-space">
            <div class="offer-three__bg trevlo-jarallax" data-jarallax data-speed="0.30"
                style="background-image: url({{ url('assets') }}/trevlo/images/backgrounds/offer-bg-3-1.jpg);"></div>
            <!-- /.offer-three__bg -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8">
                        <div class="offer-three__content">
                            <div class="sec-title sec-title--two text-left">

                                <p class="sec-title__tagline">special offer</p><!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">grab up to 50% off on <br> your favourite destination</h2>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="offer-three__text">There are many variations of passages of Lorem Ipsum
                                available, but
                                the
                                majority have suffered alteradution in some form by injected humour, or randomised words
                                which
                            </p><!-- /.offer-three__text -->
                            <a href="tour-listing-side-filter-right.html"
                                class="offer-three__btn trevlo-btn trevlo-btn--two trevlo-btn--white">
                                <span>Book now</span>
                                <i class="trevlo-one-icon-up-right-arrow"></i>
                            </a>
                        </div><!-- /.offer-three__content -->
                    </div><!-- /.col-xl-6 col-lg-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <div class="offer-three__image">
                <div class="offer-three__image__inner"></div><!-- /.offer-three__image__inner -->
                <img src="{{ url('assets') }}/trevlo/images/offer/offer-3-1.png" alt="offer"
                    class="offer-three__image__one">
            </div><!-- /.offer-three__image -->
            <img src="{{ url('assets') }}/trevlo/images/shapes/offer-border-3-2.png" alt="border"
                class="offer-three__border-one">
            <img src="{{ url('assets') }}/trevlo/images/shapes/offer-border-3-3.png" alt="border"
                class="offer-three__border-two">
        </section><!-- /.offer-three section-space -->

        <section class="testimonial-four section-space">
            <div class="testimonial-four__bg trevlo-jarallax" data-jarallax data-speed="0.30"
                style="background-image: url({{ url('assets') }}/trevlo/images/backgrounds/testimonial-bg-4-1.jpg);">
            </div><!-- /.testimonial-four__bg -->
            <div class="container">
                <div class="sec-title sec-title--two text-center">

                    <p class="sec-title__tagline">our testimonials</p><!-- /.sec-title__tagline -->

                    <h2 class="sec-title__title">what peoples say about trevlo</h2><!-- /.sec-title__title -->
                </div><!-- /.sec-title -->
                <!-- /.sec-title -->
                <div class="testimonial-four__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav owl-theme owl-carousel"
                    data-owl-options='{
            "items": 3,
            "margin": 30,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": 6000,
            "nav":true,
            "dots":false,
            "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
            "responsive":{
                "0":{
                    "items": 1
                },
                "768":{
                    "items": 1
                },
                "992":{
                    "items": 2
                }
            }
            }'>
                    <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="testimonials-card-four">
                            <div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <p class="testimonials-card-four__quote">travel agency Company also impressed us with their
                                transpa regarding costs. The <span>trevlo</span> initial quote was. There are many
                                variations of passages, but the majority have suffered.</p>
                            <!-- /.testimonials-card-four__quote -->
                            <div class="testimonials-card-four__identity">
                                <h5 class="testimonials-card-four__identity__name">Michael G. Ware</h5>
                                <p class="testimonials-card-four__identity__designation">managing director</p>
                            </div><!-- /.testimonials-card-four__identity -->
                            <div class="testimonials-card-four__quote-icon">
                                <span class="trevlo-one-icon-quote"></span>
                            </div><!-- /.testimonials-card-four__quote-icon -->
                            <div class="testimonials-card-four__image">
                                <img src="{{ url('assets') }}/trevlo/images/testimonial/testimonial-4-1.jpg"
                                    alt="Michael G. Ware">
                            </div>
                        </div><!-- /.testimonials-card-four -->
                    </div><!-- /.owl-slide-item-->
                    <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <div class="testimonials-card-four">
                            <div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <p class="testimonials-card-four__quote">Booking our vacation through <span>trevlo</span>
                                Travel
                                Agency was an absolute breeze! From start to finish, their team went above and beyond to
                                ensure our trip was nothing short of spectacular.</p>
                            <!-- /.testimonials-card-four__quote -->
                            <div class="testimonials-card-four__identity">
                                <h5 class="testimonials-card-four__identity__name">Guy Hawkins</h5>
                                <p class="testimonials-card-four__identity__designation">Tourist</p>
                            </div><!-- /.testimonials-card-four__identity -->
                            <div class="testimonials-card-four__quote-icon">
                                <span class="trevlo-one-icon-quote"></span>
                            </div><!-- /.testimonials-card-four__quote-icon -->
                            <div class="testimonials-card-four__image">
                                <img src="{{ url('assets') }}/trevlo/images/testimonial/testimonial-4-2.jpg"
                                    alt="Guy Hawkins">
                            </div>
                        </div><!-- /.testimonials-card-four -->
                    </div><!-- /.owl-slide-item-->
                    <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="testimonials-card-four">
                            <div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <p class="testimonials-card-four__quote">travel agency Company also impressed us with their
                                transpa regarding costs. The <span>trevlo</span> initial quote was. There are many
                                variations of passages, but the majority have suffered.</p>
                            <!-- /.testimonials-card-four__quote -->
                            <div class="testimonials-card-four__identity">
                                <h5 class="testimonials-card-four__identity__name">Michael G. Ware</h5>
                                <p class="testimonials-card-four__identity__designation">managing director</p>
                            </div><!-- /.testimonials-card-four__identity -->
                            <div class="testimonials-card-four__quote-icon">
                                <span class="trevlo-one-icon-quote"></span>
                            </div><!-- /.testimonials-card-four__quote-icon -->
                            <div class="testimonials-card-four__image">
                                <img src="{{ url('assets') }}/trevlo/images/testimonial/testimonial-4-1.jpg"
                                    alt="Michael G. Ware">
                            </div>
                        </div><!-- /.testimonials-card-four -->
                    </div><!-- /.owl-slide-item-->
                    <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <div class="testimonials-card-four">
                            <div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <p class="testimonials-card-four__quote">Booking our vacation through <span>trevlo</span>
                                Travel
                                Agency was an absolute breeze! From start to finish, their team went above and beyond to
                                ensure our trip was nothing short of spectacular.</p>
                            <!-- /.testimonials-card-four__quote -->
                            <div class="testimonials-card-four__identity">
                                <h5 class="testimonials-card-four__identity__name">Guy Hawkins</h5>
                                <p class="testimonials-card-four__identity__designation">Tourist</p>
                            </div><!-- /.testimonials-card-four__identity -->
                            <div class="testimonials-card-four__quote-icon">
                                <span class="trevlo-one-icon-quote"></span>
                            </div><!-- /.testimonials-card-four__quote-icon -->
                            <div class="testimonials-card-four__image">
                                <img src="{{ url('assets') }}/trevlo/images/testimonial/testimonial-4-2.jpg"
                                    alt="Guy Hawkins">
                            </div>
                        </div><!-- /.testimonials-card-four -->
                    </div><!-- /.owl-slide-item-->
                </div><!-- /.thm-owl__slider -->
            </div><!-- /.container -->
        </section><!-- /.testimonial-four section-space -->


        <div class="blog-four section-space">

            <div class="container">
                <div class="blog-four__top">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="sec-title sec-title--two text-left">

                                <p class="sec-title__tagline">our latest blog</p><!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">our latest news</h2><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                        </div><!-- /.col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="blog-four__button">
                                <a href="blog-details-right.html" class="trevlo-btn trevlo-btn--border">
                                    <span>view all blog</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.blog-four__button -->
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->
                </div><!-- /.blog-four__top -->
                <div class="row gutter-y-30">
                    @foreach ($blog_list as $valueBlog)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <div class="blog-four__card">
                                <a href="#" class="blog-four__card__image-link"
                                    style="background-image: url({{ $valueBlog->imgBanner }});">
                                    {{--                            <div class="blog-four__card__date"> --}}
                                    {{--                                <span class="blog-four__card__date__day">25</span> --}}
                                    {{--                                <span class="blog-four__card__date__month">june</span> --}}
                                    {{--                            </div> --}}
                                    {{--                            <div class="blog-four__card__overlay"> --}}
                                    {{--                                    <span class="blog-four__card__plus"> --}}
                                    {{--                                        <i class="icon-plus"></i> --}}
                                    {{--                                    </span> --}}
                                    {{--                            </div><!-- /.blog-four__card__overlay --> --}}
                                </a><!-- /.blog-four__card__image-link -->
                                <div class="blog-four__card__content">
                                    <h3 class="blog-four__card__title"><a href="#">{{ $valueBlog->name }}</a>
                                    </h3><!-- /.blog-four__card__title -->
                                    <ul class="list-unstyled blog-four__card__meta">
                                        <li>
                                            <a href="#">
                                                <span class="blog-four__card__meta__icon">
                                                    <i class="trevlo-one-icon-user"></i>
                                                </span>
                                                {{ $valueBlog->objCategory->name }}
                                            </a>
                                        </li>

                                    </ul>
                                </div><!-- /.blog-four__card__content -->
                            </div><!-- /.blog-four__card -->
                        </div><!-- /.col-lg-4 col-md-6 -->
                    @endforeach
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.blog-four section-space -->

        <footer class="footer-three section-space-top">
            <div class="footer-three__bg"
                style="background-image: url({{ url('assets') }}/trevlo/images/shapes/footer-bg-3-1.png);"></div>
            <div class="footer-three__inner">
                <!-- /.footer-three__bg -->
                <div class="container">
                    <div class="footer-three__top">
                        <div class="footer-three__logo">
                            <a href="index.html">
                                <img src="{{ url('assets') }}/trevlo/images/logo-light-2.png" alt="logo"
                                    width="187">
                            </a>
                        </div><!-- /.footer-three__logo -->
                        <div class="footer-three__contact">
                            <ul class="footer-three__contact__list">
                                <li>
                                    <span class="footer-three__contact__list__icon">
                                        <i class="trevlo-one-icon-maps-and-flags"></i>
                                    </span><!-- /.footer-three__contact__list__icon -->
                                    6391 Elgin St. Celina, Delaware <br> New York. USA
                                </li>
                                <li>
                                    <span class="footer-three__contact__list__icon">
                                        <i class="trevlo-one-icon-telephone"></i>
                                    </span><!-- /.footer-three__contact__list__icon -->
                                    <a href="tel:+1234567890">+123 456 7890</a>
                                </li>
                            </ul><!-- /.footer-three__contact__list -->
                        </div><!-- /.footer-three__contact -->
                    </div><!-- /.footer-three__top -->
                    <div class="row gutter-y-40">
                        <div class="col-xl-3 col-md-6 wow animated fadeInUp" data-wow-delay="0s"
                            data-wow-duration="1500ms">
                            <div class="footer-widget footer-widget--about">
                                <h2 class="footer-widget__title">About us</h2><!-- /.footer-widget__title -->
                                <p class="footer-widget__about-text">There are many variations of passages of Lorem
                                    Ipsum
                                    available, but the majority have suffered</p><!-- /.footer-widget__about-text -->
                                <div class="social-links">
                                    <a href="https://facebook.com/">
                                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                        <span class="sr-only">Facebook</span>
                                    </a>
                                    <a href="https://twitter.com/">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                        <span class="sr-only">Twitter</span>
                                    </a>
                                    <a href="https://instagram.com/">
                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                        <span class="sr-only">Instagram</span>
                                    </a>
                                    <a href="https://youtube.com/">
                                        <i class="fab fa-youtube" aria-hidden="true"></i>
                                        <span class="sr-only">Youtube</span>
                                    </a>

                                </div><!-- /.social-links -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-3 col-md-6 -->
                        <div class="col-xl-3 col-md-3 wow animated fadeInUp" data-wow-delay="0.1s"
                            data-wow-duration="1500ms">
                            <div class="footer-widget footer-widget--links footer-widget--links-1">
                                <h2 class="footer-widget__title">useful links</h2><!-- /.footer-widget__title -->
                                <ul class="footer-widget__links">
                                    <li><a href="login.html">Account</a></li>
                                    <li><a href="tour-listing-1.html">Tour Listings</a></li>
                                    <li><a href="contact.html">Privacy Policy</a></li>
                                    <li><a href="faq.html">Help</a></li>
                                </ul><!-- /.footer-widget__links -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-3 col-md-3 -->
                        <div class="col-xl-2 col-md-3 wow animated fadeInUp" data-wow-delay="0.2s"
                            data-wow-duration="1500ms">
                            <div class="footer-widget footer-widget--links footer-widget--links-2">
                                <h2 class="footer-widget__title">Company</h2><!-- /.footer-widget__title -->
                                <ul class="footer-widget__links">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="blog.html">Community Blog</a></li>
                                    <li><a href="destinations.html">Destinations</a></li>
                                    <li><a href="our-guide.html">Meet the Guide</a></li>
                                    <li><a href="contact.html">Contact Now</a></li>
                                </ul><!-- /.footer-widget__links -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-2 col-md-3 -->
                        <div class="col-xl-4 col-md-6 wow animated fadeInUp" data-wow-delay="0.3s"
                            data-wow-duration="1500ms">
                            <div class="footer-widget footer-widget--gallery">
                                <h2 class="footer-widget__title">Our Gallery</h2><!-- /.footer-widget__title -->
                                <div class="footer-widget__gallery">
                                    <a href="gallery.html" class="footer-widget__gallery__link">
                                        <img src="{{ url('assets') }}/trevlo/images/gallery/footer-widget-gallery-1.jpg"
                                            alt="footer-widget-gallery">
                                        <span class="footer-widget__gallery__icon">
                                            <i class="icon-plus"></i>
                                        </span>
                                    </a><!-- /.footer-widget__gallery__link -->
                                    <a href="gallery.html" class="footer-widget__gallery__link">
                                        <img src="{{ url('assets') }}/trevlo/images/gallery/footer-widget-gallery-2.jpg"
                                            alt="footer-widget-gallery">
                                        <span class="footer-widget__gallery__icon">
                                            <i class="icon-plus"></i>
                                        </span>
                                    </a><!-- /.footer-widget__gallery__link -->
                                    <a href="gallery.html" class="footer-widget__gallery__link">
                                        <img src="{{ url('assets') }}/trevlo/images/gallery/footer-widget-gallery-3.jpg"
                                            alt="footer-widget-gallery">
                                        <span class="footer-widget__gallery__icon">
                                            <i class="icon-plus"></i>
                                        </span>
                                    </a><!-- /.footer-widget__gallery__link -->
                                    <a href="gallery.html" class="footer-widget__gallery__link">
                                        <img src="{{ url('assets') }}/trevlo/images/gallery/footer-widget-gallery-4.jpg"
                                            alt="footer-widget-gallery">
                                        <span class="footer-widget__gallery__icon">
                                            <i class="icon-plus"></i>
                                        </span>
                                    </a><!-- /.footer-widget__gallery__link -->
                                    <a href="gallery.html" class="footer-widget__gallery__link">
                                        <img src="{{ url('assets') }}/trevlo/images/gallery/footer-widget-gallery-5.jpg"
                                            alt="footer-widget-gallery">
                                        <span class="footer-widget__gallery__icon">
                                            <i class="icon-plus"></i>
                                        </span>
                                    </a><!-- /.footer-widget__gallery__link -->
                                    <a href="gallery.html" class="footer-widget__gallery__link">
                                        <img src="{{ url('assets') }}/trevlo/images/gallery/footer-widget-gallery-6.jpg"
                                            alt="footer-widget-gallery">
                                        <span class="footer-widget__gallery__icon">
                                            <i class="icon-plus"></i>
                                        </span>
                                    </a><!-- /.footer-widget__gallery__link -->
                                </div>
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-4 col-md-6 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
                <img src="{{ url('assets') }}/trevlo/images/shapes/footer-shape-3-1.png" alt="shape"
                    class="footer-three__shape-one">
                <img src="{{ url('assets') }}/trevlo/images/shapes/footer-shape-3-2.png" alt="shape"
                    class="footer-three__shape-two">
            </div><!-- /.footer-three__inner -->
            <div class="footer-three__bottom">
                <div class="container">
                    <div class="footer-three__bottom__inner">
                        <p class="footer-three__copyright">
                            &copy; Copyright <span class="dynamic-year"></span> by Trevlo HTML Template.
                        </p>
                    </div><!-- /.footer-three__inner -->
                </div><!-- /.container -->
            </div><!-- /.footer-three__bottom -->
        </footer><!-- /.footer-three -->

    </div><!-- /.page-wrapper -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img
                        src="{{ url('assets') }}/trevlo/images/logo-light-2.png" width="187"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@trevlo.com">needhelp@trevlo.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:(303)5550105">(303) 555-0105</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
                <a href="https://twitter.com/">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                    <span class="sr-only">Twitter</span>
                </a>
                <a href="https://facebook.com/">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://pinterest.com/">
                    <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                    <span class="sr-only">Pinterest</span>
                </a>
                <a href="https://instagram.com/">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <span class="sr-only">Instagram</span>
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
                <button type="submit" aria-label="search submit"
                    class="search-popup__btn trevlo-btn trevlo-btn--base">
                    <span class="icon-search"></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>
    @include('Home.JS.js_header')

</body>

</html>
