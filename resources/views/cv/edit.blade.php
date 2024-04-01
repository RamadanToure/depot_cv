<x-app-layout>

    <div class="container py-6">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="modal-header bg-primary">
                        <h2 class="modal-title text-white" id="createModalLabel">Modifier le CV</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('cv.update', $cv->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="nom_complet">Nom Complet</label>
                                    <input type="text" class="form-control" id="nom_complet" name="nom_complet" value="{{ $cv->nom_complet }}" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="adresse_email">Adresse Email</label>
                                    <input type="text" class="form-control" id="adresse_email" name="adresse_email" value="{{ $cv->adresse_email }}" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="numero_telephone">N° Téléphone</label>
                                    <input type="text" class="form-control" id="numero_telephone" name="numero_telephone" value="{{ $cv->numero_telephone }}" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="poste_actuel">Poste Actuel</label>
                                    <input type="text" class="form-control" id="poste_actuel" name="poste_actuel" value="{{ $cv->poste_actuel }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="entreprise_actuelle">Service Actuelle</label>
                                    <input type="text" class="form-control" id="entreprise_actuelle" name="entreprise_actuelle" value="{{ $cv->entreprise_actuelle }}" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="annees_experience">Année d'Expérience</label>
                                    <input type="text" class="form-control" id="annees_experience" name="annees_experience" value="{{ $cv->annees_experience }}" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="dernier_diplome">Dernier Diplôme</label>
                                    <input type="text" class="form-control" id="dernier_diplome" name="dernier_diplome" value="{{ $cv->dernier_diplome }}" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="domaine_etudes">Domaine d'Études</label>
                                    <input type="text" class="form-control" id="domaine_etudes" name="domaine_etudes" value="{{ $cv->domaine_etudes }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="competences">Compétences</label>
                                    <input type="text" class="form-control" id="competences" name="competences" value="{{ $cv->competences }}" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="cv"><b>JOINT CV :</b> (PDF) <i>pas d'espace dans le nom du fichier à joindre</i></label>
                                    <input type="file" class="form-control" id="cv" name="cv">
                                    <p class="text-muted mt-2">Laissez vide si vous ne souhaitez pas mettre à jour le CV.</p>
                                </div>

                                <div class="col-md-3">
                                    <label for="motivation">Motivation</label>
                                    <input type="text" class="form-control" id="motivation" name="motivation" value="{{ $cv->motivation }}" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="disponibilites_entretien">Disponibilités</label>
                                    <input type="text" class="form-control" id="disponibilites_entretien" name="disponibilites_entretien" value="{{ $cv->disponibilites_entretien }}" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" style="background-color: rgb(57, 103, 228); color: white;">Enregistrer les modifications</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Erreur de soumission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="errorMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Fermer</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
