<x-app-layout>

    <div class="container py-6">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="createModalLabel">FORMULAIRE D'ENREGISTREMENT DE CV</h5>
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

                        <form method="POST" action="{{ route('cv.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Nom Complet -->
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="nom_complet">Nom Complet</label>
                                    <input type="text" class="form-control" id="nom_complet" name="nom_complet" required>
                                </div>

                                <!-- Adresse Email -->
                                <div class="col-md-3">
                                    <label for="adresse_email">Adresse Email</label>
                                    <input type="text" class="form-control" id="adresse_email" name="adresse_email" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="numero_telephone">N° Téléphone</label>
                                    <input type="text" class="form-control" id="numero_telephone" name="numero_telephone" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="poste_actuel">Poste Actuel</label>
                                    <input type="text" class="form-control" id="poste_actuel" name="poste_actuel" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="entreprise_actuelle">Service Actuelle</label>
                                    <input type="text" class="form-control" id="entreprise_actuelle" name="entreprise_actuelle" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="annees_experience">Année  d'Expérience</label>
                                    <input type="text" class="form-control" id="annees_experience" name="annees_experience" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="dernier_diplome">Dernier Diplôme</label>
                                    <input type="text" class="form-control" id="dernier_diplome" name="dernier_diplome" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="domaine_etudes">Domaine d'Études</label>
                                    <input type="text" class="form-control" id="domaine_etudes" name="domaine_etudes" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="competences">Compétences</label>
                                    <input type="text" class="form-control" id="competences" name="competences" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="cv">CV (PDF, DOC, DOCX)</label>
                                    <input type="file" class="form-control" id="competences" name="cv" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="motivation">Motivation</label>
                                    <input type="text" class="form-control" id="motivation" name="motivation" required>
                                </div>

                                <div class="col-md-3">

                                    <label for="disponibilites_entretien">Disponibilités</label>
                                    <input type="text" class="form-control" id="disponibilites_entretien" name="disponibilites_entretien" required>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
