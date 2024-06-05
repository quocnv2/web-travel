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
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Bài
                Viết</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    @if ($slugCategory)
                        <li><a href="{{ route('listBlog') }}">Bài Viết</a></li>
                        <li><a href="{{ route('detailBlog', $slugCategory->slug) }}">Danh Mục</a></li>
                        <li>{{ $slugCategory->name }}</li>
                    @else
                        <li><a href="{{ route('listBlog') }}">Bài Viết</a></li>
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
                            <div class="sidebar-blog__single sidebar-blog__single--posts wow animated fadeInUp left-controller-blog "
                                data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <h4 class="sidebar-blog__title">Bài Viết Mới Nhất</h4><!-- /.sidebar-blog__title -->
                                <ul class="sidebar-blog__posts ">
                                    @foreach ($blog_new as $blognew)
                                        <li class="sidebar-blog__posts-item">
                                            <div class="sidebar-blog__posts-image">
                                                <img src="{{ $blognew->imgBanner }}" alt="{{ $blognew->name }}">
                                            </div><!-- /.sidebar-blog__posts-image -->
                                            <div class="sidebar-blog__posts-content">
                                                <p class="sidebar-blog__posts-date">
                                                    <i class="far fa-clock"></i>
                                                    {{ Carbon::parse($blognew->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                                </p><!-- /.sidebar__posts-date -->
                                                <h4 class="sidebar-blog__posts-title"><a
                                                        href="{{ route('detailBlog', $blognew->slug) }}">{{ $blognew->name }}</a>
                                                </h4>
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
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details">
                        <div class="blog-card-three">
                            <div class="blog__card">
                                <div class="blog__card-content wow animated fadeInUp" data-wow-delay="0.1s"
                                    data-wow-duration="1500ms">
                                    <h3 class="blog__card-title">{{ $objBlog->name }}</h3>
                                    <p class="blog__card-text">{!! $objBlog->info_details_blog !!}</p>

                                </div><!-- /.blog-details__card-content -->
                            </div><!-- /.blog-details__card -->
                        </div><!-- /.blog-card-three -->
                        <div class="post-info">
                            <div class="post-category">
                                <h3 class="post-category__title">Review:</h3>
                                <div class="post-category__btn-group">
                                    <div class="tour-listing-five__card__btn-group">
                                        @php
                                            $imageArray = json_decode($objBlog->imageArray, true);
                                            $videoArray = json_decode($objBlog->videoArray, true);
                                        @endphp
                                        <a href="javascript:void(0);"
                                            class="tour-listing-five__card__popup-btn tour-listing-five__card__popup-btn--camera trevlo-image-popup"
                                            data-gallery-options='{
                                                            "items": [
                                                                   @foreach ($imageArray as $index => $imgs)
                                                                        @if (isset($imgs['link']) && $imgs['link'] != '')
                                                                             { "src": "{{ $imgs['link'] }}" }@if (!$loop->last),@endif
                                                                        @endif @endforeach
                                                            ],
                                                            "gallery": {
                                                              "enabled": true
                                                            },
                                                            "type": "image"
                                                        }'>
                                            <span class="icon-photo-camera-1"></span>
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="tour-listing-five__card__popup-btn trevlo-image-popup"
                                            data-gallery-options='{
                                                            "items": [
                                                                   @foreach ($videoArray as $index => $videos)
                                                                        @if (isset($videos['link']) && $videos['link'] != '')
                                                                            {"src": "{{ $videos['link'] }}", "style": "width: 100%;"}@if (!$loop->last),@endif
                                                                        @endif @endforeach
                                                            ],
                                                            "gallery": {
                                                              "enabled": true
                                                            },
                                                            "type": "iframe"
                                                        }'>
                                            <span class="icon-video-camera-1-1"></span>
                                        </a>
                                    </div><!-- /.tour-listing-five__card__btn-group -->
                                </div><!-- /.post-category__btn-group -->
                            </div><!-- /.post-category -->

                        </div><!-- /.post-info -->
                    </div><!-- /.blog-details -->
                    <div class="tour-listing-details__reviews ">
                        <h3 class="tour-listing-details__reviews-title tour-listing-details__title ">
                            Đánh Giá Của Khách Hàng
                        </h3>
                        @foreach ($listCommentBlog as $comment)
                            @if ($comment->status == 0)
                                <div class="tour-listing-details__reviews-comment">
                                    <div class="tour-listing-details__reviews-comment-box">
                                        <div class="tour-listing-details__reviews-image wow animated fadeInUp"
                                            data-wow-delay="0.1s" data-wow-duration="1500ms">
                                            <img src="{{ asset('assets/images/user/avatar-2.jpg') }}"
                                                alt="{{ $comment->name }}">
                                        </div><!-- /."tour-listing-details__reviews-image -->
                                        <div class="tour-listing-details__reviews-content wow animated fadeInUp"
                                            style="padding: 0px 15px;" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                            <div class="tour-listing-details__reviews-inner-content">
                                                <div class="tour-listing-details__reviews-info">
                                                    <h3 class="tour-listing-details__reviews-name">
                                                        {{ $comment->name }}</h3>
                                                </div><!-- /.tour-listing-details__reviews-info -->
                                            </div><!-- /.tour-listing-details__reviews-inner-content -->
                                            <p class="tour-listing-details__reviews-text" style="margin-bottom: 0px;">
                                                {{ $comment->commentUser }}
                                            </p>
                                        </div><!-- /.tour-listing-details__reviews-content -->
                                    </div><!-- /.tour-listing-details__reviews-comment-box -->
                                </div>
                                @elseif ($comment->status == 1)
                                    <div class="tour-listing-details__reviews-comment-box">
                                        <div class="tour-listing-details__reviews-image wow animated fadeInUp"
                                            data-wow-delay="0.1s" data-wow-duration="1500ms">
                                            <img src="{{ asset('assets/images/user/avatar-2.jpg') }}"
                                                alt="Tổng Đài Độc Lạ Tây Bắc">
                                        </div><!-- /."tour-listing-details__reviews-image -->
                                        <div class="tour-listing-details__reviews-content wow animated fadeInUp"
                                            style="padding: 0px 15px;" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                            <div class="tour-listing-details__reviews-inner-content">
                                                <div class="tour-listing-details__reviews-info">
                                                    <h3 class="tour-listing-details__reviews-name">
                                                        Tổng Đài Độc Lạ Tây Bắc</h3>
                                                </div><!-- /.tour-listing-details__reviews-info -->
                                            </div><!-- /.tour-listing-details__reviews-inner-content -->
                                            <p class="tour-listing-details__reviews-text" style="margin-bottom: 0px;">
                                                {{ $comment->commentAdmin }}
                                            </p>
                                        </div><!-- /.tour-listing-details__reviews-content -->
                                    </div><!-- /.tour-listing-details__reviews-comment-box -->
                            @endif
                        @endforeach
                    </div>
                @if ($listCommentBlog->count() > 2)
                    <div class="form-one__btn-box">
                        <a href="#" class="form-one__btn trevlo-btn trevlo-btn--base view_all_comments">
                            <span>Xem Thêm</span></a>
                    </div>
                @endif


            <div class="tour-listing-details__add-review mobile-review">
                <h3 class="tour-listing-details__add-review-title tour-listing-details__title">Để
                    Lại Đánh
                    Giá Của Bạn
                </h3>
            </div>
            <div class="tour-listing-details__form">
                <form class="form-one row gutter-20" method="POST"
                    action="{{ route('create_comment_blog', ['slug' => $objBlog->slug]) }}">
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
                    <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <div class="form-one__group">
                            <textarea name="commentUser" id="form-one-message-input" cols="30" rows="10" placeholder="Viết tâm thư"
                                class="form-one__message form-one__input">{{ old('commentUser') ?? 'Nội Dung Bài Viết' }}</textarea>
                            @error('commentUser')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div><!-- /.form-one__group -->
                    </div><!-- /.col-12-->
                    <input type="hidden" name="idBlog" value="{{ $objBlog->id }}">
                    <input type="hidden" name="status" value="{{ $objBlog->status ?? 0 }}">
                    <div class="col-12 wow animated fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                        <div class="form-one__btn-box">
                            <button type="submit" class="form-one__btn trevlo-btn trevlo-btn--base">
                                <span>Gửi tin nhắn</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.col-xl-8 col-lg-7 -->
    </div><!-- /.row -->
    </div><!-- /.container -->
    </div><!-- /.blog-page -->
    <!-- Blog Page End -->
    <div class="modal fade modal-lg" id="blog_modal_comment" tabindex="-1" role="dialog"
        aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Đánh giá của khách hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Content will be loaded dynamically -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for no comments -->
    <div id="no_comments_modal modal-lg" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="noCommentsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noCommentsLabel">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Không có comment nào ở bài viết này.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Define tourId safely using a ternary operator to check if it's set
            var blogId = {{ isset($objBlog) ? $objBlog->id : 'null' }};

            function fetchComments(page = 1) {
                var url = '/commentBlog?page=' + page;
                if (blogId !== null) {
                    url += '&blogId=' + blogId;
                }

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var html = '';
                        if (response.data.length > 0) {
                            response.data.forEach(function(comment) {
                                html +=
                                    '<div class="d-flex align-items-center" style="padding: 10px; background: aliceblue; border-radius: 10px; margin-bottom: 10px;">' +
                                    '<div class="chat-avatar">' +
                                    '<img class="rounded-circle img-fluid wid-30" src="../assets/images/user/avatar-2.jpg" alt="User image" style="width: 40px; height: 40px;">' +
                                    '</div>' +
                                    '<div class="flex-grow-1 mx-2">' +
                                    '<h5 class="mb-0">' + comment.name + '</h5>' +
                                    '<p class="mb-0">' + comment.commentUser + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="d-flex align-items-center" style="padding: 30px;background: aliceblue; border-radius: 10px; margin-bottom: 10px;">' +
                                    // '<div class="d-flex align-items-start">' +
                                    '<div class="chat-avtar flex-shrink-0"><img class="rounded-circle img-fluid  wid-30" src="../assets/images/user/avatar-1.jpg" style="width: 40px; height: 40px; alt="User image">' +
                                    '<div class="bg-success chat-badge"></div>' +
                                    '</div>' +
                                    '<div class="flex-grow-1 ms-3" style="background: aliceblue; border-radius: 10px; margin-bottom: 10px;">' +
                                    '<h5 class="mb-0">Tổng Đài Độc Lạ Tây Bắc</h5>' +
                                    '<span class="text-sm text-muted">' + comment.commentAdmin +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';

                            });

                        } else {
                            // Show no comments modal
                            $('#no_comments_modal').modal('show');
                            return; // Exit the function early
                        }
                        $('#blog_modal_comment .modal-body').html(html);
                        $('#blog_modal_comment').modal('show');
                    },
                    error: function(xhr) {
                        console.error('Error: ', xhr.responseText);
                    }
                });
            }

            // Bind event handlers for both initial load and pagination
            $(document).on('click', '.view_all_comments', function(event) {
                event.preventDefault();
                fetchComments(); // Initially fetch comments
            });

            $(document).on('click', '.page-link', function(event) {
                event.preventDefault();
                var page = $(this).data('page');
                fetchComments(page);
            });
        });
    </script>
    </div>
@stop
