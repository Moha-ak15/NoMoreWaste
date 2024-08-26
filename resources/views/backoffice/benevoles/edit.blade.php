@extends('backoffice.layout')

@section('title', 'Modifier le Bénévole')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier le Bénévole</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('benevoles.update', $benevole->benevole_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $benevole->nom }}" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" value="{{ $benevole->prenom }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $benevole->email }}" required>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" class="form-control" value="{{ $benevole->telephone }}" required>
            </div>
            <div class="form-group">
                <label for="disponibilite">Disponibilité</label>
                <input type="text" name="disponibilite" class="form-control" value="{{ $benevole->disponibilite }}" required>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
        </form>
    </div>
</div>
@endsection
