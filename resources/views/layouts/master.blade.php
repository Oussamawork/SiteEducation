<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>
            @yield ('title')
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/et-line-icon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    </head>

    <body>
        @include ('partials.navbar')

        @include ('partials.banner')
        
        @yield ('content')

        @include ('partials.footer')

        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.meanmenu.js"></script>
        <script src="js/jquery.magnific-popup.js"></script>
        <script src="js/ajax-mail.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.mb.YTPlayer.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>