<script>
    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelectorAll('.room_detail');

        links.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var id = this.dataset.id;
                $.ajax({
                    url: 'chi-tiet-room/' + id,
                    type: 'GET',
                    success: function (response) {
                        // Parse the image array
                        var images = JSON.parse(response.imageArray);

                        // Start building the HTML content for the blog details
                        var html = '<div class="col-md-12 blog_details">';
                        html += '<h5 style="text-align: center;">' + response.name + '</h5>';
                        html += '<br/>';
                        html += response.content;
                        html += '</div>';


                        $('#modal-body').html(html);
                        $('#title-modal-tour').html('Chi tiết phòng');
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
