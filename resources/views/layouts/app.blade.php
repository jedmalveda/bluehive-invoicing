<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('custom_css')
        <link rel="stylesheet" href="{{ asset("css/adminlte.min.css") }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
        @yield('content')

        @yield('custom_js')
    </body>
</html>
