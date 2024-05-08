<section class="testimonial-one testimonial-one--home">
    <div class="testimonial-one__bg" style="background-image: url({{url('assets') }}/trevlo/images/shapes/testimonial-1-bg-2.png);">
    </div><!-- /.testimonial-one__bg -->
    <div class="container">
        <div class="sec-title text-center">

            <p class="sec-title__tagline">Lời Chứng Thực</p><!-- /.sec-title__tagline -->

            <h2 class="sec-title__title">Khách Hàng Của Chúng Tôi <br> Đang Nói Gì?</h2><!-- /.sec-title__title -->
        </div><!-- /.sec-title --><!-- /.sec-title -->
    </div><!-- /.container -->
    <div class="container">
        <div class="testimonial-one__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav trevlo-owl__carousel--with-shadow owl-theme owl-carousel"
            data-owl-options='{
                "items": 3,
                "margin": 42,
                "smartSpeed": 700,
                "loop":false,
                "autoplay": 6000,
                "nav":false,
                "dots":true,
                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                "responsive":{
                    "0":{
                        "items": 1
                    },
                    "768":{
                        "items": 2
                    },
                    "1200":{
                        "items": 3,
                        "dots": false
                    }
                }
            }'>
            @foreach ($contact_list as $contactValue)

            <div class="item">
                <div class="testimonials-card">
                    <div class="testimonials-card__meta">
                        <h5 class="testimonials-card__meta__name">{{$contactValue-> name}}</h5>
                        <p class="testimonials-card__meta__designation">{{$contactValue-> phone}}</p>
                    </div><!-- /.testimonials-card__meta -->
                    <div class="testimonials-card__ratings">
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                    </div><!-- /.testimonials-card__ratings -->
                    <div class="testimonials-card__quote">{{$contactValue-> commentUser}}</div><!-- /.testimonials-card__quote -->
                </div><!-- /.testimonials-card -->
            </div><!-- /.owl-slide-item-->
            @endforeach
        </div><!-- /.thm-owl__slider -->
    </div><!-- /.container -->
</section>
<!-- Testimonial One End -->
