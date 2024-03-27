<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Ajouter une Catégorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Form -->
                <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
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
