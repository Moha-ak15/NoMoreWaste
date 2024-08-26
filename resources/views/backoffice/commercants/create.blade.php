@extends('backoffice.layout')

@section('title', 'Ajouter un Commerçant')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ajouter un Commerçant</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('commercants.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="entreprise">Nom de l'entreprise</label>
                <input type="text" name="entreprise" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="responsable">Nom du Responsable</label>
                <input type="text" name="responsable" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse complète</label>
                <input type="text" name="adresse" class="form-control" required>
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
                <label for="type_commercant">Type de commerce</label>
                <input type="text" name="type_commercant" class="form-control" placeholder="Boulangerie, Supermarché, Restaurant..." required>
            </div>
            <div class="form-group">
                <label for="date_adhesion">Date d'adhésion</label>
                <input type="date" name="date_adhesion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date_renouvellement">Date de renouvellement</label>
                <input type="date" name="date_renouvellement" class="form-control">
            </div>
            <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
            <a href="{{ route('commercants.index') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>

        </form>
    </div>
</div>
@endsection
