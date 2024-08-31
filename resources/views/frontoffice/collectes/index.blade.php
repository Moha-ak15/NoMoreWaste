@extends('frontoffice.layout')

@section('title', 'Collectes Programmées')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 fs-3">Collectes Programmées</h2>
    <div class="row">
        @foreach($collectes as $collecte)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Collecte du {{ \Carbon\Carbon::parse($collecte->date_collecte)->format('d/m/Y') }}</h5>
                        <p class="card-text">
                            <strong>Statut :</strong> {{ ucfirst($collecte->statut_collecte) }} <br>
                            <strong>Quantité à Collecter :</strong> {{ $collecte->quantite_collectee }} kg
                        </p>
                        <a href="{{ route('collectesfront.show', $collecte->collecte_id) }}" class="btn btn-outline-primary mt-3">Voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if($collectes->isEmpty())
        <p class="text-center">Aucune collecte programmée pour le moment.</p>
    @endif
</div>
@endsection
