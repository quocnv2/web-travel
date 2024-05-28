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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Kinh Doanh</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Đăng Ký Tư Vấn</a></li>
                            <li class="breadcrumb-item" aria-current="page">Cập Nhật </li>
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
        <div class="pc-container">
            <div class="pcoded-content">
                <!-- [ stastistic ] start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-4"> Đăng Ký Tư Vấn</h5>
                                <form action="{{ route('update_customer',['id'=>$customer->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $customer->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Tên</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $customer->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ $customer->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">SĐT</label>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    value="{{ $customer->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Số Lượng Người Lớn</label>
                                                <input type="text" class="form-control" id="number_of_adults"
                                                    name="number_of_adults" value="{{ $customer->number_of_adults }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="birthday">Ngày Đi</label>
                                                <input type="date" class="form-control" id="travel_date"
                                                    name="travel_date" value="{{ $customer->travel_date }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sex">Mã Tour</label>
                                                <select class="form-control" id="tour_code" name="tour_code">
                                                    @foreach ($objTours as $tour)
                                                        <option value="{{ $tour->id }}"
                                                            {{ $customer->tour_code == $tour->id ? 'selected' : '' }}>
                                                            {{ $tour->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Giá Tour</label>
                                                <input type="text" class="form-control" id="tour_price" name="tour_price"
                                                    value="{{ $customer->tour_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sex">Mã Phòng</label>
                                                <select class="form-control" id="room_code" name="room_code">
                                                    @foreach ($customer as $room_code)
                                                        <option value="{{ $room_code->id }}"
                                                            {{ $customer->room_code == $room_code->id ? 'selected' : '' }}>
                                                            {{ $room_code->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Tên Khách Sạn</label>
                                            <input type="text" class="form-control" id="hotel_name" name="hotel_name"
                                                value="{{ $customer->hotel_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Giá Phòng</label>
                                            <input type="text" class="form-control" id="room_price" name="room_price"
                                                value="{{ $customer->room_price }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="note">Ghi Chú</label>
                                            <textarea class="form-control" id="note" name="note">{{ $customer->note }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="note">Phản Hồi</label>
                                            <textarea class="form-control" id="feedback" name="feedback">{{ $customer->feedback }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Trạng Thái</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="1" {{ $customer->status == 1 ? 'selected' : '' }}>Đã
                                                    Xác Nhận
                                                    Phòng</option>
                                                <option value="0" {{ $customer->status == 0 ? 'selected' : '' }}>
                                                    Chưa Xác Nhận
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
