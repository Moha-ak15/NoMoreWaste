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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <!-- Autres fichiers CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('frontoffice.partials.navbar')

    <div class="sidebar bg-light shadow-sm p-3">
        <h4 class="text-primary mb-4">Menu</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('frontoffice.home')}}" class="nav-link text-dark d-flex align-items-center">
                    <i class="fas fa-home me-2"></i> Home
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('servicesfront.index')}}" class="nav-link text-dark d-flex align-items-center">
                    <i class="fas fa-concierge-bell me-2"></i> Services
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('collectesfront.index')}}" class="nav-link text-dark d-flex align-items-center">
                    <i class="fas fa-truck me-2"></i> Collectes
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('tourneesfront.index')}}" class="nav-link text-dark d-flex align-items-center">
                    <i class="fas fa-route me-2"></i> Tournées
                </a>
            </li>
        </ul>
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
