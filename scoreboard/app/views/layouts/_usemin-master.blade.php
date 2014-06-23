<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en"> <![endif]-->
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title' or 'Scoreboard')</title>

    <!-- build:css assets/css/vendor.min.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="assets/vendor/Hover/css/hover.css" />
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css assets/css/scoreboard.min.css -->
    <link rel="stylesheet" href="assets/css/scoreboard.css">
    <link rel="stylesheet" href="assets/css/overrides.css">
    <!-- endbuild -->
    <!-- build:js assets/js/modernizr.min.js -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>
    <!-- endbuild -->
</head>
<body>

@section('header')
<header class="row">
    <div class="small-12 small-centered medium-9 medium-centered large-6 large-centered columns">
        <h1 class="title">@yield('title')</h1>
    </div>
</header>
@show

@section('content')
@show

<!-- build:js assets/js/vendor.min.js -->
<!-- bower:js -->
<script src="assets/vendor/lodash/dist/lodash.compat.js"></script>
<script src="assets/vendor/jquery/dist/jquery.js"></script>
<script src="assets/vendor/fastclick/lib/fastclick.js"></script>
<!-- endbower -->
<!-- endbuild -->
<!-- build:js assets/js/foundation.min.js -->
<script src="assets/vendor/foundation/js/foundation.js"></script>
<!-- endbuild -->
<!-- build:js assets/js/scoreboard.min.js -->
<script src="assets/js/scoreboard.js"></script>
<!-- endbuild -->
</body>
</html>

