<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>@yield('title')</title>
        <link rel="shortcut icon" href="/assets/svgs/logo.svg" type="image/svg+xml">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">




        @yield('cs-css')
        @yield('cs-js')

    </head>
    <body>
        @yield('body-content')
        @yield('script')
    </body>
</html>
