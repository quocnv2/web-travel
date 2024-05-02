@extends ('FEadmin.master')
@section('css_view')
    @include('FEadmin.Layout.Head.Editter.css')
    @include('FEadmin.Layout.Head.Editter.js')
    @include('FEadmin.Layout.Head.Tour.css')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Bài Viết</a></li>
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
            <div class="col-sm-12 col-md-8 offset-md-2 col-lg-10 offset-lg-1">
                <!-- Basic Inputs -->
                <form class="card" method="POST" id="formReset"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h5>Cập Nhật Bài Viết {{$obj->name}}</h5>
                    </div>
                    <div class="card-body row">
                        @error('status')
                        <div class="alert alert-primary">
                            <div class="media align-items-center">
                                <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
                                <div class="media-body ms-3">{{ $message }}.</div>
                            </div>
                        </div>
                        @enderror

                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Tên</label>
                            <input type="text" class="form-control form-control" placeholder="Tên"
                                   onkeyup="ChangeToSlug();" fdprocessedid="w3ptog" name="name" id="slug"
                                   value="{{ $obj->name }}">
                            @error('name')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                            @error('slug')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Đường dẫn sạch</label>
                            <input type="text" class="form-control" name="slug" value="{{ $obj->slug }}"
                                   id="convert_slug" placeholder="Đường dẫn sạch" readonly fdprocessedid="qaalh">
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label class="form-label" for="exampleSelect1">Vị Trí</label>
                            <select class="form-select" id="exampleSelect1" name="idCategory">
                                @foreach ($list_Category->sortBy('name') as $value)
                                    @if ($value->status == 0)
                                        <option value="{{ $value->id }}"
                                                @if ($value->id == old('idCategory')) selected @endif>
                                            {{ $value->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('idCategory')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-7">
                            <label class="form-label" for="exampleSelect1">Tour</label>
                            <select class="form-select" id="exampleSelect1" name="codeTour">
                                @foreach ($list_Tour->sortBy('name') as $value)
                                    @if ($value->status == 0)
                                        <option value="{{ $value->code }}"
                                                @if ($value->code == old('codeTour')) selected @endif>
                                            {{ $value->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('codeTour')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <div class="row"
                                 style="display: flex;align-content: center;align-items: center; margin-bottom: 10px;">
                                <label class="form-label col-6">Ảnh Banner</label>
                                <div class="col-6" style="display: flex; justify-content: flex-end;">
                                    <button type="button" class="btn btn-shadow btn-success btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#myModal-Banner">Xem
                                    </button>
                                </div>
                                <div class="modal" id="myModal-Banner">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <img src="{{$obj->imgBanner}}" style="width: 100%;" class="rounded"
                                                     alt="Cinque Terre">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-input-1">
                                <label for="imgUpload_1" class="custom-file-2">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </label>
                                <span id="filesel_1">Chọn Ảnh Banner...</span>
                                <input type="file" id="imgUpload_1" name="file" accept="image/*"
                                       multiple="false">
                            </div>
                            @error('file')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <div class="row"
                                 style="display: flex;align-content: center;align-items: center; margin-bottom: 10px;">
                                <label class="form-label col-6">Ảnh Chi Tiết</label>
                                <div class="col-6" style="display: flex; justify-content: flex-end;">
                                    <button type="button" class="btn btn-shadow btn-success btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#myModal-list">Xem
                                    </button>
                                </div>
                                <div class="modal" id="myModal-list">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                                                    <!-- Indicators/dots -->
                                                    <div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#demo"
                                                                data-bs-slide-to="0" class="active"></button>
                                                        <button type="button" data-bs-target="#demo"
                                                                data-bs-slide-to="1"></button>
                                                        <button type="button" data-bs-target="#demo"
                                                                data-bs-slide-to="2"></button>
                                                    </div>

                                                    <!-- The slideshow/carousel -->
                                                    @php
                                                        $imageArray= json_decode($obj->imageArray, true);
                                                    @endphp

                                                            <!-- The slideshow/carousel -->
                                                    <div class="carousel-inner">
                                                        @foreach($imageArray as $index => $image)
                                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                                <img src="{{ $image['link'] }}" class="d-block w-100">
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <!-- Left and right controls/icons -->
                                                    <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#demo" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"></span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                            data-bs-target="#demo" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-input-1">
                                <label for="imgUpload_2" class="custom-file-2">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </label>
                                <span id="filesel_2">Chọn Ảnh Chi Tiết...</span>
                                <input type="file" id="imgUpload_2" name="filesImage[]" accept="image/*"
                                       multiple="">
                            </div>
                            @error('filesImage')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <div class="row"
                                 style="display: flex;align-content: center;align-items: center; margin-bottom: 10px;">
                                <label class="form-label col-6">Video Chi Tiết</label>
                                <div class="col-6" style="display: flex; justify-content: flex-end;">
                                    <button type="button" class="btn btn-shadow btn-success btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#myModal-video">Xem
                                    </button>
                                </div>
                                <div class="modal" id="myModal-video">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div id="demovideo" class="carousel slide" data-bs-ride="carousel">
                                                    <!-- Indicators/dots -->
                                                    <div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#demovideo"
                                                                data-bs-slide-to="0" class="active"></button>
                                                        <button type="button" data-bs-target="#demovideo"
                                                                data-bs-slide-to="1"></button>
                                                        <button type="button" data-bs-target="#demovideo"
                                                                data-bs-slide-to="2"></button>
                                                    </div>
                                                    @php
                                                        $videoArray = json_decode($obj->videoArray, true);
                                                    @endphp

                                                            <!-- The slideshow/carousel -->
                                                    <div class="carousel-inner">
                                                        @foreach($videoArray as $index => $video)
                                                            <div
                                                                    class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                                <video src="{{ $video['link'] }}" class="d-block w-100"
                                                                       controls></video>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <!-- Left and right controls/icons -->
                                                    <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#demovideo" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"></span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                            data-bs-target="#demovideo" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-input-1">
                                <label for="imgUpload_3" class="custom-file-2">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </label>
                                <span id="filesel_3">Chọn Video Chi Tiết...</span>
                                <input type="file" id="imgUpload_3" name="filesVideo[]" accept="video/*"
                                       multiple="">
                            </div>
                            @error('filesVideo')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="form-group col-12">
                            @error('blogDetails')
                            <div class="form-group">
                                <div class="alert alert-danger">
                                    <strong>Cảnh Báo!</strong> Nội Dung Bài Viết Không Được Để Trống!
                                </div>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label class="form-label">Chi Tiết</label>
                                <textarea name="info_details_blog" id="editor">
                                        {{ old('info_details_blog') ?? 'Nội Dung Bài Viết' }}
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group col-12 row mb-0">
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
@section('view_js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    @include('FEadmin.Layout.JS.Account')
    @include('FEadmin.Layout.JS.formTiny')
    @include('FEadmin.Layout.Fooder.js_fooder')
    @include('FEadmin.Layout.JS.Change_to_slug')
    @include('FEadmin.Layout.JS.Reset_button')

    <script src="{{ url('assets') }}/js/plugins/ckeditor/classic/ckeditor.js"></script>
    <script>
        (function () {
            ClassicEditor.create(document.querySelector('#classic-editor')).catch((error) => {
                console.error(error);
            });
        })();
    </script>

    <script type="text/javascript">
        $("#imgUpload_1").change(function () {
            var numFiles = $(this)[0].files.length;
            if (numFiles > 1) {
                swal(
                    "Chỉ Được Chọn 1 Ảnh Banner", "Thông Báo Từ Hệ Thống!", 'error', {
                        button: true,
                        button: "OK",
                        timer: 50000,
                        dangerMode: true,
                    })
                $(this).val('');
                $('#filesel_1').text("Chọn Ảnh Banner...");
            } else {
                $('#filesel_1').text(numFiles + ' file selected');
            }
        });

        $("#imgUpload_2").change(function () {
            var numFiles = $(this)[0].files.length;
            if (numFiles < 2) {
                $('#filesel_2').text(numFiles + ' file selected');
            } else {
                $('#filesel_2').text(numFiles + ' files selected');
            }
        });

        $("#imgUpload_3").change(function () {
            var numFiles = $(this)[0].files.length;
            if (numFiles < 2) {
                $('#filesel_3').text(numFiles + ' file selected');
            } else {
                $('#filesel_3').text(numFiles + ' files selected');
            }
        });
    </script>


@stop
