<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenue sur l\'Application de Dépôt de CV pour les Professionnels de la Santé') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(Auth::check())
                        <h3 class="text-lg font-semibold mb-4">{{ __("Détails de votre CV") }}</h3>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Nom et Prénom </th>
                                    <th class="px-4 py-2">Adresse email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="px-4 py-2">{{ Auth::user()->name }}</td>
                                    <td class="px-4 py-2">{{ Auth::user()->email }}</td>

                                    <!-- Ajoutez d'autres cellules de données selon les détails du CV -->
                                </tr>
                            </tbody>
                        </table>
                    @else
                        {{ __("You're logged in!") }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
