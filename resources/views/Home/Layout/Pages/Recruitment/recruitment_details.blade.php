@extends ('Home.master')
@php
    use Carbon\Carbon;
@endphp
@section('view')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Tuyển
                Dụng</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li><a href="{{ route('list_recruitment') }}">Tuyển Dụng</a></li>
                </ul>
            </div>
        </div>
    </section>

    <div class="blog-page section-space">
        <div class="container">
            <div class="row">
                <div class="blog-page__col-sidebar col-xl-4 col-lg-5">
                    <div class="sidebar-blog sidebar-blog--left">
                        <aside class="widget-area">
                            <div class="sidebar-blog__single sidebar-blog__single--categories wow animated fadeInUp"
                                data-wow-delay="0.2s" data-wow-duration="1500ms">
                                <h4 class="sidebar-blog__title">Danh Mục</h4><!-- /.sidebar-blog__title -->
                                <ul class="sidebar-blog__categories ">
                                    @foreach ($categories as $cat)
                                        <li><a href="{{ route('listBlog_Category', $cat->slug) }}">{{ $cat->name }}</a>
                                        </li>
                                    @endforeach
                                </ul><!-- /.sidebar-blog__categories  -->
                            </div>
                            <div class="sidebar-blog__single sidebar-blog__single--posts wow animated fadeInUp"
                                data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <h4 class="sidebar-blog__title">Tuyển Dụng Mới Nhất</h4><!-- /.sidebar-blog__title -->
                                <ul class="sidebar-blog__posts">
                                    @foreach ($rec_new as $valNew)
                                        <li class="sidebar-blog__posts-item">
                                            <div class="sidebar-blog__posts-content">
                                                <p class="sidebar-blog__posts-date">
                                                    <i class="far fa-clock"></i>
                                                    {{ Carbon::parse($valNew->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                                </p><!-- /.sidebar__posts-date -->
                                                <h4 class="sidebar-blog__posts-title">
                                                    <a
                                                        href="{{ route('detail_recruitment', $valNew->slug) }}">{{ $valNew->title }}</a>
                                                </h4>
                                                <div class="recruitment-text">{!! $valNew->content !!}</div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp mt-4 left-controller-tour-new"
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
                                                <img src="{{ $valueNewtour->imgBanner }}" alt="{{ $valueNewtour->name }}">
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
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details">
                        <div class="blog-card-three">
                            <div class="blog__card">
                                <div class="blog__card-content wow animated fadeInUp" data-wow-delay="0.1s"
                                    data-wow-duration="1500ms">
                                    <h3 class="blog__card-title">{{ $objRec->title }}</h3>
                                    <p class="blog__card-text">{!! $objRec->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
