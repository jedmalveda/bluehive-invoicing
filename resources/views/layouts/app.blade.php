<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset("plugins/fontawesome-free/css/all.min.css") }}">

    <link rel="stylesheet" href="{{ asset("css/adminlte.min.css") }}">
    @yield('page_css')
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="sidebar-mini" style="height: auto;">
<div class="wrapper">
    @include('partials._navbar')
    @include('partials._sidebar')
    @yield('content')
    @include('partials._footer')
    {{--@include('partials._aside')--}}
</div>
<script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("plugins/jquery-ui/jquery-ui.min.js") }}"></script>
<script src="{{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("js/adminlte.min.js") }}"></script>
@yield('page_scripts')
</body>
</html>
