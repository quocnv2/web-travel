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
                                <span>{{ number_format($objRoom->price, 0, ',', '.') }} VND</span><span
                                    class="tour-listing-details__dastination-person">/ Đêm</span>
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
                                                    {{ number_format($valueHistory['price'], 0, ',', '.') }} VNĐ/
                                                    Đêm</p>
                                                <h5 class="tour-listing-sidebar-post__link"><a
                                                        href="{{ route('detailRoom', $valueHistory['slug']) }}">
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
                                                    {{ number_format($valRNew->price, 0, ',', '.') }} VNĐ/ Đêm</p>
                                                <h5 class="tour-listing-sidebar-post__link"><a
                                                        href="{{ route('detailRoom', $valRNew->slug) }}">{{ $valRNew->name }}</a>
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
                                    @foreach ($tour_list as $tourNew)
                                        <li class="tour-listing-sidebar-post__item">
                                            <div class="tour-listing-sidebar-post__image">
                                                <img src="{{ $tourNew->imgBanner }}" alt="{{ $tourNew->name }}">
                                            </div>
                                            <div class="tour-listing-sidebar-post__content">
                                                <p class="tour-listing-sidebar-post__price">
                                                    {{ number_format($tourNew->price, 0, ',', '.') }} VNĐ</p>
                                                <h5 class="tour-listing-sidebar-post__link"><a
                                                        href="{{ route('detailTour', $tourNew->slug) }}">
                                                        {{ $tourNew->name }}</a>
                                                </h5>
                                                <div class="tour-listing-sidebar-post__location">
                                                    <span class="icon-location-1"></span>
                                                    <p class="tour-listing-sidebar-post__location-text text-small">
                                                        {{ $tourNew->objCategory->name }}
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
                                    @foreach ($blog_list as $blogsml)
                                        <li class="sidebar-blog__posts-item">
                                            <div class="sidebar-blog__posts-image">
                                                <img src="{{ $blogsml->imgBanner }}" alt="latest-post">
                                            </div><!-- /.sidebar-blog__posts-image -->
                                            <div class="sidebar-blog__posts-content">
                                                <p class="sidebar-blog__posts-date">
                                                    <i class="far fa-clock"></i>
                                                    {{ Carbon::parse($blogsml->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                                </p><!-- /.sidebar__posts-date -->
                                                <h4 class="sidebar-blog__posts-title"><a
                                                        href="{{ route('detailBlog', $blogsml->slug) }}">{{ $blogsml->name }}</a>
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
                                    </ul><!-- /.tour-listing-details__included-list-one -->
                                </div><!-- /.col-lg-6 col-md-7 -->
                            </div><!-- /.row -->
                        </div><!-- /.tour-listing-details__included -->
                        <div class="tour-listing-details__reviews ">
                            <h3 class="tour-listing-details__reviews-title tour-listing-details__title ">
                                Đánh Giá Của Khách Hàng
                            </h3>
                            @foreach ($listCommentRoom as $comment)
                                @if ($comment->status == 0)
                                    <div class="tour-listing-details__reviews-comment">
                                        <div class="tour-listing-details__reviews-comment-box">
                                            <div class="tour-listing-details__reviews-image wow animated fadeInUp"
                                                data-wow-delay="0.1s" data-wow-duration="1500ms">
                                                <img src="{{ asset('assets/images/user/avatar-2.jpg') }}"
                                                    alt="{{ $comment->name }}">
                                            </div><!-- /."tour-listing-details__reviews-image -->
                                            <div class="tour-listing-details__reviews-content wow animated fadeInUp"
                                                style="padding: 0px 15px;" data-wow-delay="0.3s"
                                                data-wow-duration="1500ms">
                                                <div class="tour-listing-details__reviews-inner-content">
                                                    <div class="tour-listing-details__reviews-info">
                                                        <h3 class="tour-listing-details__reviews-name">
                                                            {{ $comment->name }}</h3>
                                                    </div><!-- /.tour-listing-details__reviews-info -->
                                                </div><!-- /.tour-listing-details__reviews-inner-content -->
                                                <p class="tour-listing-details__reviews-text" style="margin-bottom: 0px;">
                                                    {{ $comment->commentUser }}
                                                </p>
                                            </div><!-- /.tour-listing-details__reviews-content -->
                                        </div><!-- /.tour-listing-details__reviews-comment-box -->
                                    @elseif ($comment->status == 1)
                                        <div class="tour-listing-details__reviews-comment-box">
                                            <div class="tour-listing-details__reviews-image wow animated fadeInUp"
                                                data-wow-delay="0.1s" data-wow-duration="1500ms">
                                                <img src="{{ asset('assets/images/user/avatar-2.jpg') }}"
                                                    alt="Tổng Đài Độc Lạ Tây Bắc">
                                            </div><!-- /."tour-listing-details__reviews-image -->
                                            <div class="tour-listing-details__reviews-content wow animated fadeInUp"
                                                style="padding: 0px 15px;" data-wow-delay="0.3s"
                                                data-wow-duration="1500ms">
                                                <div class="tour-listing-details__reviews-inner-content">
                                                    <div class="tour-listing-details__reviews-info">
                                                        <h3 class="tour-listing-details__reviews-name">
                                                            Tổng Đài Độc Lạ Tây Bắc</h3>
                                                    </div><!-- /.tour-listing-details__reviews-info -->
                                                </div><!-- /.tour-listing-details__reviews-inner-content -->
                                                <p class="tour-listing-details__reviews-text" style="margin-bottom: 0px;">
                                                    {{ $comment->commentAdmin }}
                                                </p>
                                            </div><!-- /.tour-listing-details__reviews-content -->
                                        </div><!-- /.tour-listing-details__reviews-comment-box -->
                                @endif
                            @endforeach
                        </div>
                        @if ($listCommentRoom->count() > 2)
                            <div class="form-one__btn-box">
                                <a href="#" class="form-one__btn trevlo-btn trevlo-btn--base view_all_comments">
                                    <span>Xem Thêm</span></a>
                            </div>
                        @endif
                        <div class="tour-listing-details__add-review mobile-review">
                            <h3 class="tour-listing-details__add-review-title tour-listing-details__title">
                                Để Lại Đánh Giá Của Bạn
                            </h3>
                        </div>
                        <div class="tour-listing-details__form">
                            <form class="form-one row gutter-20" method="POST"
                                action="{{ route('create_comment_room', ['slug' => $objRoom->slug]) }}">
                                @csrf
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0s"
                                    data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="text" name="name" id="form-one-name-input"
                                            placeholder="Họ và tên" class="form-one__input" value="{{ old('name') }}">

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
                                        <textarea name="commentUser" id="form-one-message-input" cols="30" rows="10" placeholder="Viết tâm thư"
                                            class="form-one__message form-one__input">{{ old('commentUser') ?? 'Nội Dung Bài Viết' }}</textarea>
                                        @error('commentUser')
                                            <small style="color: #f33923;">{{ $message }}</small>
                                        @enderror
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.col-12-->
                                <input type="hidden" name="idRoom" value="{{ $objRoom->id }}">
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
                            <h3 class="tour-listing-details__title tour-listing-details__similar-title">
                                Phòng Liên
                                Quan</h3>
                            <div class="row">
                                @foreach ($room_list as $list_room)
                                    @php
                                        $imageArray = json_decode($list_room->imageArray, true);
                                        $videoArray = json_decode($list_room->videoArray, true);
                                    @endphp
                                    <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s"
                                        data-wow-duration="1500ms">
                                        <div class="tour-listing-three__card tour-listing__card">
                                            <a href=""
                                                class="tour-listing-three__card-image-box tour-listing__card-image-box">
                                                <img src="{{ $list_room->imgRoom }}"
                                                    class="tour-listing-three__card-image tour-listing__card-image">
                                                <div
                                                    class="tour-listing-three__card-image-overlay tour-listing__card-image-overlay">
                                                </div><!-- /.tour-listing__card-image-overlay -->
                                            </a><!-- /.tour-listing__card-image-box -->
                                            <a href="#"
                                                class="tour-listing-three__card-wishlist tour-listing__card-wishlist"><span
                                                    class="icon-heart"></span></a>
                                            <div class="tour-listing-three__card-content tour-listing__card-content">
                                                <h3 class="tour-listing-three__card-title tour-listing__card-title">
                                                    <a
                                                        href="{{ route('detailTour', $list_room->slug) }}">{{ $list_room->code }}</a>
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
                                                                {{ $list_room->objCategory->name }}
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
                                                                {{ number_format($list_room->price, 0, ',', '.') }}
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
                                <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">
                                    Phòng Liên
                                    Quan
                                </h3>
                                <ul class="tour-listing-sidebar-post">
                                    @foreach ($room_list as $valList)
                                        <li class="tour-listing-sidebar-post__item">
                                            <div class="tour-listing-sidebar-post__image">
                                                <img src="{{ $valList->imgRoom }}" alt="{{ $valList->name }}">
                                            </div>
                                            <div class="tour-listing-sidebar-post__content">
                                                <p class="tour-listing-sidebar-post__price">
                                                    {{ number_format($valList->price, 0, ',', '.') }}vnđ</p>
                                                <h5 class="tour-listing-sidebar-post__link"><a
                                                        href="">{{ $valList->name }}</a>
                                                </h5>

                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <div class="form-one__btn-box">
                                        <button type="submit" class="form-one__btn trevlo-btn trevlo-btn--base">
                                            <span>Xem Thêm</span></button>
                                    </div> --}}
                        </div><!-- /.tour-listing-details__similar container-fluid -->
                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
    <div class="modal fade modal-lg" id="commentRoomModal" tabindex="-1" role="dialog"
        aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Đánh giá của khách hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Content will be loaded dynamically -->
                </div>
            </div>
        </div>
    </div>
    <div id="no__room_comments_modal modal-lg" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="noCommentsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noCommentsLabel">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Không có comment nào ở room này.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Define tourId safely using a ternary operator to check if it's set
            var roomId = {{ isset($objRoom) ? $objRoom->id : 'null' }};

            function fetchComments(page = 1) {
                var url = '/commentRoom?page=' + page;
                if (roomId !== null) {
                    url += '&roomId=' + roomId;
                }

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var html = '';
                        if (response.data.length > 0) {
                            response.data.forEach(function(comment) {
                                html +=
                                    '<div class="d-flex align-items-center" style="padding: 10px; background: aliceblue; border-radius: 10px; margin-bottom: 10px;">' +
                                    '<div class="chat-avatar">' +
                                    '<img class="rounded-circle img-fluid wid-30" src="../assets/images/user/avatar-2.jpg" alt="User image" style="width: 40px; height: 40px;">' +
                                    '</div>' +
                                    '<div class="flex-grow-1 mx-2">' +
                                    '<h5 class="mb-0">' + comment.name + '</h5>' +
                                    '<p class="mb-0">' + comment.commentUser + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="d-flex align-items-center" style="padding: 30px;background: aliceblue; border-radius: 10px; margin-bottom: 10px;">' +
                                    // '<div class="d-flex align-items-start">' +
                                    '<div class="chat-avtar flex-shrink-0"><img class="rounded-circle img-fluid  wid-30" src="../assets/images/user/avatar-1.jpg" style="width: 40px; height: 40px; alt="User image">' +
                                    '<div class="bg-success chat-badge"></div>' +
                                    '</div>' +
                                    '<div class="flex-grow-1 ms-3" style="background: aliceblue; border-radius: 10px; margin-bottom: 10px;">' +
                                    '<h5 class="mb-0">Tổng Đài Độc Lạ Tây Bắc</h5>' +
                                    '<span class="text-sm text-muted">' + comment.commentAdmin +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';


                            });
                            // Pagination should be added even if there's only one page to handle future additions gracefully

                        } else {
                            html = '<p>Không có comment nào ở room này.</p>';
                        }
                        $('#commentRoomModal .modal-body').html(html);
                        $('#commentRoomModal').modal('show');
                    },
                    error: function(xhr) {
                        console.error('Error: ', xhr.responseText);
                    }
                });
            }

            // Bind event handlers for both initial load and pagination
            $(document).on('click', '.view_all_comments', function(event) {
                event.preventDefault();
                fetchComments(); // Initially fetch comments
            });

            $(document).on('click', '.page-link', function(event) {
                event.preventDefault();
                var page = $(this).data('page');
                fetchComments(page);
            });
        });
    </script>
@stop
