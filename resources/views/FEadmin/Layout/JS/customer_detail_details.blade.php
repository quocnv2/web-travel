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
                            '<div class="form-group col-md-6 col-6">' +
                            '<label for="number_of_adults">Số Lượng Người Lớn</label>' +
                            '<input type="text" id="number_of_adults" name="number_of_adults" class="form-control" value="' + (response.number_of_adults || '') + '">' +
                            '</div>' +
                            '<div class="form-group col-md-6 col-6">' +
                            '<label for="number_of_children">Số Lượng Trẻ Em</label>' +
                            '<input type="text" id="number_of_children" name="number_of_children" class="form-control" value="' + (response.number_of_children || '') + '">' +
                            '</div>' +
                            '<div class="form-group col-md-3 col-3">' +
                            '<label for="tour_code">Mã tour</label>' +
                            '<input type="text" id="tour_code" class="form-control" readonly value="' + (response.tour_code || '') + '">' +
                            '</div>' +
                            '<div class="form-group col-md-6 col-6">' +
                            '<label for="tour_name">Tên tour</label>' +
                            '<input type="text" id="tour_name" class="form-control" readonly value="' + (response.tour_name || '') + '">' +
                            '</div>' +
                            '<div class="form-group col-md-3 col-3">' +
                            '<label for="tour_price">Giá tour</label>' +
                            '<input type="text" id="tour_price" class="form-control" readonly value="' + (response.tour_price || '') + '">' +
                            '</div>' +
                            '<div class="form-group col-md-3 col-3">' +
                            '<label for="room_code">Mã phòng</label>' +
                            '<input type="text" id="room_code" class="form-control" readonly value="' + (response.room_code || '') + '">' +
                            '</div>' +
                            '<div class="form-group col-md-6 col-6">' +
                            '<label for="hotel_name">Tên phòng</label>' +
                            '<input type="text" id="hotel_name" class="form-control" readonly value="' + (response.hotel_name || '') + '">' +
                            '</div>' +
                            '<div class="form-group col-md-3 col-3">' +
                            '<label for="room_price">Giá phòng</label>' +
                            '<input type="text" id="room_price" class="form-control" readonly value="' + (response.room_price || '') + '">' +
                            '</div>' +
                            '<div class="form-group col-md-4 col-4">' +
                            '<label for="total_tour_price">Tổng Tiền Tour</label>' +
                            '<input type="text" id="total_tour_price" name="total_tour_price" class="form-control" value="' + (response.total_tour_price || '') + '">' +
                            '</div>' +
                            '<div class="form-group col-md-4 col-4">' +
                            '<label for="total_room_price">Tổng Tiền Phòng</label>' +
                            '<input type="text" id="total_room_price" name="total_room_price" class="form-control" value="' + (response.total_room_price || '') + '">' +
                            '</div>' +
                            '<div class="form-group col-md-4 col-4">' +
                            '<label for="total_price">Tổng Tiền</label>' +
                            '<input type="text" id="total_price" name="total_price" class="form-control" value="' + (response.total_price || '') + '">' +
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

                        function updateTotalPrice() {
                            var totalTourPrice = parseFloat($('#total_tour_price').val()) || 0;
                            var totalRoomPrice = parseFloat($('#total_room_price').val()) || 0;
                            var totalPrice = totalTourPrice + totalRoomPrice;
                            $('#total_price').val(totalPrice);
                        }

                        $('#total_tour_price, #total_room_price').on('input', updateTotalPrice);

                        $('#updateButton').on('click', function () {
                            var feedback = $('#feedback').val();
                            var number_of_adults = $('#number_of_adults').val();
                            var number_of_children = $('#number_of_children').val();
                            var total_tour_price = $('#total_tour_price').val();
                            var total_room_price = $('#total_room_price').val();
                            var total_price = $('#total_price').val();

                            $.ajax({
                                url: 'cap-nhat-khach-hang/' + id,
                                type: 'POST',
                                data: {
                                    number_of_adults: number_of_adults,
                                    number_of_children: number_of_children,
                                    total_tour_price: total_tour_price,
                                    total_room_price: total_room_price,
                                    total_price: total_price,
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

