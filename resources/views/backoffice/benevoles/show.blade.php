@extends('backoffice.layout')

@section('title', 'Détails du Bénévole')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Détails du Bénévole</h3>
    </div>
    <div class="card-body">
        <p><strong>Nom:</strong> {{ $benevoles->nom }}</p>
        <p><strong>Prénom:</strong> {{ $benevoles->prenom }}</p>
        <p><strong>Email:</strong> {{ $benevoles->email }}</p>
        <p><strong>Téléphone:</strong> {{ $benevoles->telephone }}</p>
        <p><strong>Disponibilité:</strong> {{ $benevoles->disponibilite }}</p>
        <a href="{{ route('benevoles.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection
