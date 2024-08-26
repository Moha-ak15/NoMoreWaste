<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Commerçants Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold">{{ __('Commerçants') }}</h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Gérer les adhésions des commerçants
                        </p>
                        <a href="{{ route('commercants.index') }}" class="mt-4 inline-block text-blue-600 dark:text-blue-400 hover:underline">
                            Voir les Commerçants
                        </a>
                    </div>
                </div>

                <!-- Collectes Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold">{{ __('Collectes') }}</h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Gérez le système des collectes
                        </p>
                        <a href="{{ route('collectes.index') }}" class="mt-4 inline-block text-blue-600 dark:text-blue-400 hover:underline">
                            Voir les Collectes
                        </a>
                    </div>
                </div>

                <!-- Stocks Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold">{{ __('Stocks') }}</h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Consultez et gérez les stocks disponibles.
                        </p>
                        <a href="{{ route('stocks.index') }}" class="mt-4 inline-block text-blue-600 dark:text-blue-400 hover:underline">
                            Voir les Stocks
                        </a>
                    </div>
                </div>

                <!-- Tournées Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold">{{ __('Tournées') }}</h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Gérer les tournées de distribution.
                        </p>
                        <a href="{{ route('tournees.index') }}" class="mt-4 inline-block text-blue-600 dark:text-blue-400 hover:underline">
                            Voir les Tournées
                        </a>
                    </div>
                </div>

                <!-- Bénévoles Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold">{{ __('Bénévoles') }}</h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Gérez les bénévoles de l'association.
                        </p>
                        <a href="{{ route('benevoles.index') }}" class="mt-4 inline-block text-blue-600 dark:text-blue-400 hover:underline">
                            Voir les Bénévoles
                        </a>
                    </div>
                </div>

                <!-- Services Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold">{{ __('Services') }}</h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Gérez les services proposés par l'association.
                        </p>
                        <a href="{{ route('services.index') }}" class="mt-4 inline-block text-blue-600 dark:text-blue-400 hover:underline">
                            Voir les Services
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
