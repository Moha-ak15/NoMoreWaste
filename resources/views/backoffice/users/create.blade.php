@extends('backoffice.layout')

@section('title', 'Ajouter un Utilisateur')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ajouter un Utilisateur</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmer le Mot de Passe</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
