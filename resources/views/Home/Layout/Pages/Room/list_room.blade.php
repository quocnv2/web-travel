@extends ('Home.master')
@php
    use Carbon\Carbon;

    $slugCategory = isset($objCategory) ? $objCategory : ''
@endphp
@section('view')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Bài
                Viết</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    @if($slugCategory)
                        <li>Phòng</li>
                        <li>Danh Mục</li>
                        <li>{{$slugCategory->name}}</li>
                    @else
                        <li>Phòng</li>
                    @endif

                </ul><!-- /.trevlo-breadcrumb -->
            </div><!-- /.page-header__breadcrumb-box -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <!-- Blog Page Start -->
    <div class="blog-page section-space">
        <div class="container">
            <div class="row">
                <div class="blog-page__col-sidebar col-xl-4 col-lg-5">
                    <div class="sidebar-blog sidebar-blog--left">
                        <aside class="widget-area">
                            <div class="sidebar-blog__single sidebar-blog__single--posts wow animated fadeInUp"
                                 data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <h4 class="sidebar-blog__title">Phòng Mới Nhất</h4><!-- /.sidebar-blog__title -->
                                <ul class="sidebar-blog__posts ">
                                    @foreach ($room_new as $valNew)
                                        <li class="sidebar-blog__posts-item">
                                            <div class="sidebar-blog__posts-image">
                                                <img src="{{ $valNew->imgRoom }}" alt="latest-post">
                                            </div><!-- /.sidebar-blog__posts-image -->
                                            <div class="sidebar-blog__posts-content">
                                                <p class="sidebar-blog__posts-date">
                                                    <i class="far fa-clock"></i>
                                                    {{ Carbon::parse($valNew->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                                </p><!-- /.sidebar__posts-date -->
                                                <h4 class="sidebar-blog__posts-title"><a
                                                        href="{{route('detailRoom', $valNew->slug)}}">{{ $valNew->name }}</a></h4>
                                                <!-- /.sidebar-blog__posts-title -->
                                            </div><!-- /.sidebar-blog__posts-content -->
                                        </li>
                                    @endforeach
                                </ul><!-- /.sidebar-blog__posts  -->
                            </div><!-- /.sidebar-blog__single -->
                            <div class="sidebar-blog__single sidebar-blog__single--categories wow animated fadeInUp"
                                 data-wow-delay="0.2s" data-wow-duration="1500ms">
                                <h4 class="sidebar-blog__title">Danh Mục</h4><!-- /.sidebar-blog__title -->
                                <ul class="sidebar-blog__categories ">
                                    @foreach ($categories as $cat)
                                        <li><a href="{{ route('listRoom_Category', $cat->slug) }}">{{ $cat->name }}</a>
                                        </li>
                                    @endforeach


                                </ul><!-- /.sidebar-blog__categories  -->
                            </div>
                            <!-- /.sidebar-blog__single -->
                            <!-- /.sidebar-blog__single -->
                            <!-- /.sidebar-blog__single -->
                        </aside><!-- /.widget-area -->
                    </div><!-- /.sidebar-blog -->
                </div><!-- /.col-xl-4 col-lg-5 -->

                <div class="col-xl-8">
                    <div class="tour-listing-filter__row row">
                        <div class="col-12">
                            <div class="showing-result tour-listing-one__showing-result">
                                <div class="showing-result__info-top">
                                    <div class="showing-result__sort">
                                        <select class="selectpicker" aria-label="Sort by popular">
                                            <option selected>Sắp Xếp</option>
                                            <option value="1">Giá Tăng Dần</option>
                                            <option value="2">Giá Giảm Dần</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- /.showing-result -->
                        </div><!-- /.col-12 -->
                        @foreach ($room_list as $valueRoom)
                            @php
                                $imageArray = json_decode($valueRoom->imageArray, true);
                                $videoArray = json_decode($valueRoom->videoArray, true);
                            @endphp
                            <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <div class="tour-listing-three__card tour-listing__card">
                                    <a href="{{route('detailRoom', $valNew->slug)}}"
                                       class="tour-listing-three__card-image-box tour-listing__card-image-box">
                                        <img src="{{ $valueRoom->imgRoom }}" alt="{{ $valueRoom->name }}"
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
                                                href="{{route('detailRoom', $valNew->slug)}}">{{ $valueRoom->name }}</a></h3>
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
                                            <div class="tour-listing-three__card-divider tour-listing__card-divider"></div>
                                            <!-- /.tour-listing__card-divider -->
                                            <div class="tour-listing__card-bottom">
                                                <div class="tour-listing__card-bottom-left">
                                                    <div class="tour-listing__card-day">
                                                        <p class="tour-listing__card-day-text text-small">
                                                            Tour {{ $valueRoom->objCategory->name }}
                                                        </p>
                                                    </div><!-- /.tour-listing__card-day -->
                                                </div><!-- /.tour-listing__card-bottom-left -->
                                                <div class="tour-listing__card-bottom-right">
                                                    <h4 class="tour-listing__card-price">
                                                        {{ number_format($valueRoom->price, 0, ',', '.') }}vnđ</h4>
                                                </div><!-- /.tour-listing__card-bottom-right -->
                                            </div><!-- /.tour-listing__card-bottom -->
                                        </div><!-- /.tour-listing__card-inner-content -->
                                    </div><!-- /.tour-listing__card-content -->
                                </div><!-- /.tour-listing__card -->

                            </div><!-- /.col-12 -->
                        @endforeach
                    </div><!-- /.row -->
                </div><!-- /.col-xl-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-page -->
    <!-- Blog Page End -->
@stop
