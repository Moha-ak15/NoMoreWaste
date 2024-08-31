@extends('frontoffice.layout')

@section('title', $services->nom)

@section('content')
<div class="container my-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $services->nom }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Description :</strong> {{ $services->description }}</p>

            <!-- Affichage des plannings -->
            @if($services->plannings->isNotEmpty())
                @foreach($services->plannings as $planning)
                    <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($planning->date_debut)->format('d/m/Y H:i') }} - {{ $planning->date_fin ? \Carbon\Carbon::parse($planning->date_fin)->format('d/m/Y H:i') : 'N/A' }}</p>
                    <p><strong>Lieu :</strong> {{ $planning->lieu }}</p>
                @endforeach
            @else
                <p>Aucun planning disponible pour ce service.</p>
            @endif

            <!-- Div pour afficher le calendrier -->
            <div id="calendar" class="mt-4"></div>
        </div>
        <hr>
        <div class="text-center mt-4">
            @auth
                @if(!$services->users->contains(auth()->user()))
                    <form action="{{ route('servicesfront.inscription', $services->service_id) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-success px-5 py-3">S'inscrire à ce service</button>
                    </form>
                @else
                    <p class="lead text-success">Vous êtes déjà inscrit à ce service.</p>
                @endif
            @else
                <p class="lead mt-4">Pour vous inscrire, <a href="{{ route('login') }}">connectez-vous</a> d'abord.</p>
            @endauth
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
                    @foreach($services->plannings as $planning)
                    {
                        title: '{{ $services->nom }}',
                        start: '{{ $planning->date_debut }}',
                        end: '{{ $planning->date_fin }}',
                        description: '{{ $planning->lieu }}',
                        backgroundColor: 'grey',
                        borderColor: 'orange',
                        textColor: 'white'
                    },
                    @endforeach
                ],
                eventClick: function(info) {
                    alert('Service: ' + info.event.title + '\nLieu: ' + info.event.extendedProps.description);
                }
            });

            calendar.render();
        });
    </script>
@endsection
