
@foreach ($employees as $employee)
<!-- Modal pour la modification de l'employé -->
<div class="modal fade" id="editEmployeeModal{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel{{ $employee->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployeeModalLabel{{ $employee->id }}">Modifier un employé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <!-- Formulaire de modification d'employé -->
                <form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="first_name{{ $employee->id }}">Prénom</label>
                        <input type="text" id="first_name{{ $employee->id }}" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name{{ $employee->id }}">Nom</label>
                        <input type="text" id="last_name{{ $employee->id }}" name="last_name" class="form-control" value="{{ $employee->last_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email{{ $employee->id }}">Email</label>
                        <input type="email" id="email{{ $employee->id }}" name="email" class="form-control" value="{{ $employee->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="photo{{ $employee->id }}">Photo</label>
                        <input type="file" id="photo{{ $employee->id }}" name="photo" class="form-control-file" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
