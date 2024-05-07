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
                    @if($slugCategory)
                        <li>Liên hệ</li>
                        <li>Danh Mục</li>
                        <li>{{$slugCategory->name}}</li>
                    @else
                        <li>Liên hệ</li>
                    @endif

                </ul><!-- /.trevlo-breadcrumb -->
            </div><!-- /.page-header__breadcrumb-box -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <!-- Blog Page Start -->
    <section class="contact-page section-space-top">
        <div class="container">
            <div class="row ">
            <div class="col-lg-5 wow fadeInLeft" data-wow-duration="1500ms">
                <div class="about-five__image">
                    <div class="about-five__image__one">
                        <div class="about-five__image__one__inner">
                            <img src="{{ url('assets') }}/images/about/about-5-1.jpg" alt="about image">
                        </div><!-- /.about-five__image__one__inner -->
                    </div><!-- /.about-five__image__one -->
                    <div class="about-five__image__two">
                        <div class="about-five__image__two__inner">
                            <img src="{{ url('assets') }}/images/about/about-5-2.jpg" alt="about image">
                        </div><!-- /.about-five__image__two__inner -->
                        <div class="about-five__experience">
                            <img src="{{ url('assets') }}/images/resources/about-icon-5-1.png" alt="about icon" class="about-five__experience__icon">
                            <h4 class="about-five__experience__year">10+</h4><!-- /.about-five__experience__year -->
                            <h4 class="about-five__experience__title">Năm kinh nghiệm</h4>
                            <!-- /.about-five__experience__title -->
                        </div><!-- /.about-five__experience -->
                    </div><!-- /.about-five__image__two -->
                </div><!-- /.about-five__image -->
            </div><!-- /.col-lg-6 -->
                <div class="col-lg-7">
                    <div class="sec-title text-center">

                        <p class="sec-title__tagline">Liên hệ chúng tôi</p><!-- /.sec-title__tagline -->

                        <h2 class="sec-title__title">Liên hệ bất cứ lúc nào</h2><!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                    <!-- /.sec-title -->
                    <form action="#" class="contact-page__form form-one row gutter-20 contact-form-validated">
                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="text" name="name" id="form-one-name-input" placeholder="Họ và tên"
                                       class="form-one__input">
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="email" name="email" id="form-one-email-input" placeholder="Email"
                                       class="form-one__input">
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="tel" name="phone" id="form-one-phone-input" placeholder="Số điện thoại"
                                       class="form-one__input">
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                                <input type="text" name="subject" id="form-one-subject-input" placeholder="Chủ đề"
                                       class="form-one__input">
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <div class="form-one__group">
                        <textarea name="message" id="form-one-message-input" cols="30" rows="10"
                                  placeholder="Viết tâm thư" class="form-one__message form-one__input"></textarea>
                            </div><!-- /.form-one__group -->
                        </div><!-- /.col-12-->
                        <div class="col-12 wow animated fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                            <div class="form-one__btn-box">
                                <button type="submit" class="form-one__btn trevlo-btn trevlo-btn--base">
                                    <span>Gửi tin nhắn</span></button>
                            </div><!-- /.form-one__btn-box -->
                        </div><!-- /.col-12-->
                    </form><!-- /.row -->
                    <div class="result"></div><!-- /.result -->
                </div>
            </div>


        </div><!-- /.container -->
        <br>
        <!-- /.google-map -->
    </section>
    <section class="faq-page section-space">
        <div class="container">
            <div class="sec-title text-left">

                <p class="sec-title__tagline">FREQUENTLY ASKED QUESTIONS</p><!-- /.sec-title__tagline -->

                <h2 class="sec-title__title">Frequently asked Question & Answers Here</h2><!-- /.sec-title__title -->
            </div><!-- /.sec-title --><!-- /.sec-title -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 wow animated fadeInLeft" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="faq-page__contact">
                        <div class="faq-page__contact-icon">
                            <span class="icon-phone-1"></span>
                        </div><!-- /.faq-page__contact-icon -->
                        <h3 class="faq-page__contact-title">Bạn có thắc mắc ?</h3>
                        <div class="faq-page__contact-number">
                            <p class="faq-page__contact-number-title">Gọi cho tôi bất cứ lúc nào</p>
                            <a href="tel:303555-0105" class="faq-page__contact-number-text">0888.92.00.92</a>
                        </div><!-- /.faq-page__phone -->
                    </div><!-- /.faq-page__contact -->
                </div><!-- /.col-xl-3 col-lg-4 -->
                <div class="col-xl-9 col-lg-8">
                    <div class="trevlo-accrodion faq-page__faq" data-grp-name="faq-page__faq">
                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>Đặt chỗ dễ dàng</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>rải nghiệm đặt chỗ không bao giờ dễ dàng hơn với công cụ đặt phòng tiện lợi của
                                        chúng tôi. Chỉ cần vài bước đơn giản, bạn đã có thể đặt chỗ cho chuyến du lịch
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
                                        Tận hưởng sự đa dạng và chất lượng với sự lựa chọn tốt nhất từ hàng nghìn điểm
                                        đến trên khắp thế giới. Từ khách sạn sang trọng đến nhà nghỉ bình dân, chúng tôi
                                        có mọi lựa chọn phù hợp với nhu cầu của bạn.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>Tiết kiệm chi phí</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Khám phá những ưu đãi độc quyền và giảm giá hấp dẫn để tiết kiệm chi phí cho
                                        chuyến du lịch của bạn. Chúng tôi cam kết mang đến cho bạn những trải nghiệm du
                                        lịch tuyệt vời với mức giá hợp lý nhất.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.4s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>An toàn luôn là trên hết</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Sự an toàn của bạn luôn được đặt lên hàng đầu với các biện pháp bảo mật và chăm
                                        sóc khách hàng chuyên nghiệp. Chúng tôi cam kết mang đến cho bạn một kỳ nghỉ an
                                        lành và không lo lắng.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.5s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>Hướng dẫn có kinh nghiệm</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Dễ dàng khám phá những điểm đến mới mẻ và tận hưởng trải nghiệm du lịch đáng nhớ
                                        nhờ vào những hướng dẫn có kinh nghiệm của chúng tôi. Tận hưởng những mẹo du
                                        lịch và gợi ý từ những người am hiểu về điểm đến của bạn.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.6s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>Tỷ lệ khách hài lòng 88,9%</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>THãy tin tưởng vào sự chất lượng và dịch vụ tuyệt vời của chúng tôi, được chứng
                                        minh thông qua tỷ lệ khách hài lòng cao lên đến 88,9%. Khám phá những đánh giá
                                        tích cực từ những người du lịch đã trải nghiệm và tham gia vào cộng đồng của
                                        chúng tôi ngay hôm nay!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-xl-9 col-lg-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    @include('Home.Layout.Body.Blog.blog')
    <!-- Blog Page End -->
@stop
