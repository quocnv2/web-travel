@extends ('FEadmin.master')
@php
    use Carbon\Carbon;
@endphp
@section('css_view')
    @include('FEadmin.Layout.Head.css_dataTable')
@stop
@section('view')
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Hệ Thống</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Bài viết tuyển dụng</a></li>
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
                        <h5>Danh Sách Tuyển dụng</h5>
                    </div>
                    <div class="card-body">
                        <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap"
                               style="width: 100%">
                            <thead>
                            <tr>
                                <th>stt</th>
                                <th>Tiêu đề</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($list as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ Carbon::parse($value->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY, H:mm:ss A') }}
                                    </td>
                                    <td>
                                        @if (intval($value->status == 0))
                                            <span class="badge rounded-pill text-bg-success">Hiện</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-warning text-dark">Ẩn</span>
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
                                                <a class="dropdown-item text-inverse pr-10 blog_detail"
                                                   data-id="{{ $value->slug }}" data-toggle="tooltip" title="Edit">
                                                        <span
                                                            style="display: flex; justify-content: flex-start; color: #2686dc;"><i
                                                                class="ti ti-eye me-1"></i> Xem</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0);" title="Delete" onclick="openDeleteRecruitmentModal('{{ $value->title }}', '{{ route('delete_recruitment', $value->slug) }}')">
                                                    <span style="display: flex; justify-content: flex-start; color: #dc2626;"><i class="ti ti-trash me-1"></i> Xóa</span>
                                                </a>

                                                <a class="dropdown-item"
                                                   href="{{route('view_update_recruitment', $value->slug) }}"><span
                                                        style="display: flex; justify-content: flex-start; color: #2ca87f;"><i
                                                            class="ti ti-pencil me-1"></i> Cập Nhật</span></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="customer-modal-{{$value->id}}"
                                     data-bs-keyboard="false"
                                     tabindex="-1"
                                     aria-hidden="true">
                                    <div
                                        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content container-fluid">
                                            <div class="modal-header border-0 pb-0"
                                                 style="display: flex; justify-content: space-between;">
                                                <h5 class="mb-0">Nội Dung Tuyển Dụng</h5>
                                                <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default"
                                                   data-bs-dismiss="modal">
                                                    <i class="ti ti-x f-20"></i>
                                                </a>
                                            </div>
                                            <div class="modal-body">
                                                {!! $value->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteRecruitmentModal" tabindex="-1" aria-labelledby="deleteRecruitmentModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteRecruitmentModalLabel">Xác Nhận Xóa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn Có Chắc Muốn Xóa Bài Tuyển Dụng <span id="recruitmentTitle"></span> Không?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-danger" id="confirmDeleteRecruitmentBtn">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('FEadmin.Layout.Body.modal_detail_blog')
@stop
@section('view_js')
    @include('FEadmin.Layout.JS.modal_blog')
    @include('FEadmin.Layout.Fooder.js_dataTable')
    <script !src="">
        function openDeleteRecruitmentModal(recruitmentTitle, deleteUrl) {
            document.getElementById('recruitmentTitle').innerText = recruitmentTitle;
            document.getElementById('confirmDeleteRecruitmentBtn').onclick = function() {
                window.location.href = deleteUrl;
            };
            var deleteRecruitmentModal = new bootstrap.Modal(document.getElementById('deleteRecruitmentModal'));
            deleteRecruitmentModal.show();
        }

    </script>
@stop
