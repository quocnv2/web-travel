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
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Tour</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    @if($slugCategory)
                        <li>Tour</li>
                        <li>Danh Mục</li>
                        <li>{{$slugCategory->name}}</li>
                    @else
                        <li>Tour</li>
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
                                <h4 class="sidebar-blog__title">Tour Mới Nhất</h4><!-- /.sidebar-blog__title -->
                                <ul class="sidebar-blog__posts ">
                                    @foreach ($tour_new as $valNew)
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
                                                        href="">{{ $valNew->name }}</a></h4>
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
                                        <li><a href="{{ route('listBlog_Category', $cat->slug) }}">{{ $cat->name }}</a>
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

                <div class="blog-page__col-blog-card col-xl-8 col-lg-7">
                <div class="blog-page__container container-fluid">
                    <div class="row">
                        @foreach ($blog_list as $valueTour)
                            <div class="col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                <div class="blog-four__card">
                                    <a href="{{route('detailBlog', $valueTour->slug)}}" class="blog-four__card__image-link"
                                       style="background-image: url({{ $valueTour->imgBanner }});">
                                        <div class="blog-four__card__date">
                                            <span class="blog-four__card__date__day">25</span>
                                            <span class="blog-four__card__date__month">june</span>
                                        </div>
                                        <div class="blog-four__card__overlay">
                                                                                <span class="blog-four__card__plus">
                                                                                    <i class="icon-plus"></i>
                                                                                </span>
                                        </div><!-- /.blog-four__card__overlay -->
                                    </a><!-- /.blog-four__card__image-link -->
                                    <div class="blog-four__card__content">
                                        <h3 class="blog-four__card__title"><a href="{{route('detailTour', $valueTour->slug)}}">{{ $valueTour->name }}</a>
                                        </h3><!-- /.blog-four__card__title -->
                                        <ul class="list-unstyled blog-four__card__meta">
                                            <li>
                                                <a href="{{ route('listBlog_Category', $valueTour->objCategory->slug) }}">
                                                        <span class="blog-four__card__meta__icon">
                                                            <i class="trevlo-one-icon-user"></i>
                                                        </span>
                                                    {{ $valueTour->objCategory->name }}
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

{{--                <div class="col-xl-8 col-lg-7">--}}

{{--                    <div class="blog-details">--}}
{{--                        <div class="blog-card-three">--}}
{{--                            <div class="blog__card">--}}
{{--                                <div class="blog__card-content wow animated fadeInUp" data-wow-delay="0.1s"--}}
{{--                                     data-wow-duration="1500ms">--}}
{{--                                    <h3 class="blog__card-title">{{$objBlog->name}}</h3>--}}
{{--                                    <p class="blog__card-text">{!!$objBlog->info_details_blog!!}</p>--}}

{{--                                </div><!-- /.blog-details__card-content -->--}}
{{--                            </div><!-- /.blog-details__card -->--}}
{{--                        </div><!-- /.blog-card-three -->--}}
{{--                        <div class="post-info">--}}
{{--                            <div class="post-category">--}}
{{--                                <h3 class="post-category__title">Review:</h3>--}}
{{--                                <div class="post-category__btn-group">--}}
{{--                                    <div class="tour-listing-five__card__btn-group">--}}
{{--                                        @php--}}
{{--                                            $imageArray= json_decode($objBlog->imageArray, true);--}}
{{--                                            $videoArray= json_decode($objBlog->videoArray, true);--}}
{{--                                        @endphp--}}
{{--                                        <a href="javascript:void(0);"--}}
{{--                                           class="tour-listing-five__card__popup-btn tour-listing-five__card__popup-btn--camera trevlo-image-popup"--}}
{{--                                           data-gallery-options='{--}}
{{--                                                            "items": [--}}
{{--                                                                   @foreach($imageArray as $index => $imgs)--}}
{{--                                                                        @if(isset($imgs['link']) && $imgs['link'] != '')--}}
{{--                                                                             { "src": "{{ $imgs['link'] }}" }@if(!$loop->last),@endif--}}
{{--                                                                        @endif--}}
{{--                                                                    @endforeach--}}
{{--                                                            ],--}}
{{--                                                            "gallery": {--}}
{{--                                                              "enabled": true--}}
{{--                                                            },--}}
{{--                                                            "type": "image"--}}
{{--                                                        }'>--}}
{{--                                            <span class="icon-photo-camera-1"></span>--}}
{{--                                        </a>--}}
{{--                                        <a href="javascript:void(0);"--}}
{{--                                           class="tour-listing-five__card__popup-btn trevlo-image-popup"--}}
{{--                                           data-gallery-options='{--}}
{{--                                                            "items": [--}}
{{--                                                                   @foreach($videoArray as $index => $videos)--}}
{{--                                                                        @if(isset($videos['link']) && $videos['link'] != '')--}}
{{--                                                                            {"src": "{{ $videos['link'] }}", "style": "width: 100%;"}@if(!$loop->last),@endif--}}
{{--                                                                        @endif--}}
{{--                                                                    @endforeach--}}
{{--                                                            ],--}}
{{--                                                            "gallery": {--}}
{{--                                                              "enabled": true--}}
{{--                                                            },--}}
{{--                                                            "type": "iframe"--}}
{{--                                                        }'>--}}
{{--                                            <span class="icon-video-camera-1-1"></span>--}}
{{--                                        </a>--}}
{{--                                    </div><!-- /.tour-listing-five__card__btn-group -->--}}
{{--                                </div><!-- /.post-category__btn-group -->--}}
{{--                            </div><!-- /.post-category -->--}}

{{--                        </div><!-- /.post-info -->--}}
{{--                    </div><!-- /.blog-details -->--}}

{{--                    <div class="comment-wrapper">--}}
{{--                        <div class="comment-wrapper__title-box">--}}
{{--                            <h3 class="comment-wrapper__title"><span>2</span> Comments</h3>--}}
{{--                        </div><!-- /.comment-wrapper__title-box -->--}}
{{--                        <div class="comment-box comment-box-one">--}}
{{--                            <div class="comment-box__image wow animated fadeInUp" data-wow-delay="0s"--}}
{{--                                 data-wow-duration="1500ms">--}}
{{--                                <img src="assets/images/blog/blog-comment-1-1.jpg" alt="David Shon">--}}
{{--                            </div><!-- /.comment-box__image -->--}}
{{--                            <div class="comment-box__content wow animated fadeInUp" data-wow-delay="0.3s"--}}
{{--                                 data-wow-duration="1500ms">--}}
{{--                                <h3 class="comment-box__name">David Shon</h3>--}}
{{--                                <p class="comment-box__text">Nam vel lacus eu nisl bibendum accumsan vitae vitae nibh.--}}
{{--                                    Nam nec eros id magna--}}
{{--                                    hendrerit sagittis. Nullam sed mi non odio feugiat volutpat sit amet nec elit.</p>--}}
{{--                            </div><!-- /.comment-box__content -->--}}
{{--                        </div><!-- /.comment-box -->--}}
{{--                        <div class="comment-box comment-box-two">--}}
{{--                            <div class="comment-box__image wow animated fadeInUp" data-wow-delay="0s"--}}
{{--                                 data-wow-duration="1500ms">--}}
{{--                                <img src="assets/images/blog/blog-comment-1-2.jpg" alt="Jhon Watchson">--}}
{{--                            </div><!-- /.comment-box__image -->--}}
{{--                            <div class="comment-box__content wow animated fadeInUp" data-wow-delay="0.3s"--}}
{{--                                 data-wow-duration="1500ms">--}}
{{--                                <h3 class="comment-box__name">Jhon Watchson</h3>--}}
{{--                                <p class="comment-box__text">Nam vel lacus eu nisl bibendum accumsan vitae vitae nibh.--}}
{{--                                    Nam nec eros id magna--}}
{{--                                    hendrerit sagittis. Nullam sed mi non odio feugiat volutpat sit amet nec elit.</p>--}}
{{--                            </div><!-- /.comment-box__content -->--}}
{{--                        </div><!-- /.comment-box -->--}}
{{--                    </div><!-- /.comment-wrapper -->--}}
{{--                    <div class="comment-form">--}}
{{--                        <div class="comment-form__inner-container container-fluid">--}}
{{--                            <h3 class="comment-form__title">Leave a Comment</h3>--}}
{{--                            <form class="form-one row gutter-20">--}}
{{--                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0s"--}}
{{--                                     data-wow-duration="1500ms">--}}
{{--                                    <div class="form-one__group">--}}
{{--                                        <input type="text" name="form-box-name-input" id="form-one-name-input"--}}
{{--                                               placeholder="Your Name" class="form-one__input">--}}
{{--                                    </div><!-- /.form-one__group -->--}}
{{--                                </div><!-- /.col-md-6 -->--}}
{{--                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s"--}}
{{--                                     data-wow-duration="1500ms">--}}
{{--                                    <div class="form-one__group">--}}
{{--                                        <input type="email" name="form-box-email-input" id="form-one-email-input"--}}
{{--                                               placeholder="Email Address" class="form-one__input">--}}
{{--                                    </div><!-- /.form-one__group -->--}}
{{--                                </div><!-- /.col-md-6 -->--}}
{{--                                <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s"--}}
{{--                                     data-wow-duration="1500ms">--}}
{{--                                    <div class="form-one__group">--}}
{{--                                        <textarea name="form-one-message-input" id="form-one-message-input" cols="30"--}}
{{--                                                  rows="10" placeholder="Write a Message"--}}
{{--                                                  class="form-one__message form-one__input"></textarea>--}}
{{--                                    </div><!-- /.form-one__group -->--}}
{{--                                </div><!-- /.col-12-->--}}
{{--                                <div class="col-12 wow animated fadeInUp" data-wow-delay="0.2s"--}}
{{--                                     data-wow-duration="1500ms">--}}
{{--                                    <div class="form-one__btn-box">--}}
{{--                                        <button type="submit" class="form-one__btn trevlo-btn trevlo-btn--base"><span>Leave a Comment</span>--}}
{{--                                        </button>--}}
{{--                                    </div><!-- /.form-one__btn-box -->--}}
{{--                                </div><!-- /.col-12-->--}}
{{--                            </form>--}}
{{--                        </div><!-- /.comment-form__inner-container container-fluid -->--}}
{{--                    </div><!-- /.comment-form -->--}}
{{--                </div><!-- /.col-xl-8 col-lg-7 -->--}}
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-page -->
{{--    <h1>sadasd</h1>--}}
    <!-- Blog Page End -->
@stop
