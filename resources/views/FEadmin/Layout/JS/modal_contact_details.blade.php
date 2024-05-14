<script>
    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelectorAll('.contact_detail');
        links.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var id = this.dataset.id;
                $.ajax({
                    url: 'chi-tiet-lien-he/' + id,
                    type: 'GET',
                    success: function (response) {
                        // Parse the image array

                        var html = '';
                        // Start building the HTML content for the blog details
                        html += '<div class="card-body">' +
                            '<div class="comment" style="padding: 20px; background: aliceblue; border-radius: 20px;">' +
                            '<div class="d-flex align-items-center mb-3">' +
                            '<div class="chat-avtar"><img class="rounded-circle img-fluid wid-40" src="../assets/images/user/avatar-2.jpg" alt="User image">' +
                            '<div class="bg-success chat-badge"></div>' +
                            '</div>' +
                            '<div class="flex-grow-1 mx-2">' +
                            '<h5 class="mb-0">' + response.name + '</h5><span class="text-sm text-muted">' + response.email + '</span>' +
                            '</div>' +
                            '</div>' +
                            '<p class="my-4">' + response.commentUser + '</p>' +
                            '</div>' +

                            '</div>' +
                            '</div>' +

                            '</div>';


                        $('#modal-body').html(html);
                        $('#title-modal-tour').html('Chi tiết liên hệ');
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
