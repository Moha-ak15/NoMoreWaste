<nav class="bg-gray-800 p-4">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <div class="text-white font-bold">
                <a href="{{ route('frontoffice.home') }}">Accueil</a>
            </div>
            <div>
                <a href="{{ route('frontoffice.home') }}" class="text-white px-3">Home</a>
                <a href="{{ route('frontoffice.dashboard') }}" class="text-white px-3">Dashboard</a>
                <a href="{{ route('commercantfront.inscription') }}" class="text-white bg-green-500 hover:bg-green-700 px-3 py-2 rounded">
                    Devenir Partenaire
                </a>
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
