@extends ('admin_view.master')
@section('404')
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->

    <div class="wrapper  error-page pa-0">
        <!-- Main Content -->
        <div class="page-wrapper pa-0 ma-0 error-bg-img">
            <div class="container-fluid">
                <!-- Row -->
                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form  ml-auto mr-auto no-float">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="mb-30">
                                        <span class="block error-head text-center txt-primary mb-10">404</span>
                                        <span class="text-center nonecase-font mb-20 block error-comment">Không Tìm Thấy Trang</span>
                                        <p class="text-center">URL Có Thể Bị Đặt Sai Vị Trí Hoặc Page Bạn Đang Tìm Kiếm Không Còn Nữa..</p>
                                        <div class="pt-20" style="text-align:center;">
                                            <a class="inline-block btn btn-primary btn-rounded btn-outline nonecase-font"
                                               href="#">Trang Chủ</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>

        </div>
        <!-- /Main Content -->
@stop
