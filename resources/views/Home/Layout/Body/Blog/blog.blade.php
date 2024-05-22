@php
    use Carbon\Carbon;
@endphp

<div class="blog-four section-space" style="padding-top: 60px;">

    <div class="container">
        <div class="blog-four__top">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sec-title sec-title--two text-left">

                        <p class="sec-title__tagline">Blog Mới Nhất Của Chúng Tôi</p><!-- /.sec-title__tagline -->

                        <h2 class="sec-title__title">Tin Tức Mới Nhất Của Chúng Tôi</h2><!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                </div><!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="blog-four__button">
                        <a href="{{ route('listBlog') }}" class="trevlo-btn trevlo-btn--border">
                            <span>Xem Tất Cả Blog</span>
                            <i class="trevlo-one-icon-up-right-arrow"></i>
                        </a><!-- /.trevlo-btn -->
                    </div><!-- /.blog-four__button -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.blog-four__top -->
        <div class="row gutter-y-30">
            @foreach ($blog_list as $valueBlog)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="blog-four__card">
                        <a href="{{ route('detailBlog', $valueBlog->slug) }}" class="blog-four__card__image-link"
                            style="background-image: url({{ $valueBlog->imgBanner }});">
                            <div class="blog-four__card__date">
                                <span
                                    class="blog-four__card__date__day">{{ Carbon::parse($valueBlog->timeCreate)->locale('vi')->isoFormat('Do') }}</span>
                                <span
                                    class="blog-four__card__date__month">{{ Carbon::parse($valueBlog->timeCreate)->locale('vi')->isoFormat('[tháng] M') }}</span>
                            </div>
                            <div class="blog-four__card__overlay">
                                <span class="blog-four__card__plus">
                                    <i class="icon-plus"></i>
                                </span>
                            </div><!-- /.blog-four__card__overlay -->
                        </a><!-- /.blog-four__card__image-link -->
                        <div class="blog-four__card__content">
                            <h3 class="blog-four__card__title"><a
                                    href="{{ route('detailBlog', $valueBlog->slug) }}">{{ $valueBlog->name }}</a>
                            </h3><!-- /.blog-four__card__title -->
                            <ul class="list-unstyled blog-four__card__meta">
                                <li>
                                    <a href="{{ route('detailBlog', $valueBlog->slug) }}">
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
    </div><!-- /.container -->
</div><!-- /.blog-four section-space -->
