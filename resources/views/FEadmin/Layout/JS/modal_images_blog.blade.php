<script>
    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelectorAll('.images-blog-detail');
        links.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var id = this.dataset.id;
                $.ajax({
                    url: 'chi-tiet-blog/' + id,
                    type: 'GET',
                    success: function (response) {
                        // Parse the image array
                        var images = JSON.parse(response.imageArray);

                        // Start building the HTML content for the blog details
                        var html = '<div class="col-md-12 blog_details">';

                        html += '<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">';

                        html += '<div class="carousel-indicators">';
                        images.forEach(function (image, index) {
                            html += `<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${index}" ${index === 0 ? 'class="active" aria-current="true"' : ''} aria-label="Slide ${index + 1}"></button>`;
                        });
                        html += '</div>';

                        html += '<div class="carousel-inner">';
                        images.forEach(function (image, index) {
                            html += `<div class="carousel-item ${index === 0 ? 'active' : ''}">`;
                            html += `<img src="${image.link}" class="img-fluid" style="width: 100%" alt="Slide ${index + 1}">`;
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

                        $('#modal-body').html(html);
                        $('#title-modal-tour').html('Ảnh bài viết');
                        $('#modal_blogs').modal('show');

                        var myCarousel = document.querySelector('#carouselExampleIndicators');
                        var carousel = new bootstrap.Carousel(myCarousel, {
                            interval: 2000,
                            wrap: true
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
