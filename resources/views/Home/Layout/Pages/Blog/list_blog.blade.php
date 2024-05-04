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
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Bài Viết</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    @if($slugCategory)
                        <li>Bài Viết</li>
                        <li>Danh Mục</li>
                        <li>{{$slugCategory->name}}</li>
                    @else
                        <li>Bài Viết</li>
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
                                <h4 class="sidebar-blog__title">Bài Viết Mới Nhất</h4><!-- /.sidebar-blog__title -->
                                <ul class="sidebar-blog__posts ">
                                    @foreach ($blog_new as $valNew)
                                        <li class="sidebar-blog__posts-item">
                                            <div class="sidebar-blog__posts-image">
                                                <img src="{{ $valNew->imgBanner }}" alt="latest-post">
                                            </div><!-- /.sidebar-blog__posts-image -->
                                            <div class="sidebar-blog__posts-content">
                                                <p class="sidebar-blog__posts-date">
                                                    <i class="far fa-clock"></i>
                                                    {{ Carbon::parse($valNew->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                                </p><!-- /.sidebar__posts-date -->
                                                <h4 class="sidebar-blog__posts-title"><a
                                                        href="blog-details-right.html">{{ $valNew->name }}</a></h4>
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
                                        <li><a href="{{ route('listBlog_Category', $cat->slug) }}">{{ $cat->name }}</a></li>
                                    @endforeach


                                </ul><!-- /.sidebar-blog__categories  -->
                            </div>
                            <!-- /.sidebar-blog__single -->
                            <!-- /.sidebar-blog__single -->
                            <!-- /.sidebar-blog__single -->
                        </aside><!-- /.widget-area -->
                    </div><!-- /.sidebar-blog -->
                </div><!-- /.col-xl-4 col-lg-5 -->
                <div class="blog-page__col-blog-card col-xl-8 col-lg-7">
                    <div class="blog-page__container container-fluid">
                        <div class="row">
                            @foreach ($blog_list as $valueBlog)
                                <div class="col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
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

                        <ul class="post-pagination @@extraClassName">
                            @if (ceil($blog_list->total() / 8) > 1)
                                <?php
                                $current_page = isset($_GET['page']) ? $_GET['page'] : '1';
                                $page = $current_page - 1;
                                $pages = $current_page + 1;
                                $maxPage = ceil($blog_list->total() / 8);
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
                                        <a class="{{ $i == $searchResult->currentPage() ? 'active' : '' }}" href="?page={{ $i }}">{{ $i }}</a>
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
                    </div><!-- /.blog-page__container container-fluid -->
                </div><!-- /.col-xl-8 col-lg-7 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-page -->
    <!-- Blog Page End -->
@stop
