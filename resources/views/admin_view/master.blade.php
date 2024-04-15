<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<!-- Mirrored from ableproadmin.com/forms/file-upload.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Apr 2024 09:18:27 GMT -->

<head>
    <title>File Upload | Able Pro Dashboard Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Able Pro is trending dashboard template made using Bootstrap 5 design framework. Able Pro is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies.">
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard">
    <meta name="author" content="Phoenixcoded">

    <!-- [Favicon] icon -->
    <link rel="icon" href="https://ableproadmin.com/assets/images/favicon.svg" type="image/x-icon">

    <!-- css -->
    @include('admin_view.layouts_view.Header.cssHearder')
    <!-- js -->
    @include('admin_view.layouts_view.Header.jsHeader')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast=""
    data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    @include('admin_view.layouts_view.Body.Pre-loader')
    <!-- [ Pre-loader ] End -->
    <!-- [ sideBar ] start -->
    @include('admin_view.layouts_view.Body.sideBar')
    <!-- [ sideBar ] End -->
    @include('admin_view.layouts_view.Body.Head')
    <!-- [ Main Content ] start -->
    <section class="pc-container">
      @yield('view')
    </section>
    <!-- [ Main Content ] end -->

    @include('admin_view.layouts_view.Foorter.jsFoorter')
    @yield('js')
</body>
<!-- [Body] end -->

<!-- Mirrored from ableproadmin.com/forms/file-upload.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Apr 2024 09:18:28 GMT -->

</html>
