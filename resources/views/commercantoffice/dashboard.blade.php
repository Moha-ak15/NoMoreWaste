@extends('commercantoffice.layout')

@section('title', 'Tableau de Bord')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Tableau de Bord</h2>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Bienvenue, {{ $commercant->responsable }}</h5>
            <p class="card-text">Entreprise : {{ $commercant->entreprise }}</p>
            <p class="card-text">Adresse : {{ $commercant->adresse }}</p>
            <p class="card-text">Téléphone : {{ $commercant->telephone }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title">Dernières Collectes</h5>
        </div>
        <div class="card-body">
            @if($collectes->isEmpty())
                <p>Aucune collecte récente.</p>
            @else
                <ul class="list-group">
                    @foreach($collectes as $collecte)
                        <li class="list-group-item">
                            {{ $collecte->date_collecte }} - {{ $collecte->produit->nom }} : {{ $collecte->quantite_collecte }} kg
                            <span class="badge bg-primary">{{ ucfirst($collecte->statut_collecte) }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <a href="{{ route('commercant.collectes') }}" class="btn btn-primary">Voir toutes les collectes</a>
</div>
@endsection
