@extends('admin_view.master')
@section('css_view')
    @include('admin_view.layouts_view.Header.jsHeader')
    @include('admin_view.layouts_view.Header.cssHearder')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Danh Mục Vị Trí</a></li>
                            <li class="breadcrumb-item" aria-current="page">Thêm Mới</li>
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
            <div class="col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                <!-- Basic Inputs -->
                <form class="card" action="{{ route('create_category') }}" method="POST" id="formReset">
                    @csrf
                    <div class="card-header">
                        <h5>Thêm Mới Danh Mục Vị Trí</h5>
                    </div>
                    <div class="card-body">
                        @error('status')
                        <div class="alert alert-primary">
                            <div class="media align-items-center">
                                <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
                                <div class="media-body ms-3">{{ $message }}.</div>
                            </div>
                        </div>
                        @enderror
                        <div class="form-group">
                            <label class="form-label">Tên vị trí</label>
                            <input type="text" class="form-control form-control" placeholder="Tên danh mục"
                                   onkeyup="ChangeToSlug();" fdprocessedid="w3ptog" name="name" id="slug"
                                   value="{{ old('name') }}">
                            @error('name')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                            @error('slug')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Đường dẫn sạch</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}"
                                   id="convert_slug" placeholder="Đường dẫn sạch" readonly fdprocessedid="qaalh">
                        </div>
                        <div class="form-group row mb-0">
                            <label class="form-label">Trạng thái</label>
                            <div class="col-sm-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="0"
                                           id="customCheckinlhstate1" {{ old('status') == '0' ? 'checked' : '' }}
                                           data-gtm-form-interact-field-id="2">
                                    <label class="form-check-label" for="customCheckinlhstate1"> Hiện </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="1"
                                           id="customCheckinlhstate2" {{ old('status') == '1' ? 'checked' : '' }}
                                           data-gtm-form-interact-field-id="1">
                                    <label class="form-check-label" for="customCheckinlhstate2"> Ẩn </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary me-2" type="submit">Thêm Mới</button>
                        <button type="reset" class="btn btn-light" id="resetBtn">Đặt Lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script language="javascript">
        function ChangeToSlug()
        {
            var slug, convert_slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("slug").value;

            //Đổi chữ hoa thành chữ thường
            convert_slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            convert_slug = convert_slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            convert_slug = convert_slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            convert_slug = convert_slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            convert_slug = convert_slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            convert_slug = convert_slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            convert_slug = convert_slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            convert_slug = convert_slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            convert_slug = convert_slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            convert_slug = convert_slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            convert_slug = convert_slug.replace(/\-\-\-\-\-/gi, '-');
            convert_slug = convert_slug.replace(/\-\-\-\-/gi, '-');
            convert_slug = convert_slug.replace(/\-\-\-/gi, '-');
            convert_slug = convert_slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            convert_slug = '@' + convert_slug + '@';
            convert_slug = convert_slug.replace(/\@\-|\-\@|\@/gi, '');
            //In convert_slug ra textbox có id “convert_slug”
            document.getElementById('convert_slug').value = convert_slug;
        }
    </script>
@stop
