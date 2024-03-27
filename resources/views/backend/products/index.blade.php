@extends('backend.base')

@section('content')

<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Gestion des Produits</h4>
                    </div>
                    <!-- Ajout du formulaire de recherche -->
                    <form action="{{ route('products.index') }}" method="GET" class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Catégorie</label>
                                    <select id="category" name="category_id" class="form-control">
                                        <option value="">Toutes les catégories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="search">Nom du produit</label>
                                    <input type="text" id="search" name="productName" class="form-control" placeholder="Rechercher par nom">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Rechercher</button>
                            </div>
                        </div>
                    </form>

                    <!-- Fin du formulaire de recherche -->

                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal" data-action="create">
                        Ajouter un produit
                    </button>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th class="text-center">Prix</th>
                                <th>Image</th>
                                <th class="text-center">Qté disponible</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td class="text-center">{{ $product->price }}</td>
                                    <td>
                                        <img class="img-fluid" src="{{ asset($product->image_path) }}" alt="{{ $product->titre }}" width="100" height="100">
                                    </td>

                                    <td class="text-center">{{ $product->reviews }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-description="{{ $product->description }}" data-price="{{ $product->price }}" data-reviews="{{ $product->reviews }}">
                                            Modifier
                                        </button>

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $product->id }}">
                                            Supprimer
                                        </button>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#showModal" data-id="{{ $product->id }}">
                                            Voir
                                        </button>
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

<!-- Common Modal for Create, Edit, Delete, and Show -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Formulaire de création</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="modal-body" id="create-form">
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="reviews">Stock</label>
                        <input type="number" id="reviews" name="reviews" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Type</label>
                        <select id="category" name="category_id" class="form-control" required>
                            <option value="">Sélectionner une catégorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->titre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Enregistrer le produit</button>
                    </div>
                </form>
            </div>
            <!-- Add the other modal forms here -->
        </div>
    </div>
</div>
@foreach ($products as $product)
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifier le produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="modal-body">
                <!-- Edit Form -->
                <form method="POST" id="editForm" enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control-file" value="{{ $product->image }}">
                    </div>

                    <!-- Add your edit form fields here -->
                    <div class="form-group">
                        <label for="edit_name">Nom</label>
                        <input type="text" class="form-control" id="edit_name" name="name" value="{{ $product->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_description">Description</label>
                        <textarea class="form-control" id="edit_description" name="description" required>{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="edit_price">Prix</label>
                        <input type="number" class="form-control" id="edit_price" name="price" step="0.01" value="{{ $product->price }}" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_reviews">Commentaires</label>
                        <input type="text" class="form-control" id="edit_reviews" name="reviews" value="{{ $product->reviews }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Show Modal -->

<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Détails du produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Show Product Details Here -->
                <p><strong>Nom:</strong> {{ $product->name }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Prix:</strong> {{ $product->price }}</p>
                <p><strong>Stock:</strong> {{ $product->reviews }}</p>
                <p><strong>Catégorie:</strong> {{ $product->category ? $product->category->titre : 'Aucune catégorie' }}</p>
                @if($product->image_path)
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="img-fluid">
                @else
                    Aucune photo disponible
                @endif
            </div>
        </div>
    </div>
</div>



<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Supprimer le produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Delete Product Confirmation Message -->
                <p>Êtes-vous sûr de vouloir supprimer ce produit?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Attends que le document soit prêt

        // Vérifie que les images ont fini de charger
        $('img').on('load', function() {
            console.log('Image loaded:', $(this).attr('alt'));
        }).each(function() {
            // Simule le chargement des images pour celles qui sont déjà en cache
            if (this.complete) {
                $(this).trigger('load');
            }
        });

        // Affiche un message dans la console une fois que le document est prêt
        console.log('Document ready!');
    });
</script>

@endsection
