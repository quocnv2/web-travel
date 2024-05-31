<script>
    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelectorAll('.contact_tour_detail');
        links.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var id = this.dataset.id;
                $.ajax({
                    url: 'chi-tiet-tour-rieng/' + id,
                    type: 'GET',
                    success: function (response) {
                        var feedback = response.feedback ? response.feedback : '';
                        var html = '';
                        html += '<div class="card-body">' +
                            '<div class="form-group">' +
                            '<div class="row">' +
                            '<div class="form-group col-md-6 col-6">' +
                            '<label for="number_of_adults">Số Lượng Người Lớn</label>' +
                            '<input type="text" id="number_of_adults" name="number_of_adults" class="form-control" value="' + (response.number_of_adults || '') + '">' +
                            '</div>' +
                            '<div class="form-group col-md-6 col-6">' +
                            '<label for="number_of_children">Số Lượng Trẻ Em</label>' +
                            '<input type="text" id="number_of_children" name="number_of_children" class="form-control" value="' + (response.number_of_children || '') + '">' +
                            '</div>' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<div class="comment" style="padding: 20px; background: aliceblue; border-radius: 20px;">' +
                            '<div class="d-flex align-items-center mb-3">' +
                            '<div class="chat-avtar"><img class="rounded-circle img-fluid wid-40" src="../assets/images/user/avatar-2.jpg" alt="User image">' +
                            '<div class="bg-success chat-badge"></div>' +
                            '</div>' +
                            '<div class="flex-grow-1 mx-2">' +
                            '<h5 class="mb-0">' + response.name + '</h5><span class="text-sm text-muted">' + response.email + '</span>' +
                            '</div>' +
                            '</div>' +
                            '<p class="my-4">' + response.note + '</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<div class="comment" style="padding: 20px; background: aliceblue; border-radius: 20px;">' +
                            '<div class="d-flex align-items-center mb-3">' +
                            '<div class="chat-avtar"><img class="rounded-circle img-fluid wid-40" src="../assets/images/user/avatar-2.jpg" alt="User image">' +
                            '<div class="bg-success chat-badge"></div>' +
                            '</div>' +
                            '<div class="flex-grow-1 mx-2">' +
                            '<h5 class="mb-0">Admin</h5>' +
                            '<span class="text-sm text-muted">Quản Trị</span>' +
                            '</div>' +
                            '</div>' +
                            '<textarea id="feedback" class="form-control" name="feedback" rows="3" cols="50">' + response.feedback + '</textarea>' +
                            '</div>' +
                            '<div style="margin-top: 20px; display: flex; justify-content: flex-end; padding: 0px 12px;">' +
                            '<button id="updateButton" class="btn btn-primary">Phản hồi tư vấn</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('#modal-body').html(html);
                        $('#title-modal-tour').html('Chi tiết');
                        $('#modal_blogs').modal('show');




                        $('#updateButton').on('click', function () {
                            var feedback = $('#feedback').val();
                            $.ajax({
                                url: 'cap-nhat-tour-rieng/' + id,
                                type: 'POST',
                                data: {
                                    feedback: feedback,
                                    status: 1,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function (response) {
                                    swal("Cập Nhật Tư Vấn Thành Công!",
                                        "Thông Báo Từ Hệ Thống!",
                                        "success", {
                                            button: "OK",
                                            timer: 5000,
                                        }).then(() => {
                                        location.reload();
                                    });
                                    $('#modal_blogs').modal('hide');
                                },
                                error: function (xhr) {
                                    swal("Cập Nhật Phản Hồi Thất Bại!",
                                        "Thông Báo Từ Hệ Thống!",
                                        "error", {
                                            button: "OK",
                                        });
                                    console.log(xhr.responseText);
                                }
                            });
                        });

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
