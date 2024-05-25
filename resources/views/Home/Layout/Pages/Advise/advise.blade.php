@extends ('Home.master')
@php
    use Carbon\Carbon;

    $slugCategory = isset($objCategory) ? $objCategory : '';
@endphp
@section('view')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Đăng
                Ký Tư
                Vấn</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li>Đăng Ký Tư Vấn</li>
                </ul><!-- /.trevlo-breadcrumb -->
            </div><!-- /.page-header__breadcrumb-box -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <section class="tour-listing-style tour-listing section-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <aside class="tour-listing-sidebar">
                        <div class="tour-listing-sidebar__form tour-listing-sidebar__item wow animated fadeInUp"
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
                        </div><!-- /.tour-listing-sidebar__form tour-listing-sidebar__item -->
                        <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                            data-wow-delay="0.1s" data-wow-duration="1500ms">

                            <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Tour Đã
                                Xem
                            </h3>
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
                                            @if (isset($valueHistory['imgBanner']))
                                                <img src="{{ $valueHistory['imgBanner'] }}"
                                                    alt="{{ $valueHistory['name'] ?? 'Tour Image' }}">
                                            @endif
                                        </div>

                                        <div class="tour-listing-sidebar-post__content">
                                            @if (isset($valueHistory['tour_price']))
                                                <p class="tour-listing-sidebar-post__price">
                                                    {{ number_format($valueHistory['tour_price'], 0, ',', '.') }}vnđ
                                                </p>
                                            @endif

                                            @if (isset($valueHistory['name']))
                                                <h5 class="tour-listing-sidebar-post__link">
                                                    <a href="">{{ $valueHistory['name'] }}</a>
                                                </h5>
                                            @endif

                                            <div class="tour-listing-sidebar-post__location">
                                                <span class="icon-location-1"></span>
                                                <p class="tour-listing-sidebar-post__location-text text-small">
                                                    {{ $addressHitory }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- /.tour-listing-sidebar__post-box tour-listing-sidebar__item -->

                        <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                            data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Tour Mới
                                Nhất
                            </h3>
                            <ul class="tour-listing-sidebar-post">
                                @foreach ($tour_list as $valueNewtour)
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
                                                {{ number_format($valueNewtour->price, 0, ',', '.') }}vnđ</p>
                                            <h5 class="tour-listing-sidebar-post__link"><a
                                                    href="">{{ $valueNewtour->name }}</a>
                                            </h5>
                                            <div class="tour-listing-sidebar-post__location">
                                                <span class="icon-location-1"></span>
                                                <p class="tour-listing-sidebar-post__location-text text-small">
                                                    {{ $address }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- /.tour-listing-sidebar__post-box tour-listing-sidebar__item -->

                        <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                            data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Địa Điểm
                                Phòng Gần Tour
                            </h3>
                            <ul class="tour-listing-sidebar-post">
                                @foreach ($roomsiml as $valsiml)
                                    <li class="sidebar-blog__posts-item">
                                        <div class="sidebar-blog__posts-image">
                                            <img src="{{ $valsiml->imgRoom }}" alt="latest-post">
                                        </div><!-- /.sidebar-blog__posts-image -->
                                        <div class="sidebar-blog__posts-content">
                                            <p class="sidebar-blog__posts-date">
                                                <i class="far fa-clock"></i>
                                                {{ Carbon::parse($valsiml->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                            </p><!-- /.sidebar__posts-date -->
                                            <h4 class="sidebar-blog__posts-title"><a
                                                    href="{{ route('detailRoom', $valsiml->slug) }}">{{ $valsiml->name }}</a>
                                            </h4>
                                        </div><!-- /.sidebar-blog__posts-content -->
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- /.tour-listing-sidebar__post-box tour-listing-sidebar__item -->

                        <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                            data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <h3 class="tour-listing-sidebar__post-title tour-listing-sidebar__post-title">Bài Viết
                                Liên
                                Quan
                            </h3>
                            <ul class="tour-listing-sidebar-post">
                                @foreach ($blog_list as $valSml)
                                    <li class="sidebar-blog__posts-item">
                                        <div class="sidebar-blog__posts-image">
                                            <img src="{{ $valSml->imgBanner }}" alt="latest-post">
                                        </div><!-- /.sidebar-blog__posts-image -->
                                        <div class="sidebar-blog__posts-content">
                                            <p class="sidebar-blog__posts-date">
                                                <i class="far fa-clock"></i>
                                                {{ Carbon::parse($valSml->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                            </p><!-- /.sidebar__posts-date -->
                                            <h4 class="sidebar-blog__posts-title"><a
                                                    href="{{ route('detailBlog', $valSml->slug) }}">{{ $valSml->name }}</a>
                                            </h4>
                                            <!-- /.sidebar-blog__posts-title -->
                                        </div><!-- /.sidebar-blog__posts-content -->
                                    </li>
                                @endforeach
                                </li>
                            </ul>
                        </div><!-- /.tour-listing-sidebar__post-box tour-listing-sidebar__item -->
                    </aside><!-- /.tour-listing-sidebar -->
                </div><!-- /.col-xl-4 -->

                <div class="col-xl-8">
                    <form class="contact-page__form form-one row gutter-20" method="POST" id="formReset">
                        <div class="sec-title" style="margin: 50px 0px 0px 0px;">
                            <p class="sec-title__tagline">Đăng Ký Tư Vấn</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title text-left"
                                style="border: 1px dashed #b7b7b7;padding: 10px;display: grid;">Để Lại
                                Thông
                                Tin Của Bạn Để Chúng Tôi Có Thể Tư Vấn Dễ Dàng Hơn</h2><!-- /.sec-title__title -->
                            <!-- /.sec-title -->
                        </div>
                        @csrf
                        <div class="col-md-7 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="text" name="name" id="form-one-name-input" placeholder="Họ và tên"
                                    class="form-one__input" value="{{ old('name') }}">
                                @error('name')
                                    <small style="color: #f33923;">{{ $message }}</small>
                                @enderror
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-5 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="tel" name="phone" id="form-one-phone-input"
                                    placeholder="Số điện thoại" class="form-one__input" value="{{ old('phone') }}">
                                @error('phone')
                                    <small style="color: #f33923;">{{ $message }}</small>
                                @enderror
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="email" name="email" id="form-one-email-input" placeholder="Email"
                                    class="form-one__input" value="{{ old('email') }}">
                                @error('email')
                                    <small style="color: #f33923;">{{ $message }}</small>
                                @enderror
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="date" name="travel_date" id="travel_date" placeholder="Ngày Đi"
                                    class="form-one__input" value="{{ old('travel_date') }}">
                                @error('travel_date')
                                    <small style="color: #f33923;">{{ $message }}</small>
                                @enderror
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="text" name="number_of_adults" id="form-one-subject-input"
                                    placeholder="Số Lượng Người Lớn" class="form-one__input"
                                    value="{{ old('number_of_adults') }}">
                                @error('number_of_adults')
                                    <small style="color: #f33923;">{{ $message }}</small>
                                @enderror
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="text" name="number_of_children" id="form-one-subject-input"
                                    placeholder="Số Lượng Trẻ Nhỏ" class="form-one__input"
                                    value="{{ old('number_of_children') }}">
                                @error('number_of_children')
                                    <small style="color: #f33923;">{{ $message }}</small>
                                @enderror
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-3 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="text" name="tour_code" id="tour_code" placeholder="Mã Tour"
                                    class="form-one__input" value="{{ old('tour_code') }}">
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="text" name="tour_name" id="tour_name" placeholder="Tên Tour"
                                    class="form-one__input" value="{{ old('tour_name') }}" readonly>
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-3 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="text" name="tour_price" id="tour_price" placeholder="Giá Tour"
                                    class="form-one__input" value="{{ old('tour_price') }}" readonly>
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-3 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="text" name="room_code" id="room_code" placeholder="Mã Phòng"
                                    class="form-one__input" value="{{ old('room_code') }}">
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="text" name="hotel_name" id="hotel_name" placeholder="Tên Khách Sạn"
                                    class="form-one__input" value="{{ old('hotel_name') }}" readonly>
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-3 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="text" name="room_price" id="room_price" placeholder="Giá Phòng"
                                    class="form-one__input" value="{{ old('room_price') }}" readonly>
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <input type="hidden" name="feedback" id="feedback" value="{{ old('feedback') ?? '' }}">
                        <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <textarea name="note" id="form-one-message-input" cols="30" rows="10" placeholder="Ghi Chú"
                                    class="form-one__message form-one__input">{{ old('note') ?? 'Ghi Chú' }}</textarea>
                                @error('note')
                                    <small style="color: #f33923;">{{ $message }}</small>
                                @enderror
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-12-->
                        <div class="col-12 wow animated fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                            <div class="form-one__btn-box">
                                <button type="submit" class="form-one__btn trevlo-btn trevlo-btn--base">
                                    <span>Gửi</span></button>
                            </div><!-- /.form-one__btn-box -->
                        </div><!-- /.col-12-->
                    </form><!-- /.row -->
                    <div class="result"></div><!-- /.result -->

                    <div class="faq-page" style="padding-top: 50px;">
                        <div class="container">
                            <div class="sec-title text-left">
                                <p class="sec-title__tagline">Giải Đáp Khó Khăn</p><!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">Câu Hỏi Thường Gặp</h2><!-- /.sec-title__title -->
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="trevlo-accrodion faq-page__faq" data-grp-name="faq-page__faq">
                                    <div class="accrodion wow animated fadeInUp" data-wow-delay="0.1s"
                                        data-wow-duration="1500ms">
                                        <div class="accrodion-title">
                                            <h4>Đặt chỗ dễ dàng</h4>
                                        </div>
                                        <div class="accrodion-content" style="display: none;">
                                            <div class="inner">
                                                <p>Trải nghiệm đặt chỗ không bao giờ dễ dàng hơn với công cụ đặt phòng
                                                    tiện lợi của
                                                    chúng tôi. Chỉ cần vài bước đơn giản, bạn đã có thể đặt chỗ cho
                                                    chuyến du lịch
                                                    của mình một cách nhanh chóng và thuận tiện.</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="accrodion active wow animated fadeInUp" data-wow-delay="0.2s"
                                        data-wow-duration="1500ms">
                                        <div class="accrodion-title">
                                            <h4>Lựa chọn tốt nhất</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>
                                                    Tận hưởng sự đa dạng và chất lượng với sự lựa chọn tốt nhất từ hàng
                                                    nghìn điểm
                                                    đến trên khắp thế giới. Từ khách sạn sang trọng đến nhà nghỉ bình
                                                    dân, chúng tôi
                                                    có mọi lựa chọn phù hợp với nhu cầu của bạn.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accrodion wow animated fadeInUp" data-wow-delay="0.3s"
                                        data-wow-duration="1500ms">
                                        <div class="accrodion-title">
                                            <h4>Tiết kiệm chi phí</h4>
                                        </div>
                                        <div class="accrodion-content" style="display: none;">
                                            <div class="inner">
                                                <p>Khám phá những ưu đãi độc quyền và giảm giá hấp dẫn để tiết kiệm chi
                                                    phí cho
                                                    chuyến du lịch của bạn. Chúng tôi cam kết mang đến cho bạn những
                                                    trải nghiệm du
                                                    lịch tuyệt vời với mức giá hợp lý nhất.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accrodion wow animated fadeInUp" data-wow-delay="0.4s"
                                        data-wow-duration="1500ms">
                                        <div class="accrodion-title">
                                            <h4>An toàn luôn là trên hết</h4>
                                        </div>
                                        <div class="accrodion-content" style="display: none;">
                                            <div class="inner">
                                                <p>Sự an toàn của bạn luôn được đặt lên hàng đầu với các biện pháp bảo
                                                    mật và chăm
                                                    sóc khách hàng chuyên nghiệp. Chúng tôi cam kết mang đến cho bạn một
                                                    kỳ nghỉ an
                                                    lành và không lo lắng.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accrodion wow animated fadeInUp" data-wow-delay="0.5s"
                                        data-wow-duration="1500ms">
                                        <div class="accrodion-title">
                                            <h4>Hướng dẫn có kinh nghiệm</h4>
                                        </div>
                                        <div class="accrodion-content" style="display: none;">
                                            <div class="inner">
                                                <p>Dễ dàng khám phá những điểm đến mới mẻ và tận hưởng trải nghiệm du
                                                    lịch đáng nhớ
                                                    nhờ vào những hướng dẫn có kinh nghiệm của chúng tôi. Tận hưởng
                                                    những mẹo du
                                                    lịch và gợi ý từ những người am hiểu về điểm đến của bạn.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accrodion wow animated fadeInUp" data-wow-delay="0.6s"
                                        data-wow-duration="1500ms">
                                        <div class="accrodion-title">
                                            <h4>Tỷ lệ khách hài lòng 88,9%</h4>
                                        </div>
                                        <div class="accrodion-content" style="display: none;">
                                            <div class="inner">
                                                <p>Thãy tin tưởng vào sự chất lượng và dịch vụ tuyệt vời của chúng tôi,
                                                    được chứng
                                                    minh thông qua tỷ lệ khách hài lòng cao lên đến 88,9%. Khám phá
                                                    những đánh giá
                                                    tích cực từ những người du lịch đã trải nghiệm và tham gia vào cộng
                                                    đồng của
                                                    chúng tôi ngay hôm nay!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.container -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#tour_code').on('change', function() {
                var tour_code = $(this).val();
                if (tour_code) {
                    $.ajax({
                        url: '/danh-sach-tour-khach-hang/' + tour_code,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#tour_name').val(data.tour_name);
                            $('#tour_price').val(data.tour_price);
                        },
                        error: function() {
                            swal(
                                "Không Tìm Thấy Tour Bạn Yêu Cầu, Hãy kiểm Tra Lại",
                                "Thông Báo Từ Hệ Thống!", 'error', {
                                    button: true,
                                    button: "OK",
                                    timer: 50000,
                                    dangerMode: true,
                                })
                        }
                    });
                } else {
                    $('#tour_name').val('');
                    $('#tour_price').val('');
                }
            });

            $('#room_code').on('change', function() {
                var room_code = $(this).val();
                if (room_code) {
                    $.ajax({
                        url: '/danh-sach-phong-khach-hang/' + room_code,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#hotel_name').val(data.hotel_name);
                            $('#room_price').val(data.room_price);
                        },
                        error: function() {
                            swal(
                                "Không Tìm Thấy Phòng Bạn Yêu Cầu, Hãy kiểm Tra Lại",
                                "Thông Báo Từ Hệ Thống!", 'error', {
                                    button: true,
                                    button: "OK",
                                    timer: 50000,
                                    dangerMode: true,
                                })
                        }
                    });
                } else {
                    $('#hotel_name').val('');
                    $('#room_price').val('');
                }
            });
        });
    </script>

@stop

{{-- @section('view_js') --}}

{{-- @stop --}}
