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
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Đăng Ký Tư
                Vấn</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li>Đăng Ký Tư Vấn</li>
                </ul><!-- /.trevlo-breadcrumb -->
            </div><!-- /.page-header__breadcrumb-box -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <div class="tour-listing-details__info-area">
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
                                            <img src="{{ $valueHistory['imgBanner'] }}" alt="{{ $valueHistory['name'] }}">
                                        </div>
                                        <div class="tour-listing-sidebar-post__content">
                                            <p class="tour-listing-sidebar-post__price">
                                                {{ number_format($valueHistory['price'], 0, ',', '.') }}vnđ</p>
                                            <h5 class="tour-listing-sidebar-post__link"><a
                                                    href="">{{ $valueHistory['name'] }}</a>
                                            </h5>
                                            <div class="tour-listing-sidebar-post__location">
                                                <span class="icon-location-1"></span>
                                                <p class="tour-listing-sidebar-post__location-text text-small">
                                                    {{ $addressHitory }}
                                                </p>
                                            </div>
                                        </div>
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
                                @endforeach
                                </li>
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
                                </li>
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
                            <div class="sec-title text-center">

                                <p class="sec-title__tagline"   style="margin-top:20px; font-size: 30px;">Khách Hàng</p><!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">Để Lại Thông Tin Của Bạn Để Chúng Tôi Có Thể Tư Vấn Dễ Dàng Hơn</h2><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <!-- /.sec-title -->
                            <form action="" class="contact-page__form form-one row gutter-20"
                                  method="POST" id="formReset">
                                @csrf
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="text" name="name" id="form-one-name-input" placeholder="Họ và tên"
                                               class="form-one__input" value="{{ old('name') }}">

                                        @error('name')
                                        <small style="color: #f33923;">{{ $message }}</small>
                                        @enderror
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="email" name="email" id="form-one-email-input" placeholder="Email"
                                               class="form-one__input" value="{{ old('email') }}">
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="tel" name="phone" id="form-one-phone-input" placeholder="Số điện thoại"
                                               class="form-one__input" value="{{ old('phone') }}">
                                    </div><!-- /.form-one__group -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="text" name="travel_date" id="form-one-subject-input" placeholder="Ngày Đi"
                                               class="form-one__input" value="{{ old('travel_date') }}">
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="text" name="number_of_adults" id="form-one-subject-input" placeholder="Số Lượng Người Lớn"
                                               class="form-one__input" value="{{ old('number_of_adults') }}">
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="text" name="number_of_children" id="form-one-subject-input" placeholder="Số Lượng Trẻ Nhỏ"
                                               class="form-one__input" value="{{ old('number_of_children') }}">
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="text" name="tour_code" id="form-one-subject-input" placeholder="Mã Tour"
                                               class="form-one__input" value="{{ old('tour_code') }}">
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="text" name="tour_name" id="form-one-subject-input" placeholder="Tên Tour"
                                               class="form-one__input" value="{{ old('tour_name') }}">
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="text" name="room_code" id="form-one-subject-input" placeholder="Mã Phòng"
                                               class="form-one__input" value="{{ old('room_code') }}">
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="text" name="hotel_name" id="form-one-subject-input" placeholder="Tên Khách Sạn"
                                               class="form-one__input" value="{{ old('hotel_name') }}">
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <textarea name="commentUser" id="form-one-message-input" cols="30" rows="10"
                                                  placeholder="Ghi Chú"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
