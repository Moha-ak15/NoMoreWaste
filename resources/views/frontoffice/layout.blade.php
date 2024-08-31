<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front-Office - {{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>

    </style>

    <!-- Autres fichiers CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('frontoffice.partials.navbar')

    <div class="sidebar">
        <h4>Menu</h4>
        <a href="{{ route('frontoffice.home')}}">Home</a>
        <a href="{{ route('servicesfront.index')}}">Services</a>
        <a href="{{ route('collectesfront.index')}}">Collectes</a>
        <a href="{{ route('tourneesfront.index')}}">Tournées</a>
        <a href="{{ route('profile.show')}}">Profil</a>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    @include('frontoffice.partials.footer')

    <!-- Scripts JavaScript de FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/fr.js"></script>

    <!-- Inclusions des scripts spécifiques aux vues -->
    @yield('scripts')
</body>
</html>
