<nav class="bg-gray-800 p-4">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <div class="text-white font-bold">
                <a href="{{ route('frontoffice.home') }}">Accueil</a>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="text-white px-3">Dashboard</a>
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
