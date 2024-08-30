@extends('backoffice.layout')

@section('title', 'Détails du Planning de Service')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Détails du Planning de Service</h4>
        </div>
        <div class="card-body">
            <p><strong>Service : </strong>{{ $plannings->service->nom }}</p>
            <p><strong>Date de Début : </strong>{{ $plannings->date_debut }}</p>
            <p><strong>Date de Fin : </strong>{{ $plannings->date_fin ?? 'N/A' }}</p>
            <p><strong>Lieu : </strong>{{ $plannings->lieu }}</p>

            <!-- Div pour afficher le calendrier -->
            <div id="calendar"></div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('service_plannings.edit', $plannings->planning_id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('service_plannings.destroy', $plannings->planning_id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce planning ?')">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarPlanning = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarPlanning, {
                initialView: 'dayGridMonth',
                locale: 'fr',
                events: [
                    {
                        title: '{{ $plannings->service->nom }}',
                        start: '{{ $plannings->date_debut }}',
                        end: '{{ $plannings->date_fin }}', // Étend l'événement jusqu'à cette date
                        backgroundColor: 'yellow',  // Couleur de fond
                        borderColor: 'orange',  // Couleur de la bordure
                        textColor: 'black'  // Couleur du texte (si besoin)
                    }
                ],
                eventClick: function(info) {
                    alert('Service: ' + info.event.title + '\nLieu: ' + info.event.extendedProps.description);
                }
            });

            calendar.render();
        });

    </script>
@endsection
