<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenue sur l\'Application de Gestion de CV pour les Professionnels de la Santé') }}
        </h2>
    </x-slot>

    <div class="my-4"></div>

    <div class="container mt-12">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-blue"><b>A propos de notre application</b></div>

                    <div class="card-body">
                        <p>Bienvenue sur notre application. Voici quelques informations utiles à propos de notre plateforme :</p>

                        <ul>
                            <li>Notre application permet aux utilisateurs de créer et de gérer leurs CV en ligne.</li>
                            <li>Les utilisateurs peuvent soumettre leur CV, le modifier et le supprimer selon leurs besoins.</li>
                            <li>Nous offrons également des fonctionnalités telles que la visualisation des CV soumis et la gestion des profils utilisateurs.</li>
                            <li>Notre objectif est de fournir un outil convivial et efficace pour la création et la gestion de CV en ligne.</li>
                        </ul>

                        <p>Nous espérons que vous trouverez notre application utile et facile à utiliser. Si vous avez des questions ou des commentaires, n'hésitez pas à nous contacter.</p>

                        <p>Merci de votre visite !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 text-gray-900 dark:text-gray-100">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            @auth
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">Bonjour, {{ Auth::user()->name }}!</p>
                <p class="text-gray-600 dark:text-gray-400">Votre adresse email : {{ Auth::user()->email }}</p>
                <p class="text-gray-600 dark:text-gray-400">Votre rôle : {{ Auth::user()->role }}</p>
                <p class="text-gray-600 dark:text-gray-400">Dernière connexion : {{ Auth::user()->last_login_at }}</p>
                <!-- Ajoutez d'autres informations de l'utilisateur si nécessaire -->
            @else
                <p class="text-gray-600 dark:text-gray-400">Veuillez vous connecter pour voir vos informations.</p>
            @endauth
        </div>
    </div>
</x-app-layout>
