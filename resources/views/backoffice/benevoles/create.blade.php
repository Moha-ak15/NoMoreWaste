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
            <div class="form-group my-2">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="form-group my-2">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" required>
            </div>
            <div class="form-group my-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group my-2">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" class="form-control" required>
            </div>
            <div class="form-group my-2">
                <label for="date_inscription">Date d'inscription</label>
                <input type="date" name="date_inscription" class="form-control" required>
            </div>
            <div class="form-group my-2">
                <label for="disponibilite">Disponibilité</label>
                <select name="disponibilite" class="form-control" required>
                    <option value="Disponible">Disponible</option>
                    <option value="Indisponible">Indisponible</option>
                    <option value="Weekends seulement">Weekends seulement</option>
                    <option value="Soirs uniquement">Soirs uniquement</option>
                    <option value="Journée uniquement">Journée uniquement</option>
                    <option value="Disponible sur demande">Disponible sur demande</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
        </form>
    </div>
</div>
@endsection
