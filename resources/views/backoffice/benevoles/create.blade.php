@extends('backoffice.layout')

@section('title', 'Ajouter un Bénévole')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ajouter un Bénévole</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('benevoles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="disponibilite">Disponibilité</label>
                <input type="text" name="disponibilite" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
    </div>
</div>
@endsection
