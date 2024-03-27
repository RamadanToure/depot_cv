@extends('backend.base')

@section('content')

<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-start">
                        <h4>Gestion des Employés</h4>
                    </div>

                    <form action="{{ route('employees.index') }}" method="GET" class="mb-3">
                        <div class="row justify-content-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="q" name="q" class="form-control" placeholder="Rechercher par prénom, nom ou email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Rechercher</button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="row justify-content-start mb-3"> <!-- Espace vertical au lieu de hr -->
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createEmployeeModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead class="table-header-blue">
                            <tr>
                                <th>ID</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th class="text-center"><i class="fas fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>

                                {{-- <td>
                                    <img class="img-fluid" src="{{ asset($employee->photo) }}" alt="{{ $employee->first_name }} {{ $employee->last_name }}" width="100" height="100">
                                </td> --}}

                                <td>
                                    <!-- Assurez-vous que le chemin de l'image est correct -->
                                    <img class="img-fluid" src="{{ asset($employee->photo) }}" alt="{{ $employee->titre }}" width="50" height="50">
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-bars me-2"></i> <!-- Ajoutez une icône de lignes horizontales -->
                                        </button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#showModal{{ $employee->id }}">
                                                <i class="fas fa-eye me-2"></i> Voir
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#createEmployeeModal">
                                                <i class="fas fa-plus me-2"></i> Créer
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editEmployeeModal{{ $employee->id }}">
                                                <i class="fas fa-edit me-2"></i> Modifier
                                            </a>



                                            <!-- Ajoutez d'autres options ici -->
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal{{ $employee->id }}">
                                                <i class="fas fa-trash-alt me-2"></i> Supprimer
                                            </a>
                                        </div>
                                    </div>
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

<!-- Modal pour les actions sur les employés -->
<!-- Ajouter, Modifier, Supprimer, Afficher -->
@include('backend.personnel.create')
@include('backend.personnel.edit')
@endsection
