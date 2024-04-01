<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="table-header-blue">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom Complet</th>
                                        <th>Numéro de Téléphone</th>
                                        <th>Poste Actuel</th>
                                        <th>Années d'Expérience</th>
                                        <th>Dernier Diplôme</th>
                                        <th>Domaine d'Études</th>
                                        <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cvs as $cv)
                                    <tr>
                                        <td>{{ $cv->id }}</td>
                                        <td>{{ $cv->nom_complet }}</td>
                                        <td>{{ $cv->numero_telephone }}</td>
                                        <td>{{ $cv->poste_actuel }}</td>
                                        <td>{{ $cv->annees_experience }}</td>
                                        <td>{{ $cv->dernier_diplome }}</td>
                                        <td>{{ $cv->domaine_etudes }}</td>
                                        <td>
                                            <a href="{{ route('cv.pdf', $cv->id) }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cvModal{{ $cv->id }}">
                                                <i class="fas fa-eye"></i> Voir
                                            </a>
                                            <a href="{{ route('cv.edit', $cv->id) }}" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if(Auth::check() && Auth::user()->role === 'admin')
                                            <button type="button" class="btn btn-danger delete-cv" data-cv-id="{{ $cv->id }}" style="background-color: red; color: white;">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                            @endif
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

    <!-- Modal de confirmation de suppression -->
    @foreach($cvs as $cv)
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" data-cv-id="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer ce CV ?
                </div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    </div>
                    <!-- Bouton pour déclencher la suppression -->
                    <form action="{{ route('cv.destroy', $cv->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="background-color: red; color: white;">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @include('cv.pdf')

    <script>
        $(document).ready(function(){
            // Gérer l'événement de clic sur le bouton de suppression
            $('.delete-cv').click(function(){
                var cvId = $(this).data('cv-id'); // Récupérer l'ID du CV à supprimer
                $('#deleteModal').data('cv-id', cvId); // Stocker l'ID du CV dans le modal de suppression
                $('#deleteModal').modal('show'); // Afficher le modal de confirmation
            });

            // Gérer l'événement de clic sur le bouton de confirmation de suppression
            $('#confirmDeleteBtn').click(function(){
                var cvId = $('#deleteModal').data('cv-id'); // Récupérer l'ID du CV à supprimer
                window.location.href = '{{ route("cv.destroy", "") }}/' + cvId; // Rediriger vers la route de suppression du CV
            });
        });
    </script>


</x-app-layout>
