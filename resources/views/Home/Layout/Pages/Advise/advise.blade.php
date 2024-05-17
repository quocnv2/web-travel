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
        <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Liên
            hệ</h2>
        <div class="page-header__breadcrumb-box">
            <ul class="trevlo-breadcrumb">
                <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                <li>Đăng Ký Tư Vấn</li>
            </ul><!-- /.trevlo-breadcrumb -->
        </div><!-- /.page-header__breadcrumb-box -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

@stop
