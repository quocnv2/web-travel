<script>
    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelectorAll('.customer_detail');
        links.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var id = this.dataset.id;
                $.ajax({
                    url: 'chi-tiet-khach-hang/' + id,
                    type: 'GET',
                    success: function (response) {
                        var feedback = response.feedback ? response.feedback : '';
                        var html = '';
                        html += '<div class="card-body">' +
                            '<div class="form-group">' +
                            '<div class="row">' +
                            '<div class="col-md-3">' +
                            '<label for="tour_code">Mã tour</label>' +
                            '<input type="text" id="tour_code" class="form-control" readonly="true" value="' + response.tour_code + '">' +
                            '</div>' +
                            '<div class="col-md-6">' +
                            '<label for="tour_name">Tên tour</label>' +
                            '<input type="text" id="tour_name" class="form-control" readonly="true" value="' + response.tour_name + '">' +
                            '</div>' +
                            '<div class="col-md-3">' +
                            '<label for="tour_price">Giá tour</label>' +
                            '<input type="text" id="tour_price" class="form-control" readonly="true" value="' + response.tour_price + '">' +
                            '</div>' +
                            '</div>' +
                            '<br>' +
                            '<div class="row">' +
                            '<div class="col-md-3">' +
                            '<label for="room_code">Mã phòng</label>' +
                            '<input type="text" id="room_code" class="form-control" readonly="true" value="' + response.room_code + '">' +
                            '</div>' +
                            '<div class="col-md-6">' +
                            '<label for="hotel_name">Tên phòng</label>' +
                            '<input type="text" id="hotel_name" class="form-control" readonly="true" value="' + response.hotel_name + '">' +
                            '</div>' +
                            '<div class="col-md-3">' +
                            '<label for="room_price">Giá phòng</label>' +
                            '<input type="text" id="room_price" class="form-control" readonly="true" value="' + response.room_price + '">' +
                            '</div>' +
                            '<br>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'+
                            '<p>Tư vấn khách hàng</p>'+
                            '<div class="comment-block">' +
                            '<div class="comment" style="padding: 20px;">' +

                            '<div class="d-flex align-items-start">' +
                            '<div class="chat-avtar flex-shrink-0"><img class="rounded-circle img-fluid wid-40" src="../assets/images/user/avatar-3.jpg" alt="User image">' +
                            '<div class="bg-success chat-badge"></div>' +
                            '</div>' +

                            '<div class="flex-grow-1 ms-3"><h5 class="mb-0">' + response.name + '</h5>' +
                            '<span class="text-sm text-muted">' + response.email + '</span></div>' +
                            '</div>' +
                            '<div class="comment-content">' +
                            '<p class="mb-2 mt-3">' + response.note + '</p>' +
                            '</div>' +
                            '</div>' +
                            '<div class="comment sub-comment" style="padding: 20px;">' +
                            '<div class="d-flex align-items-start">' +
                            '<div class="chat-avtar flex-shrink-0"><img class="rounded-circle img-fluid wid-40" src="../assets/images/user/avatar-1.jpg" alt="User image">' +
                            '<div class="bg-success chat-badge"></div>' +
                            '</div>' +
                            '<div class="flex-grow-1 ms-3">' +
                            '<h5 class="mb-0">Admin</h5>' +
                            '<span class="text-sm text-muted">Quản Trị</span>' +
                            '</div>' +
                            '</div>' +
                            '<div class="comment-content">' +
                            '<div class="card mt-3 mb-0">' +
                            '<div class="card-body">' +
                            '<textarea id="feedback" class="form-control" name="feedback" rows="3" cols="50">' + feedback + '</textarea>' +
                            '</div>' +
                            '</div>' +
                            '<div style="margin-top: 20px; display: flex; justify-content: flex-end; padding: 0px 12px;">' +
                            '<button id="updateButton" class="btn btn-primary">Phản hồi tư vấn</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';


                        $('#modal-body').html(html);
                        $('#title-modal-tour').html('Chi tiết');
                        $('#modal_blogs').modal('show');
                        $('#updateButton').on('click', function () {
                            var feedback = $('#feedback').val();
                            $.ajax({
                                url: 'cap-nhat-khach-hang/' + id,
                                type: 'POST',
                                data: {
                                    feedback: feedback,
                                    status:1,
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

