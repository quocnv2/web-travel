@extends ('FEadmin.master')
@section('css_view')
    @include('FEadmin.Layout.Head.Editter.css')
    @include('FEadmin.Layout.Head.Editter.js')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Tuyển dụng</a></li>
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
            <div class="col-sm-12 col-md-8 offset-md-2 col-lg-10 offset-lg-1">
                <!-- Basic Inputs -->
                <form class="card" action="{{ route('create_recruitment') }}" method="POST" id="formReset">
                    @csrf
                    <div class="card-header">
                        <h5>Thêm Mới Bài viết tuyển dụng</h5>
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
                        <div class="form-group col-12 col-md-8">
                            <label class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control form-control" placeholder="Tiêu đề"
                                   onkeyup="ChangeToSlug();" fdprocessedid="w3ptog" name="title" id="slug"
                                   value="{{ old('title') }}">
                            @error('title')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                            @error('slug')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label">Đường dẫn sạch</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}"
                                   id="convert_slug" placeholder="Đường dẫn sạch" readonly fdprocessedid="qaalh">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Content</label>
                            <textarea name="content" id="classic-editor" class="form-control" placeholder="Content" rows="6"></textarea>
                            @error('content')
                            <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
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
@stop
