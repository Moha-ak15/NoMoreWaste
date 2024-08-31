@extends('frontoffice.layout')

@section('title', 'Tournées Disponibles')

@section('content')
<div class="container my-5 ">
    <h2 class="text-center mb-4 fs-3">Tournées Disponibles</h2>
    <div class="row">
        @foreach($tournees as $tournee)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Tournée du{{ \Carbon\Carbon::parse($tournee->date_tournee)->format('d/m/Y') }}</h5>
                        <p class="card-text">
                            <strong>Destination :</strong> {{ $tournee->destination }} <br>
                            <strong>Responsable :</strong> {{ $tournee->responsable }}
                        </p>
                        <a href="{{ route('tourneesfront.show', $tournee->tournee_id) }}" class="btn btn-outline-primary mt-3">Voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if($tournees->isEmpty())
        <p class="text-center">Aucune tournée disponible pour le moment.</p>
    @endif
</div>
@endsection
