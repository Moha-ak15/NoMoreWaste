<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commercant-Office - {{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <!-- Autres fichiers CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('commercantoffice.partials.navbar')

    <div class="main-content">
        @yield('content')
    </div>

    {{-- @include('frontoffice.partials.footer') --}}

    <!-- Scripts JavaScript de FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/fr.js"></script>

    <!-- Inclusions des scripts spécifiques aux vues -->
    @yield('scripts')
</body>
</html>
