@extends('frontoffice.layout')

@section('title', 'Détails de la Tournée')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tournée du {{ \Carbon\Carbon::parse($tournees->date_tournee)->format('d/m/Y') }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($tournees->date_tournee)->format('d/m/Y') }}</p>
            <p><strong>Destination :</strong> {{ $tournees->destination }}</p>
            <p><strong>Responsable :</strong> {{ $tournees->responsable }}</p>

            @auth
                @if(!$tournees->users->contains(auth()->user()))
                    <form action="{{ route('tourneesfront.inscription', $tournees->tournee_id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success mt-3">S'inscrire à cette tournée</button>
                    </form>
                @else
                    <p class="text-success mt-3">Vous êtes déjà inscrit à cette tournée.</p>
                @endif
            @else
                <p class="mt-3"><a href="{{ route('login') }}">Connectez-vous</a> pour vous inscrire à cette tournée.</p>
            @endauth
        </div>
        <div class="card-footer">
            <a href="{{ route('tourneesfront.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
