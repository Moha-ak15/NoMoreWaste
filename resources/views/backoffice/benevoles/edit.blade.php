@extends('backoffice.layout')

@section('title', 'Modifier le Bénévole')

@section('content')
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Modifier le Bénévole</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('benevoles.update', $benevoles->benevole_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group my-2">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $benevoles->nom }}" required>
            </div>
            <div class="form-group my-2">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" value="{{ $benevoles->prenom }}" required>
            </div>
            <div class="form-group my-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $benevoles->email }}" required>
            </div>
            <div class="form-group my-2">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" class="form-control" value="{{ $benevoles->telephone }}" required>
            </div>
            <div class="form-group my-2">
                <label for="date_inscription">Date d'inscription</label>
                <input type="date" name="date_inscription" class="form-control" value="{{ $benevoles->date_inscription }}" required>
            </div>
            <div class="form-group my-2">
                <label for="disponibilite">Disponibilité</label>
                <select name="disponibilite" class="form-control" required>
                    <option value="Disponible" {{ $benevoles->disponibilite == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="Indisponible" {{ $benevoles->disponibilite == 'Indisponible' ? 'selected' : '' }}>Indisponible</option>
                    <option value="Weekends seulement" {{ $benevoles->disponibilite == 'Weekends seulement' ? 'selected' : '' }}>Weekends seulement</option>
                    <option value="Soirs uniquement" {{ $benevoles->disponibilite == 'Soirs uniquement' ? 'selected' : '' }}>Soirs uniquement</option>
                    <option value="Journée uniquement" {{ $benevoles->disponibilite == 'Journée uniquement' ? 'selected' : '' }}>Journée uniquement</option>
                    <option value="Disponible sur demande" {{ $benevoles->disponibilite == 'Disponible sur demande' ? 'selected' : '' }}>Disponible sur demande</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3">Enregistrer les modifications</button>
        </form>
    </div>
</div>
@endsection
