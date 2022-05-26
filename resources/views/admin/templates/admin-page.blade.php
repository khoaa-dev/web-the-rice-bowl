<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Rice Bowl </title>

    <!-- Bootstrap -->
    <link href="{{ asset('public/front-end/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/front-end/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/front-end/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link
        href="{{ asset('public/front-end/admin/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}"
        rel="stylesheet" />
    <!-- iCheck -->
    <link href="{{ asset('public/front-end/admin/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('public/front-end/admin/build/css/custom.min.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- Header -->
            @include('admin.includes.header')
            <!-- Header -->

            <!-- top navigation -->
            @include('admin.includes.sidebar')
            <!-- /top navigation -->

            <!-- page content -->
            @yield('content')
            <!-- /page content -->

            <!-- footer content -->
            {{-- @include('admin.includes.footer') --}}

            <!-- /footer content -->
        </div>
    </div>

     <!-- jQuery -->
    <script src="{{ asset('public/front-end/admin/vendors/jquery/dist/jquery.min.js') }}"></script> 
    <!-- Bootstrap -->
    <script src="{{ asset('public/front-end/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('public/front-end/admin/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('public/front-end/admin/vendors/nprogress/nprogress.js') }}"></script>
    <!-- jQuery custom content scroller -->
    <script
        src="{{ asset('public/front-end/admin/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}">
    </script>

    <!-- iCheck -->
    <script src="{{ asset('public/front-end/admin/vendors/iCheck/icheck.min.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('public/front-end/admin/build/js/custom.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script> 

    @yield('js')
</body>

</html>
