@section('title', 'Scoreboard')
<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en"> <![endif]-->
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/vendor.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/scoreboard.min.css') }}"/>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
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


<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/foundation.min.js') }}"></script>
<script src="{{ asset('assets/js/scoreboard.min.js') }}"></script>

@section('javascript')
@show

</body>
</html>

