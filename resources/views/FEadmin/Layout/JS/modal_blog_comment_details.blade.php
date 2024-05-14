<script>
    document.addEventListener('DOMContentLoaded', function() {
        var links = document.querySelectorAll('.comment_blog_detail');
        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var id = this.dataset.id;
                $.ajax({
                    url: 'chi-tiet-phan-hoi-blog/' + id,
                    type: 'GET',
                    success: function(response) {
                        var html = '';
                        if (response.commentAdmin && response.commentAdmin.trim() !== '') {
                            html += '<div class="comment-block">' +
                                '<div class="comment" style="padding: 20px;">' +
                                '<div class="d-flex align-items-start">' +
                                '<div class="chat-avtar flex-shrink-0"><img class="rounded-circle img-fluid wid-40" src="../assets/images/user/avatar-3.jpg" alt="User image">' +
                                '<div class="bg-success chat-badge"></div>' +
                                '</div>' +
                                '<div class="flex-grow-1 ms-3"><h5 class="mb-0">'+response.name+'</h5>' +
                                '<span class="text-sm text-muted">Khách Hàng</span></div>' +
                                '</div>' +
                                '<div class="comment-content">' +
                                '<p class="mb-2 mt-3">' + response.commentUser +
                                '</p>' +
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
                                '<textarea id="commentAdmin" class="form-control" name="commentAdmin" rows="3" cols="50">' +
                                response.commentAdmin + '</textarea>' +
                                '</div>' +
                                '</div>' +
                                '<div style="margin-top: 20px; display: flex; justify-content: flex-end; padding: 0px 12px;">' +
                                '<button id="updateButton" class="btn btn-primary">Phản Hồi</button>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                        } else {
                            html += '<div class="card-body">' +
                                '<div class="comment" style="padding: 20px; background: aliceblue; border-radius: 20px;">' +
                                '<div class="d-flex align-items-center mb-3">' +
                                '<div class="chat-avtar"><img class="rounded-circle img-fluid wid-40" src="../assets/images/user/avatar-2.jpg" alt="User image">' +
                                '<div class="bg-success chat-badge"></div>' +
                                '</div>' +
                                '<div class="flex-grow-1 mx-2">' +
                                '<h5 class="mb-0">John Doe</h5><span class="text-sm text-muted">Technical Department</span>' +
                                '</div>' +
                                '</div>' +
                                '<p class="my-4">' + response.commentUser + '</p>' +
                                '</div>' +
                                '<div class="d-flex align-items-center mt-3"><img class="img-radius d-none d-sm-inline-flex me-3 wid-40 rounded-circle" src="../assets/images/user/avatar-1.jpg" alt="User image">' +
                                '<div class="flex-grow-1 me-3">' +
                                '<div>' +
                                '<textarea id="commentAdmin" class="form-control" name="commentAdmin" rows="1" cols="50">' +
                                response.commentAdmin + '</textarea>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div style="margin-top: 20px; display: flex; justify-content: flex-end; padding: 0px 12px;">' +
                                '<button id="updateButton" class="btn btn-primary">Phản Hồi</button>' +
                                '</div>' +
                                '</div>';
                        }

                        $('#modal-body').html(html);
                        $('#title-modal-blog').html('Phản hồi');
                        $('#modal_blogs').modal('show');

                        $('#updateButton').on('click', function() {
                            var updatedComment = $('#commentAdmin').val();
                            $.ajax({
                                url: 'cap-nhat-phan-hoi-blog/' + id,
                                type: 'POST',
                                data: {
                                    commentAdmin: updatedComment,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    swal("Cập Nhật Phản Hồi Thành Công!",
                                        "Thông Báo Từ Hệ Thống!",
                                        "success", {
                                            button: "OK",
                                            timer: 5000,
                                        });
                                    $('#modal_blogs').modal(
                                        'hide');
                                },
                                error: function(xhr) {
                                    swal("Cập Nhật Phản Hồi Thất Bại!",
                                        "Thông Báo Từ Hệ Thống!",
                                        "error", {
                                            button: "OK",
                                        });
                                }
                            });
                        });
                    },
                    error: function(xhr) {
                        console.log("Lỗi AJAX: " + xhr.responseText);
                    }
                });
            });
        });
    });
</script>
