<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('images/red-logo.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Octavian365</title>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css')}}" rel="stylesheet">
    <link href="{{ asset('css/onboarding.css')}}" rel="stylesheet">
    <link href="{{ asset('css/onboarding-responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('css/select2.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/daterangepicker.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/staff-style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('css/responsive-staff.css')}}" rel="stylesheet">
    <link href="{{ asset('css/dtsel.css') }}" rel="stylesheet" />
    <!-- <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" /> -->
    <!-- <link href="{{ asset('css/select2totree.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('extensions/toastify-js/src/toastify.css') }}" rel="stylesheet">

    <link href="{{ asset('css/dataTables.min.css')}}" rel="stylesheet">

    <link href="{{ asset('css/summernote-bs5.css')}}" rel="stylesheet">
</head>

<body>

    <div class="dash">
        <div class="dash-nav">
            @include('admin.layouts.left-sidebar')
        </div>
        <div class="menu-ovelay"></div>

        @yield('content')

    </div>

    <script src="{{ asset('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/select2.js')}}"></script>
    <script src="{{ asset('js/moment.min.js')}}"></script>
    <script src="{{ asset('js/daterangepicker.min.js')}}"></script>
    <script src="{{ asset('js/chart.js')}}"></script>
    <!-- <script src="{{ asset('js/Chart.bundle.min.js')}}"></script> -->
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset('extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('js/dtsel.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/select2totree.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>

    <script src="{{ asset('js/dataTables.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/summernote-bs5.js')}}"></script>
    @yield('custom_javascript')

    @if (session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#4fbe87",
        }).showToast();
    </script>
    @endif
    @if (session('error'))
    <script>
        Toastify({
            text: "{{ session('error') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#f27474",
        }).showToast();
    </script>
    @endif
    <script>
        function show_success(msg) {
            Toastify({
                text: msg,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast();
        }

        function show_error(msg) {
            Toastify({
                text: msg,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#f27474",
            }).showToast();
        }
    </script>
</body>

</html>