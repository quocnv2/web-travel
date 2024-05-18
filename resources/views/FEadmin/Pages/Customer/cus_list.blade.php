@extends ('FEadmin.master')
@php
    use Carbon\Carbon;
@endphp
@section('css_view')
    @include('FEadmin.Layout.Head.css_dataTable')
    <style>
        .carousel-item img {
            max-height: 500px;
            /* Đặt chiều cao tối đa cho hình ảnh */
            width: auto;
            /* Chiều rộng tự động để giữ tỷ lệ */
            object-fit: cover;
            /* Điều này sẽ bảo đảm hình ảnh phủ kín không gian mà không bị méo */
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Phản hồi contact</a></li>
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
                        <h5>Danh Sách Phản Hồi</h5>
                    </div>
                    <div class="card-body">
                        <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Số Lượng Người Lớn</th>
                                    <th>Số Lượng Trẻ Em</th>
                                    <th>Ngày Đi</th>
                                    <th>Mã Tour</th>
                                    <th>Tên Tour</th>
                                    <th>Giá Tour</th>
                                    <th>Mã Phòng</th>
                                    <th>Tên Khách Sạn</th>
                                    <th>Tên Phòng</th>
                                    <th>Giá Phòng</th>
                                    <th>Thành Tiền</th>
                                    <th>Ghi Chú </th>
                                    <th>Phản Hồi</th>
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
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->number_of_adults }}</td>
                                        <td>{{ $value->number_of_children }}</td>
                                        <td>{{ $value->date }}</td>
                                        <td>{{ $value->tour_code }}</td>
                                        <td>{{ $value->tour_name }}</td>
                                        <td>{{ number_format($value->tour_price) }} VNĐ</td>
                                        <td>{{ $value->room_code }}</td>
                                        <td>{{ $value->hotel_name }}</td>
                                        <td>{{ $value->room_name }}</td>
                                        <td>{{ number_format($value->room_price) }} VNĐ</td>
                                        <td>{{ number_format($value->total_price) }} VNĐ</td>
                                        <td>
                                            <textarea class="form-control" rows="3" style="max-width: 400px;" readonly>{{ $value->note }}</textarea>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="3" style="max-width: 400px;" readonly>{{ $value->feedback }}</textarea>
                                        </td>
                                        <td>
                                            @if ($value->status == 0)
                                                <span class="badge badge-warning">Chờ xác nhận</span>
                                            @elseif ($value->status == 1)
                                                <span class="badge badge-success">Đã xác nhận</span>
                                            @elseif ($value->status == 2)
                                                <span class="badge badge-danger">Đã hủy</span>
                                            @endif
                                        </td>
                                        <td class="action">
                                            <a href="{{ route('update_customer', $value->id) }}"
                                                class="btn btn-sm btn-primary">Sửa</a>
                                            <a href="{{ route('delete', $value->id) }}"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('
                                                    Bạn có chắc chắn muốn xóa booking này?')">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('FEadmin.Layout.Body.modal_blog')
@stop
@section('view_js')
    @include('FEadmin.Layout.JS.modal_contact_details')
    @include('FEadmin.Layout.Fooder.js_dataTable')
@stop
