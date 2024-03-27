
<!-- Modal Show Employee -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Détails de l'employé</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="employeeDetails">
                <!-- Contenu de la modal sera chargé dynamiquement ici -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

@foreach ($employees as $employee)
    <script>
        $('#showModal{{ $employee->id }}').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var employeeId = button.data('employee-id');

            // Charger les détails de l'employé via une requête AJAX ou simplement les afficher ici
            var modal = $(this);
            modal.find('.modal-body').load('/employees/' + employeeId);
        });
    </script>
@endforeach
