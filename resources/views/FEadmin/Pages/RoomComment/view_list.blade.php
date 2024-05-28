@extends ('FEadmin.master')
@php
    use Carbon\Carbon;
@endphp
@section('css_view')
    @include('FEadmin.Layout.Head.css_dataTable')
    <style>
        .carousel-item img {
            max-height: 500px; /* Đặt chiều cao tối đa cho hình ảnh */
            width: auto; /* Chiều rộng tự động để giữ tỷ lệ */
            object-fit: cover; /* Điều này sẽ bảo đảm hình ảnh phủ kín không gian mà không bị méo */
        }

    </style>
@stop
@section('view')
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Kinh doanh</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Phản hồi Phòng</a></li>
                            <li class="breadcrumb-item" aria-current="page">Danh Sách</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        {{-- <div class="page-header-title">
                        <h2 class="mb-0">Thống Kê</h2>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Danh Sách Phản Hồi Phòng</h5>
                    </div>
                    <div class="card-body">
                        <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap"
                               style="width: 100%">
                            <thead>
                            <tr>
                                <th>stt</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Phản hồi Khách Hàng</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($list as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>
                                        <textarea class="form-control" rows="3" style="max-width: 400px;" readonly>{{$value->commentUser}}</textarea>
                                    </td>
                                    <td>
                                        @if ($value->status == 0)
                                            <span class="badge rounded-pill text-bg-success">Chưa phản hồi</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-warning text-dark">Đã phản hồi</span>
                                        @endif
                                    </td>
                                    <td class="action">

                                        <div class="btn-group-dropdown">
                                            <button
                                                class="btn btn-outline-secondary dropdown-toggle btn-sm mg-button-left"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">Lựa chọn
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item text-inverse pr-10 comment_room_detail"
                                                   data-id="{{ $value->id }}" data-toggle="tooltip" title="Edit">
                                                        <span
                                                            style="display: flex; justify-content: flex-start; color: #2686dc;"><i
                                                                class="ti ti-eye me-1"></i>Xem Comment User</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0);" title="Delete" onclick="openDeleteCommentModal('{{ $value->detail }}', '{{ route('delete_comment_room', $value->id) }}')">
                                                    <span style="display: flex; justify-content: flex-start; color: #dc2626;"><i class="ti ti-trash me-1"></i> Xóa</span>
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteCommentModal" tabindex="-1" aria-labelledby="deleteCommentModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteCommentModalLabel">Xác Nhận Xóa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn Có Chắc Xóa Phản Hồi <span id="commentDetail"></span> Này Không?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-danger" id="confirmDeleteCommentBtn">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('FEadmin.Layout.Body.modal_blog')
@stop
@section('view_js')
    @include('FEadmin.Layout.JS.modal_room_comment_details')
    @include('FEadmin.Layout.Fooder.js_dataTable')
    <script !src="">
        function openDeleteCommentModal(commentDetail, deleteUrl) {
            document.getElementById('commentDetail').innerText = commentDetail;
            document.getElementById('confirmDeleteCommentBtn').onclick = function() {
                window.location.href = deleteUrl;
            };
            var deleteCommentModal = new bootstrap.Modal(document.getElementById('deleteCommentModal'));
            deleteCommentModal.show();
        }

    </script>
@stop
