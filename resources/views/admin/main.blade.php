<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Admin Panel</title>

    <!-- Fonts -->
{{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/core/core.css')}}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flatpickr/flatpickr.min.css')}}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo2/style.css')}}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('toastr/toastr.css')}}" >
    <!-- Plugin css for data table -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <!-- End plugin css for data table -->

</head>
<body>
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    @include('admin.body.sidebar')


    <!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
        @include('admin.body.header')

        <!-- partial -->
        @yield('main')


        <!-- partial:partials/_footer.html -->
        @include('admin.body.footer')

        <!-- partial -->

    </div>
</div>

<!-- core:js -->
<script src="{{asset('admin/assets/vendors/core/core.js')}}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{asset('admin/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{asset('admin/assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin/assets/js/template.js')}}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{asset('admin/assets/js/dashboard-dark.js')}}"></script>
<!-- End custom js for this page -->
<script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script>

<script>
    @if(Session::has('message'))
        toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "4000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
<!-- Plugin js for data table -->

<script src="{{asset('admin/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('admin/assets/js/data-table.js')}}"></script>
<!-- End plugin js for this page -->
<script src="{{asset('admin/assets/js/validate.min.js')}}"></script>
<script src="{{ asset('sweetalert/sweetalert2@10.js') }}"></script>

{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>--}}
<script src="{{ asset('admin/assets/js/code/code.js') }}"></script>
{{--<script type="text/javascript">--}}
{{--    $('.siderbar1 .nav-item .sub-menu a').on('click', function(e) {--}}
{{--        e.preventDefault();--}}
{{--        $('.siderbar1 ').removeClass('active');--}}
{{--        $(this).addClass('active');--}}
{{--        $(this).addClass('show');--}}
{{--    })--}}
{{--</script>--}}


</body>
</html>


