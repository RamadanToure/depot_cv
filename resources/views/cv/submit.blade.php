<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row justify-content-start mb-3"> <!-- Espace vertical au lieu de hr -->
                                <div class="col-md-6">
                                    <a href="{{ route('cv.create') }}" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createCVModal">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>

                            <table class="table table-bordered">
                                <thead class="table-header-blue">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom Complet</th>
                                        {{-- <th>Adresse Email</th> --}}
                                        <th>Numéro de Téléphone</th>
                                        <th>Poste Actuel</th>
                                        {{-- <th>Entreprise Actuelle</th> --}}
                                        <th>Années d'Expérience</th>
                                        <th>Dernier Diplôme</th>
                                        <th>Domaine d'Études</th>
                                        <th>CV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cvs as $cv)
                                    <tr>
                                        <td>{{ $cv->id }}</td>
                                        <td>{{ $cv->nom_complet }}</td>
                                        {{-- <td>{{ $cv->adresse_email }}</td> --}}
                                        <td>{{ $cv->numero_telephone }}</td>
                                        <td>{{ $cv->poste_actuel }}</td>
                                        {{-- <td>{{ $cv->entreprise_actuelle }}</td> --}}
                                        <td>{{ $cv->annees_experience }}</td>
                                        <td>{{ $cv->dernier_diplome }}</td>
                                        <td>{{ $cv->domaine_etudes }}</td>
                                        <td>
                                            <a href="{{ asset('storage/cvs/' . $cv->cv_filename) }}" target="_blank" class="btn btn-primary">Voir CV</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
