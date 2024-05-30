@extends ('Home.master')
@php
    use Carbon\Carbon;

    $slugCategory = isset($objCategory) ? $objCategory : '';
@endphp
@section('view')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">
                Phòng</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    @if ($slugCategory)
                        <li><a href="{{ route('listRoom') }}">Phòng</a></li>
                        <li><a href="{{ route('listRoom_Category', $slugCategory->slug) }}">Danh Mục</a></li>
                        <li>{{ $slugCategory->name }}</li>
                    @else
                        <li>Phòng</li>
                    @endif

                </ul><!-- /.trevlo-breadcrumb -->
            </div><!-- /.page-header__breadcrumb-box -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <!-- Blog Page Start -->

    <section class="tour-listing-details">
        <div class="tour-listing-details__destination">
            <div class="container">
                <div class="tour-listing-details__destination-row row">
                    <div class="col-xl-4 wow animated fadeInLeft" data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <div class="tour-listing-details__destination-left">
                            <h3 class="tour-listing-details__dastination-title">{{ $objRoom->name }}</h3>
                            <h4 class="tour-listing-details__dastination-price">
                                <span>{{ number_format($objRoom->price, 0, ',', '.') }}vnđ</span><span
                                    class="tour-listing-details__dastination-person">/ Đêm </span>
                            </h4>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        @php
                            $imageArray = json_decode($objRoom->imageArray, true);
                            $videoArray = json_decode($objRoom->videoArray, true);
                        @endphp
                        <div class="tour-listing-details__destination-right">
                            <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.5s"
                                data-wow-duration="1500ms">
                                <span class="icon-plane"></span>
                                <div class="tour-listing-details__destination-info-title">
                                    <h4 class="tour-listing-details__destination-info-top">Mã Phòng</h4>
                                    <h4 class="tour-listing-details__destination-info-bottom">{{ $objRoom->code }}</h4>
                                </div>
                            </div>
                            <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.1s"
                                data-wow-duration="1500ms">
                                <span class="icon-clock-1"></span>
                                <div class="tour-listing-details__destination-info-title">
                                    <h4 class="tour-listing-details__destination-info-top">Thời Gian</h4>
                                    <h4 class="tour-listing-details__destination-info-bottom">
                                        Hàng Ngày
                                    </h4>
                                </div>
                            </div>
                            <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.7s"
                                data-wow-duration="1500ms">
                                <span class="icon-location-1"></span>
                                <div class="tour-listing-details__destination-info-title">
                                    <h4 class="tour-listing-details__destination-info-top">Vị Trí</h4>
                                    <h4 class="tour-listing-details__destination-info-bottom">
                                        {{ $objRoom->objCategory->name }}</h4>

                                </div>
                            </div>
                            <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.3s"
                                data-wow-duration="1500ms">
                                <span class="icon-Duration"></span>
                                <div class="tour-listing-details__destination-info-title">
                                    <h4 class="tour-listing-details__destination-info-top">Khách Hàng Đã Trải Nhiệm</h4>
                                    <h4 class="tour-listing-details__destination-info-bottom">89,9% Hài Lòng</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tour-listing-details__info-area">
            <div class="container">
                <div class="tour-listing-details__info">
                    <div class="tour-listing-details__info-left">
                        <div class="tour-listing-details__posted">
                            <span class="icon-clock-1"></span>
                            <p class="tour-listing-details__posted-text">Đã
                                Đăng
                                {{ Carbon::parse($objRoom->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                            </p>
                        </div>
                    </div>
                    <div class="tour-listing-details__info-right">
                        <a href="javascript:void(0);" id="registerContact"
                            class="tour-listing-details__share-btn trevlo-btn trevlo-btn--white-two">
                            <span class="icon-share"></span> <span>Đăng Ký Liên Hệ</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="tour-listing-details__info-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4  row-room-list-mobile">
                        <aside class="tour-listing-sidebar ">
                            <div class="tour-listing-sidebar__form tour-listing-sidebar__item wow animated fadeInUp"
                                data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <div class="sidebar-blog__single sidebar-blog__single--categories wow animated fadeInUp"
                                    data-wow-delay="0.2s" data-wow-duration="1500ms">
                                    <h4 class="sidebar-blog__title">Danh Mục</h4><!-- /.sidebar-blog__title -->
                                    <ul class="sidebar-blog__categories ">
                                        @foreach ($categories as $cat)
                                            <li><a
                                                    href="{{ route('listTour_Category', $cat->slug) }}">{{ $cat->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul><!-- /.sidebar-blog__categories  -->
                                </div>
                            </div>
                            <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                                data-wow-delay="0.1s" data-wow-duration="1500ms">

                                <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Phòng Đã
                                    Xem </h3>
                                <ul class="tour-listing-sidebar-post">
                                    @foreach ($historyRoom as $key => $valueHistory)
                                        <li class="tour-listing-sidebar-post__item">
                                            <div class="tour-listing-sidebar-post__image">
                                                <img src="{{ $valueHistory['imgRoom'] }}"
                                                    alt="{{ $valueHistory['name'] }}">
                                            </div>
                                            <div class="tour-listing-sidebar-post__content">
                                                <p class="tour-listing-sidebar-post__price">
                                                    {{ number_format($valueHistory['price'], 0, ',', '.') }} VNĐ/Đêm</p>
                                                <h5 class="tour-listing-sidebar-post__link"><a href="">
                                                        {{ $valueHistory['name'] }}</a>
                                                </h5>
                                                <div class="tour-listing-sidebar-post__location">
                                                    <span class="icon-location-1"></span>
                                                    <p class="tour-listing-sidebar-post__location-text text-small">
                                                        {{ $valueHistory['nameCategory'] }}
                                                    </p>
                                                </div>

                                            </div>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                                data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Phòng Mới
                                    Nhất
                                </h3>
                                <ul class="tour-listing-sidebar-post">
                                    @foreach ($room_new as $valRNew)
                                        <li class="tour-listing-sidebar-post__item">
                                            <div class="tour-listing-sidebar-post__image">
                                                <img src="{{ $valRNew->imgRoom }}" alt="{{ $valRNew->name }}">
                                            </div>
                                            <div class="tour-listing-sidebar-post__content">
                                                <p class="tour-listing-sidebar-post__price">
                                                    {{ number_format($valRNew->price, 0, ',', '.') }} VNĐ/Đêm</p>
                                                <h5 class="tour-listing-sidebar-post__link"><a
                                                        href="">{{ $valRNew->name }}</a>
                                                </h5>
                                                <div class="tour-listing-sidebar-post__location">
                                                    <span class="icon-location-1"></span>
                                                    <p class="tour-listing-sidebar-post__location-text text-small">
                                                        {{ $valueHistory['nameCategory'] }}
                                                    </p>
                                                </div>

                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                                data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Địa Điểm
                                    Tour
                                </h3>
                                <ul class="tour-listing-sidebar-post">
                                    @foreach ($tour_list as $valsiml)
                                        <li class="tour-listing-sidebar-post__item">
                                        <div class="tour-listing-sidebar-post__image">
                                            <img src="{{ $valsiml->imgBanner }}"
                                                 alt="{{ $valsiml->name }}">
                                        </div>
                                        <div class="tour-listing-sidebar-post__content">
                                            <p class="tour-listing-sidebar-post__price">
                                                {{ number_format($valsiml->price, 0, ',', '.') }} VNĐ/Đêm</p>
                                            <h5 class="tour-listing-sidebar-post__link"><a
                                                    href=""> {{ $valsiml->name }}</a>
                                            </h5>
                                            <div class="tour-listing-sidebar-post__location">
                                                <span class="icon-location-1"></span>
                                                <p class="tour-listing-sidebar-post__location-text text-small">
                                                    {{ $valsiml->objCategory->name }}
                                                </p>
                                            </div>
                                        </div>
                                        </li>
                                        {{--                                        </li> --}}
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                                data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Bài Viết
                                    Liên
                                    Quan
                                </h3>
                                <ul class="tour-listing-sidebar-post">
                                    @foreach ($blog_list as $valSml)
                                        <li class="sidebar-blog__posts-item">
                                            <div class="sidebar-blog__posts-image">
                                                <img src="{{ $valSml->imgBanner }}" alt="latest-post">
                                            </div><!-- /.sidebar-blog__posts-image -->
                                            <div class="sidebar-blog__posts-content">
                                                <p class="sidebar-blog__posts-date">
                                                    <i class="far fa-clock"></i>
                                                    {{ Carbon::parse($valSml->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                                </p><!-- /.sidebar__posts-date -->
                                                <h4 class="sidebar-blog__posts-title"><a
                                                        href="{{ route('detailBlog', $valSml->slug) }}">{{ $valSml->name }}</a>
                                                </h4>
                                                <!-- /.sidebar-blog__posts-title -->
                                            </div><!-- /.sidebar-blog__posts-content -->
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div class="col-xl-8">
                        <div class="post-info" style="margin-bottom: 0px;">
                            @php
                                $imageArray = json_decode($objRoom->imageArray, true);
                                $videoArray = json_decode($objRoom->videoArray, true);
                            @endphp
                            <div class="post-category">
                                <h3 class="post-category__title">Ảnh / Video </h3>
                                <div class="post-category__btn-group">
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
                                </div><!-- /.post-category__btn-group -->
                            </div><!-- /.post-category -->

                        </div><!-- /.post-info -->
                        <div class="tour-listing-details__explore">
                            <div class="wow animated fadeIn" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <h3 class="tour-listing-details__title tour-listing-details__explore-title">Thông Tin Về
                                    Phòng </h3>
                            </div>
                            <p class="tour-listing-details__explore-text wow animated fadeInUp" data-wow-delay="0.1s"
                                data-wow-duration="1500ms">{!! $objRoom->content !!}
                            </p>
                        </div><!-- /.tour-listing-details__explore -->
                        <div class="tour-listing-details__included">
                            <h3 class="tour-listing-details__title tour-listing-details__included-title">Về Chúng Tôi
                            </h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-7 wow animated fadeInUp" data-wow-delay="0.1s"
                                    data-wow-duration="1500ms">
                                    <ul class="tour-listing-details__included-list-one">
                                        <li>
                                            <i class="fas fa-check-circle"></i>
                                            <p>Đảm Bảo Giá Tốt Nhất</p>
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle"></i>
                                            <p>Đặt Chỗ Dễ Dàng</p>
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle"></i>
                                            <p> An Toàn Luôn Là Trên Hết</p>
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle"></i>
                                            <p> Chuyến Tham Quan Tốt Nhất</p>
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle"></i>
                                            <p> Hướng Dẫn Có Kinh Nghiệm</p>
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle"></i>
                                            <p>Tỷ Lệ Khách Hài Lòng 88,9 %</p>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="tour-listing-details__reviews ">
                            <h3 class="tour-listing-details__reviews-title tour-listing-details__title ">
                                Đánh Giá Của Khách Hàng
                            </h3>
                            @if ($listCommentRoom && count($listCommentRoom) > 0)
                            <div class="tour-listing-details__reviews-comment">
                                @foreach ($listCommentRoom as $listCmt)
                                    <div class="tour-listing-details__reviews-comment-box">
                                        <div class="tour-listing-details__reviews-image wow animated fadeInUp"
                                             data-wow-delay="0.1s" data-wow-duration="1500ms">
                                            <img src="{{asset('assets/images/user/avatar-2.jpg')}}" alt="{{ $listCmt->name }}">
                                        </div><!-- /."tour-listing-details__reviews-image -->
                                        <div class="tour-listing-details__reviews-content wow animated fadeInUp" style="padding: 0px 15px;"
                                             data-wow-delay="0.3s" data-wow-duration="1500ms">
                                            <div class="tour-listing-details__reviews-inner-content">
                                                <div class="tour-listing-details__reviews-info">
                                                    <h3 class="tour-listing-details__reviews-name">
                                                     {{ $listCmt->name }}</h3>
                                               </div><!-- /.tour-listing-details__reviews-info -->
                                            </div><!-- /.tour-listing-details__reviews-inner-content -->
                                            <p class="tour-listing-details__reviews-text" style="margin-bottom: 0px;">
                                                {{ $listCmt->commentUser }}
                                            </p>
                                        </div><!-- /.tour-listing-details__reviews-content -->
                                    </div><!-- /.tour-listing-details__reviews-comment-box -->
                                    
                                    <div class="tour-listing-details__reviews-comment-box">
                                        <div class="tour-listing-details__reviews-image wow animated fadeInUp"
                                             data-wow-delay="0.1s" data-wow-duration="1500ms">
                                            <img src="{{asset('assets/images/user/avatar-2.jpg')}}" alt="Tổng Đài Độc Lạ Tây Bắc">
                                        </div><!-- /."tour-listing-details__reviews-image -->
                                        <div class="tour-listing-details__reviews-content wow animated fadeInUp" style="padding: 0px 15px;"
                                             data-wow-delay="0.3s" data-wow-duration="1500ms">
                                            <div class="tour-listing-details__reviews-inner-content">
                                                <div class="tour-listing-details__reviews-info">
                                                    <h3 class="tour-listing-details__reviews-name">
                                                       Tổng Đài Độc Lạ Tây Bắc</h3>
                                                </div><!-- /.tour-listing-details__reviews-info -->
                                            </div><!-- /.tour-listing-details__reviews-inner-content -->
                                            <p class="tour-listing-details__reviews-text" style="margin-bottom: 0px;">
                                                {{ $listCmt->commentAdmin }}
                                            </p>
                                        </div><!-- /.tour-listing-details__reviews-content -->
                                    </div><!-- /.tour-listing-details__reviews-comment-box -->
                                
                                @endforeach
                                @endif
                            </div>
                        </div>
                    <div class="tour-listing-details__add-review mobile-review">
                        <h3 class="tour-listing-details__add-review-title tour-listing-details__title">Để Lại Đánh
                            Giá Của Bạn
                        </h3>
                    </div>
                    <div class="tour-listing-details__form">
                        <form class="form-one row gutter-20" method="POST"
                              action="{{ route('create_comment_tour', ['slug' => $objRoom->slug]) }}">
                            @csrf
                            <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0s"
                                 data-wow-duration="1500ms">
                                <div class="form-one__group">
                                    <input type="text" name="name" id="form-one-name-input"
                                           placeholder="Họ và tên" class="form-one__input"
                                           value="{{ old('name') }}">

                                    @error('name')
                                    <small style="color: #f33923;">{{ $message }}</small>
                                    @enderror
                                </div><!-- /.form-one__group -->
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s"
                                 data-wow-duration="1500ms">
                                <div class="form-one__group">
                                    <input type="email" name="email" id="form-one-email-input"
                                           placeholder="Email" class="form-one__input" value="{{ old('email') }}">
                                </div><!-- /.form-one__group -->
                            </div><!-- /.col-md-6 -->
                            <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s"
                                 data-wow-duration="1500ms">
                                <div class="form-one__group">
                                    <textarea name="commentUser" id="form-one-message-input" cols="30" rows="10"
                                              placeholder="Viết tâm thư"
                                              class="form-one__message form-one__input">{{ old('commentUser') ?? 'Nội Dung Bài Viết' }}</textarea>
                                    @error('commentUser')
                                    <small style="color: #f33923;">{{ $message }}</small>
                                    @enderror
                                </div><!-- /.form-one__group -->
                            </div><!-- /.col-12-->
                            <input type="hidden" name="idTour" value="{{ $objRoom->id }}">
                            <input type="hidden" name="status" value="{{ $objRoom->status ?? 0 }}">
                            <div class="col-12 wow animated fadeInUp" data-wow-delay="0.2s"
                                 data-wow-duration="1500ms">
                                <div class="form-one__btn-box">
                                    <button type="submit" class="form-one__btn trevlo-btn trevlo-btn--base">
                                        <span>Gửi tin nhắn</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                        <div class="tour-listing-details__similar container-fluid row-room-list-mobile">
                            <h3 class="tour-listing-details__title tour-listing-details__similar-title">Phòng Liên
                                Quan</h3>
                            <div class="row">
                                @foreach ($room_list as $valueRoom)
                                    @php

                                        $imageArray = json_decode($valueRoom->imageArray, true);
                                        $videoArray = json_decode($valueRoom->videoArray, true);
                                    @endphp
                                    <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s"
                                        data-wow-duration="1500ms">
                                        <div class="tour-listing-three__card tour-listing__card">
                                            <a href=""
                                                class="tour-listing-three__card-image-box tour-listing__card-image-box">
                                                <img src="{{ $valueRoom->imgRoom }}"
                                                    class="tour-listing-three__card-image tour-listing__card-image">
                                                <div
                                                    class="tour-listing-three__card-image-overlay tour-listing__card-image-overlay">
                                                </div><!-- /.tour-listing__card-image-overlay -->
                                            </a><!-- /.tour-listing__card-image-box -->
                                            <a href="#"
                                                class="tour-listing-three__card-wishlist tour-listing__card-wishlist"><span
                                                    class="icon-heart"></span></a>
                                            <div class="tour-listing-three__card-content tour-listing__card-content">
                                                <h3 class="tour-listing-three__card-title tour-listing__card-title"><a
                                                        href="{{ route('detailTour', $valueRoom->slug) }}">{{ $valueRoom->code }}</a>
                                                </h3>
                                                <div
                                                    class="tour-listing-three__card-inner-content tour-listing__card-inner-content">
                                                    <div class="tour-listing__card-camera-group">
                                                        <a href="javascript:void(0);"
                                                            class="tour-listing-five__card__popup-btn trevlo-image-popup tour-listing__card-camera-btn trevlo-image-popup"
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
                                                            class="tour-listing-five__card__popup-btn trevlo-image-popup tour-listing__card-camera-btn trevlo-image-popup"
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
                                                    </div><!-- /.tour-listing__card-camera-group -->
                                                    <div class="tour-listing-three__card-top-content">
                                                        <div class="tour-listing__card-location-box">
                                                            <span class="icon-location-1"></span>
                                                            <p class="tour-listing__card-location-text text-small">
                                                                {{ $valueRoom->objCategory->name }}
                                                            </p>
                                                        </div><!-- /.tour-listing__card-location-box -->
                                                    </div><!-- /.tour-listing-three__card-top-content -->
                                                    <div
                                                        class="tour-listing-three__card-divider tour-listing__card-divider">
                                                    </div>
                                                    <!-- /.tour-listing__card-divider -->
                                                    <div class="tour-listing__card-bottom">
                                                        <div class="tour-listing__card-bottom-left">
                                                            <div class="tour-listing__card-day">

                                                            </div><!-- /.tour-listing__card-day -->
                                                        </div><!-- /.tour-listing__card-bottom-left -->
                                                        <div class="tour-listing__card-bottom-right">
                                                            <h4 class="tour-listing__card-price">
                                                                {{ number_format($valueRoom->price, 0, ',', '.') }}
                                                                vnđ</h4>
                                                        </div><!-- /.tour-listing__card-bottom-right -->
                                                    </div><!-- /.tour-listing__card-bottom -->
                                                </div><!-- /.tour-listing__card-inner-content -->
                                            </div><!-- /.tour-listing__card-content -->
                                        </div><!-- /.tour-listing__card -->

                                    </div><!-- /.col-12 -->
                                @endforeach
                            </div><!-- /.row -->
                        </div><!-- /.tour-listing-details__similar container-fluid -->
                        <div class="tour-listing-details__similar container-fluid list-room-mobile ">
                            <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                                data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Phòng Liên
                                    Quan
                                </h3>
                                <ul class="tour-listing-sidebar-post">
                                    @foreach ($room_list as $obj)
                                        <li class="tour-listing-sidebar-post__item">
                                            <div class="tour-listing-sidebar-post__image">
                                                <img src="{{ $obj->imgRoom }}" alt="{{ $obj->name }}">
                                            </div>
                                            <div class="tour-listing-sidebar-post__content">
                                                <p class="tour-listing-sidebar-post__price">
                                                    {{ number_format($obj->price, 0, ',', '.') }}vnđ</p>
                                                <h5 class="tour-listing-sidebar-post__link"><a
                                                        href="">{{ $obj->name }}</a>
                                                </h5>

                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!-- /.tour-listing-details__similar container-fluid -->

                    </div>
                </div>
            </div>
        </div>

    </section>

    {{--    </section> --}}
@stop
