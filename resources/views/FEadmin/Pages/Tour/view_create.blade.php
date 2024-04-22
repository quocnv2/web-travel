@extends ('FEadmin.master')
@section('css_view')
    @include('FEadmin.Layout.Head.Editter.css')
    @include('FEadmin.Layout.Head.Editter.js')
    <style>
        #editor {
            width: 100%;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 400px;
        }

        .ck-content .image {
            /* Block images */
            max-width: 80%;
            margin: 20px auto;
        }

        input[type="file"] {
            display: none;
        }

        .box-input-1 {
            text-align: center;
            background-color: #dfc8ca;
            padding: 4.5rem 1.25rem;
        }

        .custom-file-1 {
            font-size: 18px;
            display: inline-block;
            padding: 10px 7px;
            cursor: pointer;
            background-color: #d3394c;
            font-weight: 600;
            color: #fff;
            width: 180px;
            font-family: "Times New Roman", Times, serif;
        }

        .custom-file-1:hover {
            background-color: #007bff;
        }

        .custom-file-2 {
            display: inline-block;
            padding: 15px 10px;
            cursor: pointer;
            background-color: #d3394c;
            color: #fff;
            text-overflow: ellipsis;
            border-radius: 50%;
            font-family: "Times New Roman", Times, serif;
        }

        .custom-file-2 i {
            font-size: 48px;
        }

        #filesel_2 {
            display: block;
            color: #d3394c;
            font-weight: 700;
        }

        .custom-file-3 {
            border: 1px solid #d3394c;
            background-color: #f1e5e6;
            padding: 0;
            display: inline-flex;
            max-width: 350px;
        }

        #filesel_3 {
            width: 200px;
            min-height: 2.5em;
            display: inline-block;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            vertical-align: middle;
            padding: 7px;
            text-align: left;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
        }

        #filechoose_3 {
            width: 160px;
            min-height: 2.5em;
            display: inline-block;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            vertical-align: middle;
            padding: 7px;
            text-align: center;
            background-color: #d3394c;
            color: #fff;
            font-weight: 700;
            font-size: 18px;
            cursor: pointer;
            font-family: "Times New Roman", Times, serif;
        }

        .custom-file-3:hover {
            border-color: #007bff;
        }

        .custom-file-3:hover #filechoose_3 {
            background-color: #007bff;
            border-color: #007bff;
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
                            <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Hệ Thống</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Tour</a></li>
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
                <form class="card" action="{{ route('create_recruitment') }}" method="POST" id="formReset">
                    @csrf
                    <div class="card-header">
                        <h5>Thêm Mới Bài viết Tour</h5>
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
                        <div class="form-group col-12 col-md-7">
                            <label class="form-label">Tên</label>
                            <input type="text" class="form-control form-control" placeholder="Tên"
                                onkeyup="ChangeToSlug();" fdprocessedid="w3ptog" name="name" id="slug"
                                value="{{ old('name') }}">
                            @error('title')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                            @error('slug')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-5">
                            <label class="form-label">Đường dẫn sạch</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}"
                                id="convert_slug" placeholder="Đường dẫn sạch" readonly fdprocessedid="qaalh">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Ảnh Banner</label>
                            <div class=" input-group  ">
                                <input type="file" class="form-control" id="inputGroupFile02" name="file">
                                <label class="input-group-text" for="inputGroupFile02">Ảnh</label>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-3">
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
                        <div class="form-group col-12 col-md-3">
                            <label class="form-label">Tỉnh Thành</label>
                            <select class="form-select" id="city" name="province">
                                <option value="" selected>Chọn Tỉnh Thành/ Thành Phố</option>
                            </select>
                            @error('province')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label class="form-label">Quận/Huyện</label>
                            <select class="form-select" id="district" name="district">
                                <option value="" selected>Chọn Quận/Huyện</option>
                            </select>
                            @error('district')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label class="form-label">Phường/Xã</label>
                            <select class="form-select" id="ward" name="wards">
                                <option value="" selected>Chọn Phường/Xã</option>
                            </select>
                            @error('wards')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Giá người lớn</label>
                            <input type="text" class="form-control form-control" placeholder="Giá người lớn"
                                name="price_adult" value="{{ old('price_adult') }}">
                            @error('price_adult')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Giá trẻ em</label>
                            <input type="text" class="form-control form-control" placeholder="Giá trẻ em"
                                name="price_child" value="{{ old('price_child') }}">
                            @error('price_child')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="col-12 col-md-6">
                            <div class="box-input-1">
                                <label for="imgUpload_2" class="custom-file-2">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </label>
                                <span id="filesel_2">Chọn Ảnh Chi Tiết...</span>
                                <input type="file" id="imgUpload_2" name="filesImage[]" accept="image/*"
                                    multiple="">
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <div class="box-input-1">
                                <label for="imgUpload_2" class="custom-file-2">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </label>
                                <span id="filesel_2">Chọn Video Chi Tiết...</span>
                                <input type="file" id="imgUpload_2" name="filesVideo[]" accept="image/*"
                                    multiple="">
                            </div>
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
                                <textarea name="content" id="editor">
                                        {{ old('content') ?? 'Nội Dung Bài Viết' }}
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
        (function() {
            ClassicEditor.create(document.querySelector('#classic-editor')).catch((error) => {
                console.error(error);
            });
        })();
    </script>

    <script type="text/javascript">
        $("#imgUpload_2").change(function() {
            var numFiles = $(this)[0].files.length;
            if (numFiles < 2) {
                $('#filesel_2').text(numFiles + ' file selected');
            } else {
                $('#filesel_2').text(numFiles + ' files selected');
            }
        });

        $("#imgUpload_3").change(function() {
            var numFiles = $(this)[0].files.length;
            if (numFiles < 2) {
                $('#filesel_3').text(numFiles + ' file selected');
            } else {
                $('#filesel_3').text(numFiles + ' files selected');
            }
        });
    </script>
@stop
