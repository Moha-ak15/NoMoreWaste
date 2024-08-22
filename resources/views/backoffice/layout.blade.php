<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BackOffice - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('backoffice.partials.navbar')

    <div class="container mx-auto">
        @yield('content')
    </div>

    @include('backoffice.partials.footer')
</body>
</html>
