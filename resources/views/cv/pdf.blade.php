@foreach($cvs as $cv)
<div class="modal fade" id="cvModal{{ $cv->id }}" tabindex="-1" aria-labelledby="cvModalLabel{{ $cv->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cvModalLabel{{ $cv->id }}">Aperçu du CV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Utilisez un iframe pour afficher le contenu du PDF -->
                <iframe src="{{ asset('storage/cvs/' . urlencode($cv->cv_filename)) }}" width="100%" height="500px"></iframe>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
@endforeach
