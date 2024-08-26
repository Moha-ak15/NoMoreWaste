@extends('backoffice.layout')

@section('title', 'Détails de l\'Utilisateur')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Détails de l'Utilisateur</h3>
    </div>
    <div class="card-body">
        <p><strong>Nom:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Date de Création:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>La Dernière Mise à Jour:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Retour à la liste</a>
        <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-warning">Modifier</a>
    </div>
</div>
@endsection
z
