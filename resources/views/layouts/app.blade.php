<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>
        1-North-West
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->

    <!-- Favicons -->
    <link href="{{ asset('1n-west/images/logo.png?v=2') }}" rel="icon">
    <link href="{{ asset('1n-west/images/logo.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,300" rel="stylesheet" type="text/css" />

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('1n-west/css/animate.css') }}" />
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('1n-west/css/icomoon.css') }}" />
    <!-- Superfish -->
    <link rel="stylesheet" href="{{ asset('1n-west/css/superfish.css') }}" />
    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('1n-west/css/flexslider.css') }}" />
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('1n-west/css/magnific-popup.css') }}" />
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('1n-west/css/bootstrap-datepicker.min.css') }}" />
    <!-- CS Select -->
    <link rel="stylesheet" href="{{ asset('1n-west/css/cs-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('1n-west/css/cs-skin-border.css') }}" />

    <!-- Modernizr JS -->
    <script src="{{ asset('1n-west/js/modernizr-2.6.2.min.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('1n-west/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('1n-west/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <div id="fh5co-wrapper">
        <div id="fh5co-page">
            @section('header')
                @include('layouts.header')
            @show
            @yield('content')
            @section('footer')
                @include('layouts.footer')
            @show
        </div>
    </div>

    <!-- jQuery -->

    <script src="{{ asset('1n-west/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('1n-west/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('1n-west/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('1n-west/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('1n-west/js/sticky.js') }}"></script>
    <!-- Superfish -->
    <script src="{{ asset('1n-west/js/hoverIntent.js') }}"></script>
    <script src="{{ asset('1n-west/js/superfish.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('1n-west/js/jquery.flexslider-min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('1n-west/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- CS Select -->
    <script src="{{ asset('1n-west/js/classie.js') }}"></script>
    <script src="{{ asset('1n-west/js/selectFx.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('1n-west/js/main.js') }}"></script>

    <!-- Import external TEST JavaScript file -->
    <script type="module" src="{{ asset('1n-west/js/test.js') }}"></script>
</body>

</html>
