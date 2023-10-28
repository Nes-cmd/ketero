<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')| Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">
    @include('layouts.head-css')
    <style>
        table,
        th,
        td {
            border: 1px solid rgb(220, 220, 220);
            border-collapse: collapse;
        }

        .available {
            background-color: rgb(10, 200, 10);
            padding: 0 10px;
            border-radius: 3px;
            color: white;
        }

        .partial {
            background-color: rgb(200, 200, 10);
            padding: 0 10px;
            border-radius: 3px;
            color: white;
        }

        .unavailable {
            background-color: rgb(200, 10, 10);
            padding: 0 10px;
            border-radius: 3px;
            color: white;
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .modal-footer {
            display: flex !important;
            justify-content: space-between !important;
        }
    </style>
    <style>
        .inset-0 {
            top: 0;
            bottom: 0;
            right: 0;
            left: 0
        }
    </style>
</head>

@section('body')
@include('layouts.body')
@show
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.topbar')
    @include('layouts.sidebar')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layouts.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

@include('layouts.customizer')

<!-- JAVASCRIPT -->
@include('layouts.vendor-scripts')
</body>

</html>