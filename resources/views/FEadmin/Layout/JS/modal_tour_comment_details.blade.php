<script>
    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelectorAll('.comment_tour_detail');
        links.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var id = this.dataset.id;
                $.ajax({
                    url: 'chi-tiet-phan-hoi-tour/' + id,
                    type: 'GET',
                    success: function (response) {
                        var html = '<div class="col-md-12 blog_details">';
                        html += '<br/>';
                        html += "Nội dung comment của User : " + response.commentUser;
                        html += '<br/>';
                        html += "Nội dung phản hồi của Admin";
                        html += '<br/>';
                        html += '<textarea id="commentAdmin" class="form-control" name="commentAdmin" rows="4" cols="50">' + response.commentAdmin + '</textarea>';
                        html += '<br/>';
                        html += '<button id="updateButton" class="btn btn-primary">Cập nhật</button>';
                        html += '</div>';
                        $('#modal-body').html(html);
                        $('#title-modal-tour').html('Phản hồi');
                        $('#modal_blogs').modal('show');

                        $('#updateButton').on('click', function () {
                            var updatedComment = $('#commentAdmin').val(); // Sửa ở đây để lấy đúng giá trị từ textarea
                            $.ajax({
                                url: 'cap-nhat-phan-hoi-tour/' + id,
                                type: 'POST',
                                data: {
                                    commentAdmin: updatedComment,
                                    _token: '{{ csrf_token() }}' // Đảm bảo CSRF token được đưa vào đúng
                                },
                                success: function (response) {
                                    swal("Cập Nhật Phản Hồi Thành Công!", "Thông Báo Từ Hệ Thống!", "success", {
                                        button: "OK",
                                        timer: 5000,
                                    });
                                    $('#modal_blogs').modal('hide');
                                },
                                error: function (xhr) {
                                    swal("Cập Nhật Phản Hồi Thất Bại!", "Thông Báo Từ Hệ Thống!", "error", {
                                        button: "OK",
                                    });
                                }
                            });
                        });
                    },
                    error: function (xhr) {
                        console.log("Lỗi AJAX: " + xhr.responseText); // Chi tiết hơn về lỗi
                    }
                });
            });
        });
    });
</script>
