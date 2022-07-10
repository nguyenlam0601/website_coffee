<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en" ng-app="myapp">

<head>
    <title>COFFEE HOUSE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/user/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/user/css/animate.css">
    <link rel="stylesheet" href="/user/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/user/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/user/css/magnific-popup.css">
    <link rel="stylesheet" href="/user/css/aos.css">
    <link rel="stylesheet" href="/user/css/ionicons.min.css">
    <link rel="stylesheet" href="/user/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/user/css/jquery.timepicker.css">
    <link rel="stylesheet" href="/user/css/flaticon.css">
    <link rel="stylesheet" href="/user/css/icomoon.css">
    <link rel="stylesheet" href="/user/css/style.css">
    <link rel="stylesheet" href="/pagination/bootstrap.min.js">
    <link rel="stylesheet" href="/pagination/style.css">
</head>

<body class="goto-here" ng-controller="giohangcontroller">
    @include('includes.nav')
    <!-- END nav -->
    @yield('content')
    <hr>
    @include('includes.section4')

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js"></script>
        <script src="/user/js/jquery.min.js"></script>
        <script src="/user/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="/user/js/popper.min.js"></script>
        <script src="/user/js/bootstrap.min.js"></script>
        <script src="/user/js/jquery.easing.1.3.js"></script>
        <script src="/user/js/jquery.waypoints.min.js"></script>
        <script src="/user/js/jquery.stellar.min.js"></script>
        <script src="/user/js/owl.carousel.min.js"></script>
        <script src="/user/js/jquery.magnific-popup.min.js"></script>
        <script src="/user/js/aos.js"></script>
        <script src="/user/js/jquery.animateNumber.min.js"></script>
        <script src="/user/js/bootstrap-datepicker.js"></script>
        <script src="/user/js/scrollax.min.js"></script>
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> --}}
        {{-- <script src="/user/js/google-map.js"></script> --}}
        <script src="/user/js/main.js"></script>
</body>

</html>