<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('layout.loading')
    <div class="page">
        <div class="position-relative">
            @include('layout.header');
            @yield('content');
            @include('layout.footer');
        </div>
        <div class="snackbars" id="form-output-global"></div>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('js/core.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        @stack('script')
</body>

</html>
