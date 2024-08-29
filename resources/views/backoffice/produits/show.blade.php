@extends('backoffice.layout')

@section('title', 'Détails du Bénévole')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Détails du Bénévole</h3>
    </div>
    <div class="card-body">
        <p><strong>Nom:</strong> {{ $benevole->nom }}</p>
        <p><strong>Prénom:</strong> {{ $benevole->prenom }}</p>
        <p><strong>Email:</strong> {{ $benevole->email }}</p>
        <p><strong>Téléphone:</strong> {{ $benevole->telephone }}</p>
        <p><strong>Disponibilité:</strong> {{ $benevole->disponibilite }}</p>
        <a href="{{ route('benevoles.index') }}" class="btn btn-primary">Retour à la liste</a>
    </div>
</div>
@endsection
