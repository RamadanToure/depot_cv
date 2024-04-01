<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name', 'MSHP | CV') }}</title>
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>SKP</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/3.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ asset('backend/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />


    <!-- ... other head elements ... -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (nécessaire pour les fonctionnalités de Bootstrap JavaScript) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fichier JavaScript de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .table-header-blue {
            background-color: #2575d6; /* Couleur bleu clair */
            color: white; /* Couleur du texte en blanc */
            border-color: #2575d6; /* Couleur de la bordure en bleu clair */
        }

        .card-title {
            font-size: 24px; /* Taille de police agrandie */
            font-weight: bold; /* Texte en gras */
            text-align: center; /* Texte centré */
        }

        /* Style pour l'image carrée */
        .profile-picture {
            width: 600px; /* Taille de l'image */
            height: 600px; /* Taille de l'image */
            border-radius: 25px; /* Forme carrée avec coins arrondis */
            object-fit: cover; /* Redimensionne l'image pour remplir le conteneur */
        }

        /* Flexbox pour aligner les éléments */
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
        }

        .left-container,
        .right-container {
            width: 45%; /* Répartir l'espace en deux */
        }

        .right-container {
            text-align: right; /* Aligner à droite */
        }

        /* Style pour le conteneur du formulaire */
        .form-container {
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 8px;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <!-- Arrière-plan personnalisé -->
    <div class="min-h-screen flex justify-center items-center bg-gray-100 dark:bg-gray-900">
        <div class="container">
            <!-- Image carrée à droite -->
            <div class="right-container">
                <img src="{{ asset('assets/img/hero-bg.jpg') }}" alt="Profile Picture" class="profile-picture">
            </div>
            <!-- Formulaire à gauche -->
            <div class="left-container">
                <!-- Contenu de la vue de connexion -->

                <h1 class="text-4xl font-bold mb-6 text-center"><b>BIENVENUE SUR <span>ADCV | MSHP</span></b></h1>
                <h1 class="text-4xl font-bold mb-6 text-center">Application de Dépôt de CV pour les Professionnels de la Santé</h1>
                {{ $slot }}
            </div>
        </div>
    </div>

</body>

</html>
