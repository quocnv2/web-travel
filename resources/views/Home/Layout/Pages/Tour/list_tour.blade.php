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
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Danh Sách
                Tour</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    @if($slugCategory)
                        <li><a href="{{ route('listTour') }}">Tour</a></li>
                        <li><a href="{{ route('listTour_Category', $slugCategory->slug) }}">Danh Mục</a></li>
                    <li>{{$slugCategory->name}}</li>
                    @else
                        <li><a href="{{ route('listTour') }}">Tour</a></li>
                    @endif
                </ul><!-- /.trevlo-breadcrumb -->
            </div><!-- /.page-header__breadcrumb-box -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <!-- Tour Listing List Style Page Start -->
    <section class="tour-listing-style tour-listing section-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-12 left-controller">
                    <aside class="tour-listing-sidebar">
                        <form action="#"
                            class="tour-listing-sidebar__form tour-listing-sidebar__item wow animated fadeInUp"
                            data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <div class="sidebar-blog__single sidebar-blog__single--categories wow animated fadeInUp"
                                data-wow-delay="0.2s" data-wow-duration="1500ms">
                                <h4 class="sidebar-blog__title">Danh Mục</h4><!-- /.sidebar-blog__title -->
                                <ul class="sidebar-blog__categories ">
                                    @foreach ($categories as $cat)
                                        <li><a href="{{ route('listTour_Category', $cat->slug) }}">{{ $cat->name }}</a>
                                        </li>
                                    @endforeach
                                </ul><!-- /.sidebar-blog__categories  -->
                            </div>
                        </form><!-- /.tour-listing-sidebar__form tour-listing-sidebar__item -->
                        <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp left-controller-tour-new"
                            data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Tour Mới Nhất</h3>
                            <ul class="tour-listing-sidebar-post">
                                @foreach ($tour as $valueNewtour)
                                    @php
                                        $address = '';
                                        if (isset($valueNewtour->province)) {
                                            $address .= $valueNewtour->province;
                                        }
                                        if (isset($valueNewtour->district)) {
                                            if ($address !== '') {
                                                $address .= ' - ';
                                            }
                                            $address .= $valueNewtour->district;
                                        }

                                        // Kiểm tra và thêm thông tin phường xã
                                        if (isset($valueNewtour->wards)) {
                                            if ($address !== '') {
                                                $address .= ' - ';
                                            }
                                            $address .= $valueNewtour->wards;
                                        }
                                    @endphp
                                    <li class="tour-listing-sidebar-post__item">
                                        <div class="tour-listing-sidebar-post__image">
                                            <img src="{{ $valueNewtour->imgBanner }}" alt="{{$valueNewtour->name }}">
                                        </div>
                                        <div class="tour-listing-sidebar-post__content">
                                            <p class="tour-listing-sidebar-post__price">
                                                {{ number_format($valueNewtour->price, 0, ',', '.') }} VND</p>
                                            <h5 class="tour-listing-sidebar-post__link"><a
                                                    href="">{{ $valueNewtour->name }}</a>
                                            </h5>
                                            <div class="tour-listing-sidebar-post__location">
                                                <span class="icon-location-1"></span>
                                                <p class="tour-listing-sidebar-post__location-text text-small">
                                                    {{ $valueNewtour->objCategory->name }}
                                                </p>
                                            </div>

                                        </div>
                                @endforeach
                                </li>
                            </ul>
                        </div><!-- /.tour-listing-sidebar__post-box tour-listing-sidebar__item -->
                        <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp left-controller-tour-story"
                            data-wow-delay="0.1s" data-wow-duration="1500ms">

                            <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Tour Đã Xem</h3>
                            <ul class="tour-listing-sidebar-post">
                                @foreach ($historyTour as $key => $valueHistory)
                                    @php
                                        $addressHitory = '';
                                        if (isset($valueHistory['province'])) {
                                            $addressHitory .= $valueHistory['province'];
                                        }
                                        if (isset($valueHistory['district'])) {
                                            if ($address !== '') {
                                                $addressHitory .= ' - ';
                                            }
                                            $addressHitory .= $valueHistory['district'];
                                        }

                                        // Kiểm tra và thêm thông tin phường xã
                                        if (isset($valueHistory['wards'])) {
                                            if ($addressHitory !== '') {
                                                $addressHitory .= ' - ';
                                            }
                                            $addressHitory .= $valueHistory['wards'];
                                        }
                                    @endphp
                                    <li class="tour-listing-sidebar-post__item">
                                        <div class="tour-listing-sidebar-post__image">
                                            <img src="{{$valueHistory['imgBanner']}}" alt="{{ $valueHistory['name'] }}">
                                        </div>
                                        <div class="tour-listing-sidebar-post__content">
                                            <p class="tour-listing-sidebar-post__price">
                                                {{ number_format($valueHistory['price'], 0, ',', '.') }} VND</p>
                                            <h5 class="tour-listing-sidebar-post__link"><a
                                                    href="">{{ $valueHistory['name'] }}</a>
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
                        </div><!-- /.tour-listing-sidebar__post-box tour-listing-sidebar__item -->
                    </aside><!-- /.tour-listing-sidebar -->
                </div><!-- /.col-xl-4 -->
                <div class="col-xl-8 col-12 right-controller">
                    <div class="tour-listing-filter__row row tour-list-pc">
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
                        @foreach ($tourlist as $valueTour)
                            @php
                                $addresssss = '';
                                if (isset($valueTour->province)) {
                                    $addresssss .= $valueTour->province;
                                }
                                if (isset($valueTour->district)) {
                                    if ($addresssss !== '') {
                                        $addresssss .= ' - ';
                                    }
                                    $addresssss .= $valueTour->district;
                                }

                                // Kiểm tra và thêm thông tin phường xã
                                if (isset($valueTour->wards)) {
                                    if ($addresssss !== '') {
                                        $addresssss .= ' - ';
                                    }
                                    $addresssss .= $valueTour->wards;
                                }

                                $imageArray = json_decode($valueTour->imageArray, true);
                                $videoArray = json_decode($valueTour->videoArray, true);
                            @endphp
                            <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <div class="tour-listing-three__card tour-listing__card">
                                    <a href=""
                                        class="tour-listing-three__card-image-box tour-listing__card-image-box">
                                        <img src="{{ $valueTour->imgBanner }}" alt="{{ $valueTour->name }}"
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
                                                href="{{route('detailTour', $valueTour->slug)}}">( Mã Tour: {{$valueTour->code}} ) {{ $valueTour->name }}</a></h3>
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
                                                        Tour {{ $valueTour->objCategory->name }}
                                                    </p>
                                                </div><!-- /.tour-listing__card-location-box -->
                                            </div><!-- /.tour-listing-three__card-top-content -->
                                            <div class="tour-listing-three__card-divider tour-listing__card-divider"></div>
                                            <!-- /.tour-listing__card-divider -->
                                            <div class="tour-listing__card-bottom">
                                                <div class="tour-listing__card-bottom-left">
                                                    <div class="tour-listing__card-day">
                                                        <p class="tour-listing__card-day-text text-small">
                                                            {{ $addresssss }}
                                                        </p>
                                                    </div><!-- /.tour-listing__card-day -->
                                                </div><!-- /.tour-listing__card-bottom-left -->
                                                <div class="tour-listing__card-bottom-right">
                                                    <h4 class="tour-listing__card-price">
                                                        {{ number_format($valueTour->price, 0, ',', '.') }} VND</h4>
                                                </div><!-- /.tour-listing__card-bottom-right -->
                                            </div><!-- /.tour-listing__card-bottom -->
                                        </div><!-- /.tour-listing__card-inner-content -->
                                    </div><!-- /.tour-listing__card-content -->
                                </div><!-- /.tour-listing__card -->
                            </div><!-- /.col-12 -->
                        @endforeach
                    </div><!-- /.row -->
                    <div class="tour-listing-filter__row row tour-list-mobile">
                        <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                            data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Tour Mới Nhất</h3>
                            <ul class="tour-listing-sidebar-post">
                                @foreach ($tourlist as $valueNewtour)
                                    @php
                                        $address = '';
                                        if (isset($valueNewtour->province)) {
                                            $address .= $valueNewtour->province;
                                        }
                                        if (isset($valueNewtour->district)) {
                                            if ($address !== '') {
                                                $address .= ' - ';
                                            }
                                            $address .= $valueNewtour->district;
                                        }

                                        // Kiểm tra và thêm thông tin phường xã
                                        if (isset($valueNewtour->wards)) {
                                            if ($address !== '') {
                                                $address .= ' - ';
                                            }
                                            $address .= $valueNewtour->wards;
                                        }
                                    @endphp
                                    <li class="tour-listing-sidebar-post__item">
                                        <div class="tour-listing-sidebar-post__image">
                                            <img src="{{ $valueNewtour->imgBanner }}" alt="{{$valueNewtour->name }}">
                                        </div>
                                        <div class="tour-listing-sidebar-post__content">
                                            <p class="tour-listing-sidebar-post__price">
                                                {{ number_format($valueNewtour->price, 0, ',', '.') }} VND</p>
                                            <h5 class="tour-listing-sidebar-post__link"><a
                                                    href="{{route('detailTour', $valueTour->slug)}}">{{ $valueNewtour->name }}</a>
                                            </h5>
                                            <div class="tour-listing-sidebar-post__location">
                                                <span class="icon-location-1"></span>
                                                <p class="tour-listing-sidebar-post__location-text text-small">
                                                    {{ $valueNewtour->objCategory->name }}
                                                </p>
                                            </div>

                                        </div>
                                @endforeach
                                </li>
                            </ul>
                        </div><!-- /.tour-listing-sidebar__post-box tour-listing-sidebar__item -->
                    </div><!-- /.row -->
                    <ul class="post-pagination @@extraClassName">
                        @if (ceil($tourlist->total() / 8) > 1)
                            <?php
                            $current_page = isset($_GET['page']) ? $_GET['page'] : '1';
                            $page = $current_page - 1;
                            $pages = $current_page + 1;
                            $maxPage = ceil($tourlist->total() / 12);
                            $check = $current_page;
                            ?>
                            @if ($current_page > 1)
                                <li>
                                    <a href="?page={{ $current_page + 1 }}" aria-label="Next">
                                        <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                    </a>
                                </li>
                            @endif

                            @for ($i = max(1, $current_page - 1); $i <= min($maxPage, $current_page + 2); $i++)
                                <li>
                                    <a class="{{ $i == $searchResult->currentPage() ? 'active' : '' }}"
                                        href="?page={{ $i }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($current_page < $maxPage)
                                <li>
                                    <a href="?page={{ $current_page + 1 }}" aria-label="Next">
                                        <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                                    </a>
                                </li>
                            @endif
                        @else
                        @endif
                    </ul><!-- /.post-pagination -->
                </div><!-- /.col-xl-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- TTour Listing List Style Page End -->
@stop
