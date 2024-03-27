<!--**********************************
    Scripts
***********************************-->
<script src="{{ asset('backend/plugins/common/common.min.js') }}"></script>
<script src="{{ asset('backend/js/custom.min.js') }}"></script>
<script src="{{ asset('backend/js/settings.js') }}"></script>
<script src="{{ asset('backend/js/gleek.js') }}"></script>
<script src="{{ asset('backend/js/styleSwitcher.js') }}"></script>

<!-- Chartjs -->
<script src="{{ asset('backend/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<!-- Circle progress -->
<script src="{{ asset('backend/plugins/circle-progress/circle-progress.min.js') }}"></script>
<!-- Datamap -->
<script src="{{ asset('backend/plugins/d3v3/index.js') }}"></script>
<script src="{{ asset('backend/plugins/topojson/topojson.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datamaps/datamaps.world.min.js') }}"></script>
<!-- Morrisjs -->
<script src="{{ asset('backend/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('backend/plugins/morris/morris.min.js') }}"></script>
<!-- Pignose Calender -->
<script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('backend/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
<!-- ChartistJS -->
<script src="{{ asset('backend/plugins/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('backend/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>

<script src="{{ asset('backend/js/dashboard/dashboard-1.js') }}"></script>

<script>
    window.addEventListener('load', function() {
        // Sélectionnez l'élément img par son ID (ajustez l'ID en fonction de votre HTML)
        var monImage = document.getElementById('id-de-votre-image');

        // Attachez un gestionnaire d'événement load à l'image
        monImage.addEventListener('load', function() {
            console.log('L\'image a été entièrement chargée');
            // Vous pouvez ajouter ici le code que vous souhaitez exécuter une fois l'image chargée
        });
    });
</script>
