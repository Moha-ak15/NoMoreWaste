@extends('backoffice.layout')

@section('title', 'Modifier l\'Utilisateur')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier l'Utilisateur</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $users->user_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control" value="{{ $users->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $users->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input type="password" name="password" class="form-control">
                <small>Laissez ce champ vide si vous ne souhaitez pas modifier le mot de passe.</small>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmer le Mot de Passe</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-success mt-3">Enregistrer les modifications</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Annuler</a>
        </form>
    </div>
</div>
@endsection
