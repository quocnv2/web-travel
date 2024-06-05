@extends ('Home.master')
@section('css_view')
    <style>
        .tour-listing-five__card__image img {
            width: 100%;
            height: 200px;
            /* Chiều cao bạn muốn đặt */
            object-fit: cover;
            /* Đảm bảo hình ảnh không bị biến dạng */
        }
    </style>
@stop
@section('view')
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
            @foreach ($banner_list as $bannerValue)
                <div class="item">
                    <div class="main-slider-five__image" style="background-image: url({{ $bannerValue->imgBanner }});">
                    </div>
                    <div class="social-links">
                        <a href="https://www.facebook.com/profile.php?id=100069226627675" target="black">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <span class="sr-only">Facebook</span>
                        </a>
                        <a href="https://www.messenger.com/t/100772425270420/?messaging_source=source%3Apages%3Amessage_shortlink&source_id=1441792&recurring_notification=0"
                            target="black">
                            <i class="fab fa-facebook-messenger" aria-hidden="true"></i>
                            <span class="sr-only">Messenger</span>
                        </a>
                        <a href="https://youtube.com/@songtratour?si=Ckp7LGtfd-p2m9rC" target="black">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                            <span class="sr-only">Youtube</span>
                        </a>
                        <a href="https://www.tiktok.com/@ngocsongtratour?_t=8mrqWgYXeu9&_r=1" target="black">
                            <i class="fab fa-tiktok" aria-hidden="true"></i>
                            <span class="sr-only">Tiktok</span>
                        </a>
                    </div><!-- /.social-links -->
                    <div class="container-fluid mg-top-banner">
                        <div class="row gutter-y-50">
                            <div class="col-lg-10 mx-auto">
                                <div class="main-slider-five__content">
                                    <section class="feature-two">
                                        <div class="container-fluid">
                                            <div class="feature-two__inner"
                                                style="background-image: url(assets/images/backgrounds/feature-bg-2-1.jpg);">
                                                <div class="feature-two__wrapper">
                                                    <div class="sec-title sec-title--two text-center">
                                                        <p class="sec-title__tagline" id="title__tagline">Đối Tác Phiêu Lưu
                                                            Tốt Nhất Của Bạn</p>
                                                        <!-- /.sec-title__tagline -->
                                                        <h2 class="sec-title__title">{{ $bannerValue->name }}</h2>
                                                        <!-- /.sec-title__title -->
                                                    </div><!-- /.sec-title -->
                                                    <div class="row gutter-y-30 banner-overflow-y">
                                                        @foreach ($categories as $category_banner)
                                                            <a href="{{ route('listTour_Category', $category_banner->slug) }}" class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 wow fadeInUp"
                                                                id="banner_category" data-wow-duration="1500ms"
                                                                data-wow-delay="00ms">
                                                                <div class="feature-two__item">
                                                                    <div class="feature-two__icon">
                                                                        <img style="width: 70%;" src="{{$category_banner->icon}}" alt="{{$category_banner->name}}" class="trevlo-one-icon-secure-payment"></img>
                                                                    </div><!-- /.feature-two__icon -->
                                                                    <h3 class="feature-two__title">{{$category_banner->name}}</h3>
                                                                    <!-- /.feature-two__title -->
                                                                </div><!-- /.feature-two__item -->
                                                            </a><!-- /.col-xxl-3 col-xl-4 col-lg-6 col-md-6 -->
                                                        @endforeach
                                                    </div><!-- /.row -->
                                                    <div class="feature-two__bottom" id="two__bottom">
                                                        <div class="main-slider-five__button">
                                                            <a href="{{ route('listTour') }}"
                                                                class="trevlo-btn trevlo-btn--two trevlo-btn--base">
                                                                <span>Xem Danh Sách Tour</span>
                                                                <i class="trevlo-one-icon-up-right-arrow"></i>
                                                            </a><!-- /.trevlo-btn -->
                                                        </div>
                                                    </div><!-- /.feature-two__top -->
                                                </div><!-- /.feature-two__wrapper -->
                                            </div><!-- /.feature-two__inner -->
                                        </div><!-- /.container -->
                                    </section><!-- /.feature-two section-space-bottom -->

                                    <!-- /.main-slider-five__button -->
                                </div><!-- /.main-slider-five__content -->
                            </div><!-- /.col-lg-10 mx-auto -->
                        </div><!-- /.row -->
                    </div>
                    <div class="main-slider-five__shape">
                        <img src="{{ url('assets') }}/trevlo/images/shapes/slider-shape-5-2.png" alt="shape"
                            class="main-slider-five__shape__one">
                        <img src="{{ url('assets') }}/trevlo/images/shapes/slider-shape-5-3.png" alt="shape"
                            class="main-slider-five__shape__two">
                    </div><!-- /.main-slider-five__shape -->
                </div><!-- item -->
            @endforeach
        </div><!-- banner-slider -->
        <div class="banner-form banner-form--two banner-form--three wow fadeInUp" id="banner_category_tatil"
            data-wow-delay="300ms">
            <div class="container">
                <div class="counter-two__bg"
                    style="background-image: url({{ url('assets') }}/images/shapes/counter-bg-2.png);"></div>
                <div class="counter-two__shape"></div>
                <div class="banner-form__wrapper">
                    <div class="row">
                        <div class="banner-form__col banner-form__col--2">
                            <div class="feature-one__box" style="display: flex;align-items: center;">
                                <div class="feature-one__box__icon"><span class="icon-Booking"></span></div>
                                <h3 class="feature-one__box__title">Đặt Chỗ Dễ Dàng</h3>
                            </div><!-- feature-item -->
                        </div>
                        <div class="banner-form__col banner-form__col--3">
                            <div class="feature-one__box" style="display: flex;align-items: center;">
                                <div class="feature-one__box__icon"><span class="icon-Group"></span></div>
                                <h3 class="feature-one__box__title">Lựa Chọn Tốt Nhất</h3>
                            </div><!-- feature-item -->
                        </div>
                        <div class="banner-form__col banner-form__col--1">
                            <div class="feature-one__box" style="display: flex;align-items: center;">
                                <div class="feature-one__box__icon"><span class="icon-lowest-price-1-1"></span></div>
                                <h3 class="feature-one__box__title">Tiết Kiệm Chi Phí</h3>
                            </div><!-- feature-item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-form -->
    </section>
    <!-- main-slider-end -->

    @include('Home.Layout.Body.About.about')

    <section class="tour-listing-five section-space">
        <div class="container">
            <div class="tour-listing-five__top">
                <div class="row gutter-y-40 align-items-center">
                    <div class="col-lg-8">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">Tour Du Lịch</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">Những Địa Điểm Du Lịch Thú Vị việt Nam</h2>
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
                            @foreach ($tour_list as $tourdes)
                                <div class="item">
                                    <div class="tour-listing-five__card">
                                        <div class="tour-listing-five__card__bg"
                                            style="background-image: url({{ url('assets') }}/trevlo/images/shapes/tour-shape-bg-5-1.png);">
                                        </div>
                                        <!-- /.tour-listing-five__card__bg -->
                                        <div class="tour-listing-five__card__inner">
                                            <a href="{{ route('detailTour', $tourdes->slug) }}"
                                                class="tour-listing-five__card__image">
                                                <img src="{{ $tourdes->imgBanner }}" style="height: 300px"
                                                    alt="tour">
                                                <div class="tour-listing-five__card__featured">
                                                    {{ $tourdes->objCategory->name }}</div>
                                            </a><!-- /.tour-listing-five__card__image -->
                                            <div class="tour-listing-five__card__content">
                                                <h3 class="tour-listing-five__card__title">
                                                    <a href="{{ route('detailTour', $tourdes->slug) }}">(
                                                        {{ 'Mã Tour :' . ' ' . $tourdes->code }} )
                                                        {{ $tourdes->name }}</a>
                                                </h3><!-- /.tour-listing-five__card__title -->
                                                <div class="tour-listing-five__card__location">
                                                    <span class="tour-listing-five__card__location__icon">
                                                        <i class="trevlo-one-icon-maps-and-flags"></i>
                                                    </span><!-- /.tour-listing-five__card__location__icon -->
                                                    @php
                                                        $address = '';
                                                        if (isset($tourdes->province)) {
                                                            $address .= $tourdes->province;
                                                        }
                                                        if (isset($tourdes->district)) {
                                                            if ($address !== '') {
                                                                $address .= ' - ';
                                                            }
                                                            $address .= $tourdes->district;
                                                        }

                                                        // Kiểm tra và thêm thông tin phường xã
                                                        if (isset($tourdes->wards)) {
                                                            if ($address !== '') {
                                                                $address .= ' - ';
                                                            }
                                                            $address .= $tourdes->wards;
                                                        }

                                                        $imageArray = json_decode($tourdes->imageArray, true);
                                                        $videoArray = json_decode($tourdes->videoArray, true);
                                                    @endphp
                                                    <p class="tour-listing-five__card__location__text">
                                                        {{ $tourdes->objCategory->name }}</p>
                                                    <!-- /.tour-listing-five__card__location__text -->
                                                </div><!-- /.tour-listing-five__card__location -->
                                                <div class="tour-listing-five__card__bottom">
                                                    <div class="tour-listing-five__card__price-box">
                                                        <p class="tour-listing-five__card__price-title">Giá Tour
                                                        </p>
                                                        <!-- /.tour-listing-five__card__price-title -->
                                                        <h4 class="tour-listing-five__card__price">
                                                            {{ number_format($tourdes->price, 0, ',', '.') }} VND</h4>
                                                        <!-- /.tour-listing-five__card__price -->
                                                    </div><!-- /.tour-listing-five__card__price-box -->
                                                    <div class="tour-listing-five__card__btn-group">
                                                        <a href="javascript:void(0);"
                                                            class="tour-listing-five__card__popup-btn tour-listing-five__card__popup-btn--camera trevlo-image-popup"
                                                            data-gallery-options='{
                                                            "items": [
                                                                   @foreach ($imageArray as $index => $imgs)
                                                                        @if (isset($imgs['link']) && $imgs['link'] != '')
                                                                             { "src": "{{ $imgs['link'] }}" }@if (!$loop->last),@endif
                                                                        @endif @endforeach
                                                            ],
                                                            "gallery": {
                                                              "enabled": true
                                                            },
                                                            "type": "image"
                                                        }'>
                                                            <span class="icon-photo-camera-1"></span>
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            class="tour-listing-five__card__popup-btn trevlo-image-popup"
                                                            data-gallery-options='{
                                                            "items": [
                                                                   @foreach ($videoArray as $index => $videos)
                                                                        @if (isset($videos['link']) && $videos['link'] != '')
                                                                            {"src": "{{ $videos['link'] }}", "style": "width: 100%;"}@if (!$loop->last),@endif
                                                                        @endif @endforeach
                                                            ],
                                                            "gallery": {
                                                              "enabled": true
                                                            },
                                                            "type": "iframe"
                                                        }'>
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

    @include('Home.Layout.Body.Feedback.feedback')

    @include('Home.Layout.Body.WhyChoose.whychoose')
    <!-- /.why-choose-five section-space -->

    @include('Home.Layout.Body.Blog.blog')
@stop
