<nav class="bg-gray-800 p-4">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <div class="text-white font-bold">
                <a href="{{ route('backoffice.dashboard') }}">Tableau de bord</a>
            </div>
            <div>
                <a href="{{ route('backoffice.dashboard') }}" class="text-white px-3">Tableau de bord</a>
                <a href="{{ route('backoffice.users.index') }}" class="text-white px-3">Utilisateurs</a>
                <a href="{{ route('backoffice.reports') }}" class="text-white px-3">Rapports</a>
                <a href="{{ route('backoffice.settings') }}" class="text-white px-3">Paramètres</a>
                <a href="{{ route('logout') }}" class="text-white px-3"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>
