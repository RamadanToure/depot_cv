@extends('backend.base')

@section('content')

<hr>
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">

                    <h1>Liste des Catégories</h1>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

    <!-- Button to trigger create modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createModal">
        Ajouter une catégorie
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Titre</th>
                <th>Sous-Titre</th>
                <th>description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through categories and display -->
            @foreach($category  as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    {{-- <td>
                        <img class="img-fluid" src="{{ asset($category->image_path) }}" alt="{{ $category->titre }}" width="800" height="800">
                    </td> --}}
                    <td>
                        @if($category->image_path)
                            <img class="img-fluid" src="{{ asset('storage/' . $category->image_path) }}" alt="{{ $category->titre }}" width="30" height="30">
                        @else
                            Aucune photo
                        @endif
                    </td>
                    <td>{{ $category->titre }}</td>
                    <td>{{ $category->sous_titre }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Ajouter une catégorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Create Form -->
                    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image_path">Image</label>
                            <input type="file" class="form-control-file" id="image_path" name="image_path" accept="image/jpeg, image/png" required>
                        </div>

                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" required>
                        </div>

                        <div class="form-group">
                            <label for="sous_titre">Sous-titre</label>
                            <input type="text" class="form-control" id="sous_titre" name="sous_titre" required>
                        </div>

                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
                </div>

            </div>
        </div>
    </div>




</div>

@endsection
