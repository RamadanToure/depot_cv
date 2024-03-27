@extends('backend.base')

@section('content')

<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Liste des Bannières</h4>
                    </div>
                    <!-- Button to trigger create modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createModal">
                        Ajouter une bannière
                    </button>
                    <!-- Table to display the list of banners -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Sous-Titre</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through banners and display -->
                            @foreach ($bannieres as $banniere)
                            <tr>
                                <td>{{ $banniere->id }}</td>
                                <td>
                                    <!-- Assurez-vous que le chemin de l'image est correct -->
                                    <img class="img-fluid" src="{{ asset($banniere->image_path) }}" alt="{{ $banniere->titre }}" width="800" height="800">
                                </td>
                                <td>{{ $banniere->titre }}</td>
                                <td>{{ $banniere->sous_titre }}</td>
                                <td>{{ $banniere->description }}</td>
                                <td>
                                    <!-- Button to trigger edit modal -->
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $banniere->id }}">
                                        Modifier
                                    </button>
                                    <!-- Add your delete button or any other actions -->
                                     <!-- Button to trigger delete modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $banniere->id }}">
                                        Supprimer
                                    </button>

                                    <form method="POST" action="{{ route('bannieres.toggleStatus', $banniere->id) }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            {{ $banniere->statut ? 'Dépublier' : 'Publier' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $banniere->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $banniere->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $banniere->id }}">Supprimer la bannière</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Êtes-vous sûr de vouloir supprimer cette bannière?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <form method="POST" action="{{ route('bannieres.destroy', $banniere->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $banniere->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $banniere->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $banniere->id }}">Modifier la bannière</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <!-- Edit Form -->
                                        <form method="POST" action="{{ route('bannieres.update', $banniere->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <!-- Add your edit form fields -->
                                            <div class="form-group">
                                                <label for="image_path">Image</label>
                                                <input type="file" class="form-control-file" id="image_path" name="image_path" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_titre">Titre</label>
                                                <input type="text" class="form-control" id="edit_titre" name="titre" value="{{ $banniere->titre }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_sous_titre">Sous-Titre</label>
                                                <input type="text" class="form-control" id="edit_sous_titre" name="sous_titre" value="{{ $banniere->sous_titre }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_description">Description</label>
                                                <textarea class="form-control" id="edit_description" name="description" required>{{ $banniere->description }}</textarea>
                                            </div>
                                            <!-- Add other fields as needed -->
                                            <!-- ... -->
                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                        </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Ajouter une bannière</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Create Form -->
                    <form method="POST" action="{{ route('bannieres.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Image Upload --}}
                        <div class="form-group">
                            <label for="image_path">Image</label>
                            <input type="file" class="form-control-file" id="image_path" name="image_path" accept="image/jpeg, image/png" required>
                        </div>

                        {{-- Titre --}}
                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" required>
                        </div>

                        {{-- Sous-titre --}}
                        <div class="form-group">
                            <label for="sous_titre">Sous-titre</label>
                            <input type="text" class="form-control" id="sous_titre" name="sous_titre" required>
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>

                        {{-- Add other fields as needed --}}
                        {{-- ... --}}

                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    window.addEventListener('load', function() {
    // Sélectionnez l'élément img par sa classe (ajustez la classe en fonction de votre HTML)
    var images = document.querySelectorAll('.image_path');

    // Attachez un gestionnaire d'événement load à chaque image
    images.forEach(function(image) {
        image.addEventListener('load', function() {
            console.log('L\'image a été entièrement chargée');
            // Vous pouvez ajouter ici le code que vous souhaitez exécuter une fois l'image chargée
        });
    });
});

console.log
</script>
@endsection
