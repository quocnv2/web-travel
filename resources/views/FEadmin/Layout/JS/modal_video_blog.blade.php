<script>
    // document.addEventListener('DOMContentLoaded', function () {
    //     var links = document.querySelectorAll('.videos-blog-detail');
    //     links.forEach(function (link) {
    //         link.addEventListener('click', function (event) {
    //             event.preventDefault();
    //             var id = this.dataset.id;
    //             $.ajax({
    //                 url: 'chi-tiet-blog/' + id,
    //                 type: 'GET',
    //                 success: function (response) {
    //                     // Parse the video array
    //                     var videos = JSON.parse(response.videoArray);
    //
    //                     // Start building the HTML content for the blog details
    //                     var html = '<div class="col-md-12 blog_details">';
    //
    //                     html += '<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">';
    //
    //                     html += '<div class="carousel-indicators">';
    //                     videos.forEach(function (image, index) {
    //                         html += `<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${index}" ${index === 0 ? 'class="active" aria-current="true"' : ''} aria-label="Slide ${index + 1}"></button>`;
    //                     });
    //                     html += '</div>';
    //
    //                     html += '<div class="carousel-inner">';
    //                     videos.forEach(function (video, index) {
    //                         html += `<div class="carousel-item ${index === 0 ? 'active' : ''}">`;
    //                         html += '<video class="img-fluid" style="width: 100%;" autoplay loop muted>'
    //                         html += `<source src="${video.link}" type="video/mp4"/>`
    //                         html += '</video>'
    //                         html += '</div>';
    //                     });
    //                     html += '</div>';
    //                     html += '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">';
    //                     html += '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
    //                     html += '<span class="visually-hidden">Previous</span>';
    //                     html += '</button>';
    //                     html += '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">';
    //                     html += '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
    //                     html += '<span class="visually-hidden">Next</span>';
    //                     html += '</button>';
    //
    //                     html += '</div>';
    //                     // Insert the HTML content into the modal body
    //                     $('#modal-body').html(html);
    //                     $('#title-modal-tour').html('Video bài viết');
    //                     $('#modal_blogs').modal('show');
    //
    //                 },
    //                 error: function (xhr) {
    //                     console.log(xhr.responseText);
    //                 }
    //             });
    //         });
    //     });
    // });
    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelectorAll('.videos-blog-detail');
        links.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var id = this.dataset.id;
                $.ajax({
                    url: 'chi-tiet-blog/' + id,
                    type: 'GET',
                    success: function (response) {
                        // Parse the video array
                        var videos = JSON.parse(response.videoArray);

                        // Start building the HTML content for the blog details
                        var html = '<div class="col-md-12 blog_details">';

                        html += '<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">';

                        html += '<div class="carousel-indicators">';
                        videos.forEach(function (image, index) {
                            html += `<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${index}" ${index === 0 ? 'class="active" aria-current="true"' : ''} aria-label="Slide ${index + 1}"></button>`;
                        });
                        html += '</div>';

                        html += '<div class="carousel-inner">';
                        videos.forEach(function (video, index) {
                            html += `<div class="carousel-item ${index === 0 ? 'active' : ''}">`;
                            html += '<video class="img-fluid" style="width: 100%;" muted autoplay loop >'
                            html += `<source src="${video.link}" type="video/mp4"/>`
                            html += '</video>'
                            html += '</div>';
                        });
                        html += '</div>';

                        html += '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">';
                        html += '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                        html += '<span class="visually-hidden">Previous</span>';
                        html += '</button>';
                        html += '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">';
                        html += '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                        html += '<span class="visually-hidden">Next</span>';
                        html += '</button>';

                        html += '</div>';
                        // Insert the HTML content into the modal body
                        $('#modal-body').html(html);
                        $('#title-modal-tour').html('Video bài viết');
                        $('#modal_blogs').modal('show');

                        // Add event listeners to the carousel to control video playback
                        $('#carouselExampleIndicators').on('slide.bs.carousel', function (event) {
                            var activeVideo = $(event.relatedTarget).find('video').get(0);
                            $('video').each(function () {
                                if (this !== activeVideo) {
                                    this.pause();
                                    this.currentTime = 0;
                                    this.muted = true;
                                }
                            });
                            if (activeVideo) {
                                activeVideo.muted = false;
                                activeVideo.play();
                            }
                        });

                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    });

</script>
