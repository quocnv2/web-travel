@extends ('Home.master')
@php
    use Carbon\Carbon;

//    $slugCategory = isset($objCategory) ? $objCategory : '';
@endphp
@section('view')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Tuyển Dụng</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
{{--                    @if ($slugCategory)--}}
{{--                        <li><a href="{{ route('listBlog') }}">Tuyển Dụng</a></li>--}}
{{--                        <li><a href="{{ route('detailBlog', $slugCategory->slug) }}">Danh Mục</a></li>--}}
{{--                        <li>{{ $slugCategory->name }}</li>--}}
{{--                    @else--}}
                        <li><a href="{{ route('list_recruitment') }}">Tuyển Dụng</a></li>
{{--                    @endif--}}

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
                                <h4 class="sidebar-blog__title">Tuyển Dụng Mới Nhất</h4><!-- /.sidebar-blog__title -->
                                <ul class="sidebar-blog__posts ">
                                    @foreach ($rec_new as $valNew)
                                        <li class="sidebar-blog__posts-item">
                                            <div class="sidebar-blog__posts-content">
                                                <p class="sidebar-blog__posts-date">
                                                    <i class="far fa-clock"></i>
                                                    {{ Carbon::parse($valNew->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                                </p><!-- /.sidebar__posts-date -->
                                                <h4 class="sidebar-blog__posts-title"><a
                                                        href="{{ route('detail_recruitment', $valNew->slug) }}">{{ $valNew->title }}</a>
                                                </h4>
                                                <!-- /.sidebar-blog__posts-title -->
                                            </div><!-- /.sidebar-blog__posts-content -->
                                        </li>
                                    @endforeach
                                </ul><!-- /.sidebar-blog__posts  -->
                            </div><!-- /.sidebar-blog__single -->

                            <!-- /.sidebar-blog__single -->
                            <!-- /.sidebar-blog__single -->
                            <!-- /.sidebar-blog__single -->
                        </aside><!-- /.widget-area -->
                    </div><!-- /.sidebar-blog -->
                </div><!-- /.col-xl-4 col-lg-5 -->

                <div class="col-xl-8 col-lg-7">

                    <div class="blog-details">
                        <div class="blog-card-three">
                            <div class="blog__card">
                                <div class="blog__card-content wow animated fadeInUp" data-wow-delay="0.1s"
                                     data-wow-duration="1500ms">
                                    <h3 class="blog__card-title">{{ $objRec->title }}</h3>
                                    <p class="blog__card-text">{!! $objRec->content !!}</p>

                                </div><!-- /.blog-details__card-content -->
                            </div><!-- /.blog-details__card -->
                        </div><!-- /.blog-card-three -->

                    </div><!-- /.blog-details -->
{{--                    @if ($listCommentBlog && count($listCommentBlog) > 0)--}}
{{--                        <div class="comment-wrapper">--}}
{{--                            <div class="comment-wrapper__title-box">--}}
{{--                                <h3 class="comment-wrapper__title">Bình Luận</h3>--}}
{{--                            </div><!-- /.comment-wrapper__title-box -->--}}
{{--                            <div class="comment-box comment-box-one">--}}
{{--                                @foreach ($listCommentBlog as $valueCommentBlog)--}}
{{--                                    <div class="comment-box__image wow animated fadeInUp" data-wow-delay="0s"--}}
{{--                                         data-wow-duration="1500ms">--}}
{{--                                        <img src="{{ $valueCommentBlog->objBlog->imgBanner }}" alt="David Shon">--}}
{{--                                    </div><!-- /.comment-box__image -->--}}
{{--                                    <div class="comment-box__content wow animated fadeInUp" data-wow-delay="0.3s"--}}
{{--                                         data-wow-duration="1500ms">--}}
{{--                                        <h3 class="comment-box__name">{{ $valueCommentBlog->name }}</h3>--}}
{{--                                        <p class="comment-box__text">{{ $valueCommentBlog->commentUser }}</p>--}}
{{--                                    </div><!-- /.comment-box__content -->--}}
{{--                                @endforeach--}}
{{--                            </div><!-- /.comment-box -->--}}

{{--                        </div><!-- /.comment-wrapper -->--}}
{{--                    @endif--}}
{{--                    <div class="comment-form">--}}
{{--                        <div class="comment-form__inner-container container-fluid">--}}
{{--                            <h3 class="comment-form__title">Để Lại Bình Luận Của Bạn</h3>--}}
{{--                            <form class="form-one row gutter-20" method="POST"--}}
{{--                                  action="{{ route('create_comment_blog', ['slug' => $objBlog->slug]) }}">--}}
{{--                                @csrf--}}
{{--                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">--}}
{{--                                    <div class="form-one__group">--}}
{{--                                        <input type="text" name="name" id="form-one-name-input"--}}
{{--                                               placeholder="Tên Của Bạn" class="form-one__input" value="{{ old('name') }}">--}}
{{--                                        @error('name')--}}
{{--                                        <small style="color: #f33923;">{{ $message }}</small>--}}
{{--                                        @enderror--}}
{{--                                    </div><!-- /.form-one__group -->--}}
{{--                                </div><!-- /.col-md-6 -->--}}
{{--                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s"--}}
{{--                                     data-wow-duration="1500ms">--}}
{{--                                    <div class="form-one__group">--}}
{{--                                        <input type="email" name="email" id="form-one-email-input" placeholder="Email"--}}
{{--                                               class="form-one__input" value="{{ old('email') }}">--}}
{{--                                    </div><!-- /.form-one__group -->--}}
{{--                                </div><!-- /.col-md-6 -->--}}
{{--                                <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s"--}}
{{--                                     data-wow-duration="1500ms">--}}
{{--                                    <div class="form-one__group">--}}
{{--                                        <textarea name="commentUser" id="form-one-message-input" cols="30" rows="10"--}}
{{--                                                  placeholder="Comment Của Bạn" class="form-one__message form-one__input">{{ old('commentUser') ?? 'Nội Dung Bài Viết' }}</textarea>--}}
{{--                                    </div><!-- /.form-one__group -->--}}
{{--                                </div><!-- /.col-12-->--}}
{{--                                <input type="hidden" name="idBlog" value="{{ $objBlog->id }}">--}}
{{--                                <input type="hidden" name="status" value="{{ $objBlog->status ?? 0 }}">--}}
{{--                                <input type="hidden" name="commentAdmin"--}}
{{--                                       value="{{ $objBlog->commentAdmin ?? 'Admin' }}">--}}
{{--                                <div class="col-12 wow animated fadeInUp" data-wow-delay="0.2s"--}}
{{--                                     data-wow-duration="1500ms">--}}
{{--                                    <div class="form-one__btn-box">--}}
{{--                                        <button type="submit"--}}
{{--                                                class="form-one__btn trevlo-btn trevlo-btn--base"><span>Gửi</span>--}}
{{--                                        </button>--}}
{{--                                    </div><!-- /.form-one__btn-box -->--}}
{{--                                </div><!-- /.col-12-->--}}
{{--                            </form>--}}
{{--                        </div><!-- /.comment-form__inner-container container-fluid -->--}}
{{--                    </div><!-- /.comment-form -->--}}
                </div><!-- /.col-xl-8 col-lg-7 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-page -->
    <!-- Blog Page End -->
@stop
