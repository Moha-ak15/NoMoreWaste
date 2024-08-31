@extends('frontoffice.layout')

@section('title', 'Détails de la Collecte')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Collecte du {{ \Carbon\Carbon::parse($collectes->date_collecte)->format('d/m/Y') }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($collectes->date_collecte)->format('d/m/Y') }}</p>
            <p><strong>Statut :</strong> {{ ucfirst($collectes->statut_collecte) }}</p>
            <p><strong>Quantité à Collecter :</strong> {{ $collectes->quantite_collecte }} kg</p>
            <p><strong>Équipe Responsable :</strong> {{ $collectes->equipe_responsable ?? 'Non assignée' }}</p>

            @auth
                @if(!$collectes->users->contains(auth()->user()))
                    <form action="{{ route('collectesfront.inscription', $collectes->collecte_id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success mt-3">S'inscrire à cette collecte</button>
                    </form>
                @else
                    <p class="text-success mt-3">Vous êtes déjà inscrit à cette collecte.</p>
                @endif
            @else
                <p class="mt-3"><a href="{{ route('login') }}">Connectez-vous</a> pour vous inscrire à cette collecte.</p>
            @endauth
        </div>
        <div class="card-footer">
            <a href="{{ route('collectesfront.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
