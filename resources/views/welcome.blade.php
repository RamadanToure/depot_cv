@extends('layouts.base')

@section('title', 'Accueil')

@section('content')

<section id="counts" class="counts">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <span class="purecounter">{{ isset($counts['totalCV']) ? $counts['totalCV'] : 0 }}</span>
                    <p>Total CV</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <span class="purecounter">{{ isset($counts['nombreMedecins']) ? $counts['nombreMedecins'] : 0 }}</span>
                    <p>Nombre de Médecin</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="bi bi-headset"></i>
                    <span class="purecounter">{{ isset($counts['nombreSpecialites']) ? $counts['nombreSpecialites'] : 0 }}</span>
                    <p>Nombre de Spécialité</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="bi bi-people"></i>
                    <span class="purecounter">{{ isset($counts['nombreUtilisateurs']) ? $counts['nombreUtilisateurs'] : 0 }}</span>
                    <p>Nombre d'utilisateur</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
