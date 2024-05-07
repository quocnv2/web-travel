@extends ('Home.master')
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
                        <a href="">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <span class="sr-only">Facebook</span>
                        </a>
                        <a href="">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                            <span class="sr-only">Youtube</span>
                        </a>

                    </div><!-- /.social-links -->
                    <div class="container">
                        <div class="row gutter-y-50">
                            <div class="col-lg-10 mx-auto">
                                <div class="main-slider-five__content">

                                    <h5 class="main-slider-five__sub-title">Đối Tác Phiêu Lưu Tốt Nhất Của Bạn</h5>
                                    <h3 class="main-slider-five__title">{{ $bannerValue->name }}</h3>
                                    <div class="main-slider-five__button">
                                        <a href="" class="trevlo-btn trevlo-btn--two trevlo-btn--base">
                                            <span>Xem Chi Tiết</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div>

                                    <!-- /.main-slider-five__button -->
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
            @endforeach
        </div><!-- banner-slider -->
        <div class="banner-form banner-form--two banner-form--three wow fadeInUp" data-wow-delay="300ms">
            <div class="container">
                <div class="counter-two__bg" style="background-image: url(assets/images/shapes/counter-bg-2.png);"></div>
                <div class="counter-two__shape"></div>
                <div class="banner-form__wrapper">
                    <div class="row">
                        <div class="banner-form__col banner-form__col--2">
                            <div class="feature-one__box" style="display: flex;align-items: center;">
                                <div class="feature-one__box__icon"><span class="icon-Booking"></span></div>
                                <h3 class="feature-one__box__title">Đặt Chỗ Dễ Dàng & Nhanh Chóng</h3>
                            </div><!-- feature-item -->
                        </div>
                        <div class="banner-form__col banner-form__col--3">
                            <div class="feature-one__box" style="display: flex;align-items: center;">
                                <div class="feature-one__box__icon"><span class="icon-Group"></span></div>
                                <h3 class="feature-one__box__title">Lựa Chọn Chuyến Tham Quan Tốt Nhất</h3>
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

                            <h2 class="sec-title__title">Những Địa Điểm Du Lịch Thú Vị <br> việt Nam</h2>
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

                                                        $imageArray = json_decode($valueTour->imageArray, true);
                                                        $videoArray = json_decode($valueTour->videoArray, true);
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
