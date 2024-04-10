<!doctype html>
<html class="no-js" lang="">

<head>
    <title>MDF Cabinet Doors Store Online</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="MDF Cabinet Doors Store Online">
    <meta name="keywords" content="MDF, Cabinet Doors, Store Online">
    <meta name="author" content="Foodbiz">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="icon.png">

    <!-- CSS Begins
  ================================================== -->
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/css/responsive.css') }}">

    @yield('styles')

</head>

<body>


    <!-- Start: Header Section
==================================================-->
    <x-frontend.header></x-frontend.header>
    <!-- End: Header Info -->

    <!-- Start: header navigation -->
    <x-frontend.nav></x-frontend.nav>
    <!-- End: header navigation -->

    {{ $slot }}


    <x-frontend.footer></x-frontend.footer>


    <script src="{{ URL::asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ URL::asset('public/frontend/js/plugins.js') }}"></script>
    {{-- <script src="{{ URL::asset('public/frontend/js/nice-select.min.js') }}"></script> --}}
    <script src="{{ URL::asset('public/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/js/main.js') }}"></script>

    <script>
        document.getElementById('actual-btn').addEventListener('change', function() {
            document.getElementById('file-chosen').textContent = this.files[0].name
        })

        document.getElementById('actual-btn-2').addEventListener('change', function() {
            document.getElementById('file-chosen-2').textContent = this.files[0].name
        })
    </script>

    @yield('scripts')

</body>

</html>
