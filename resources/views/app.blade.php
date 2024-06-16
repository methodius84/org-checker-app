<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Org Checker - @yield('title')</title>
</head>
<body>
    <header>
        @include('header')
    </header>
    <div id="app">
        @yield('content')
    </div>
    @vite(['resources/js/app.js'])
</body>
@yield('script')
</html>

