@extends ('Home.master')
@section('css_view')
    <style>
        .truncate-content {
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Number of lines to show */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }
    </style>
@show

@php
    use Carbon\Carbon;

    $slugCategory = isset($objCategory) ? $objCategory : '';
@endphp

@section('view')
    <section class="page-header">
        <div class="page-header__bg"></div>
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
                                <h4 class="sidebar-blog__title">Bài Tuyển dụng Mới Nhất</h4>
                                <ul class="sidebar-blog__posts">
                                    @foreach ($recruitment_new as $valNew)
                                        <li class="sidebar-blog__posts-item">
                                            <div class="sidebar-blog__posts-content">
                                                <p class="sidebar-blog__posts-date">
                                                    <i class="far fa-clock"></i>
                                                    {{ Carbon::parse($valNew->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                                </p>
                                                <h4 class="sidebar-blog__posts-title"><a
                                                        href="{{ route('detailBlog', $valNew->slug) }}">{{ $valNew->title }}</a>
                                                </h4>
                                                <p class="truncate-content">{!! strip_tags($valNew->content) !!}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp left-controller-tour-new mt-4"
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

                        </aside>
                    </div>
                </div>

                <div class="col-xl-8 col-12 right-controller">
                    <div class="tour-listing-filter__row row tour-list-pc">
                        @foreach ($recruitment_list as $valueRec)
                            <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <div class="tour-listing-three__card tour-listing__card">
                                    <div class="tour-listing-three__card-content tour-listing__card-content">
                                        <h3 class="tour-listing-three__card-title tour-listing__card-title">
                                            <a href="{{ route('detailRecruitment', $valueRec->slug) }}">{{ $valueRec->title }}</a>
                                        </h3>
                                        <p class="truncate-content">{!! strip_tags($valueRec->content) !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="tour-listing-filter__row row tour-list-mobile">
                        <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                             data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Bài Tuyển Dụng
                                Mới Nhất</h3>
                            <ul class="tour-listing-sidebar-post">
                                @foreach ($recruitment_list as $valueRec)
                                    <li class="tour-listing-sidebar-post__item">
                                        <div class="tour-listing-sidebar-post__content">
                                            <h5 class="tour-listing-sidebar-post__link"><a
                                                    href="{{ route('detailRecruitment', $valueRec->slug) }}">{{ $valueRec->title }}</a>
                                            </h5>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <ul class="post-pagination @@extraClassName">
                        @if (ceil($recruitment_list->total() / 8) > 1)
                            @php
                                $current_page = request()->get('page', 1);
                                $maxPage = ceil($recruitment_list->total() / 12);
                            @endphp
                            @if ($current_page > 1)
                                <li>
                                    <a href="?page={{ $current_page - 1 }}" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                    </a>
                                </li>
                            @endif

                            @for ($i = max(1, $current_page - 1); $i <= min($maxPage, $current_page + 2); $i++)
                                <li>
                                    <a class="{{ $i == $recruitment_list->currentPage() ? 'active' : '' }}"
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
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
