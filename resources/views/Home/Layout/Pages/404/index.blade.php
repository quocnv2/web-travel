@extends ('Home.master')

@section('view')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Lỗi Tìm Kiếm</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li>Lỗi 404</li>
                </ul><!-- /.trevlo-breadcrumb -->
            </div><!-- /.page-header__breadcrumb-box -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <section class="error-page">
        <div class="container">
            <div class="error-page__wrapper">
                <div class="error-page__top">
                    <h2 class="error-page__top-title">4<span>0</span>4</h2>
                    <img src="{{ url('assets') }}/trevlo/images/shapes/error-shape-1-1.png" alt="error-shape"
                        class="error-page__top-shape">
                </div><!-- /.error-page__top -->
                <div class="error-page__image-box">
                    <img src="{{ url('assets') }}/trevlo/images/resources/error-1-1.png" alt="error image"
                        class="error-page__image">
                </div><!-- /.error-page__image-box -->
                <div class="error-page__content sec-title wow animated fadeInUp" data-wow-delay="0.1s"
                    data-wow-duration="1500ms">
                    <h3 class="error-page__heading sec-title__heading">Ối! Không tìm thấy trang</h3>
                    <p class="error-page__text">Trang bạn đang tìm kiếm không tồn tại.</p>
                    <a href="{{ route('home') }}" class="error-page__btn trevlo-btn trevlo-btn--base"><span>Trang
                            Chủ</span></a>
                </div><!-- /.error-page__content -->
            </div><!-- /.error-page__wrapper -->
        </div><!-- /.container -->
    </section>
@stop
