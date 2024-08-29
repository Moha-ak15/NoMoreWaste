@extends('backoffice.layout')

@section('title', 'Modifier la Collecte')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Modifier la Collecte</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('collectes.update', $collecte->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <label for="date_collecte" class="form-label">Date de la Collecte</label>
                        <input type="date" name="date_collecte" class="form-control" value="{{ $collecte->date_collecte }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="commercant_id" class="form-label">Commerçant</label>
                        <select name="commercant_id" class="form-control" required>
                            @foreach ($commercants as $commercant)
                                <option value="{{ $commercant->id }}" {{ $collecte->commercant_id == $commercant->id ? 'selected' : '' }}>
                                    {{ $commercant->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <label for="produit_id" class="form-label">Produit</label>
                        <select name="produit_id" class="form-control" required>
                            @foreach ($produits as $produit)
                                <option value="{{ $produit->id }}" {{ $collecte->produit_id == $produit->id ? 'selected' : '' }}>
                                    {{ $produit->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="quantite_collecte" class="form-label">Quantité à Collecter (kg)</label>
                        <input type="number" name="quantite_collecte" class="form-control" value="{{ $collecte->quantite_collecte }}" min="1" required>
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <label for="benevoles" class="form-label">Sélectionner les Bénévoles</label>
                        <select name="benevoles[]" class="form-control" multiple required>
                            @foreach ($benevoles as $benevole)
                                <option value="{{ $benevole->id }}" {{ in_array($benevole->id, $collecteBenevoles) ? 'selected' : '' }}>
                                    {{ $benevole->nom }} - {{ $benevole->competences }}
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Maintenez Ctrl (Windows) ou Command (Mac) pour sélectionner plusieurs bénévoles.</small>
                    </div>
                    <div class="col-md-6">
                        <label for="vehicules" class="form-label">Sélectionner les Véhicules</label>
                        <select name="vehicules[]" class="form-control" multiple required>
                            @foreach ($vehicules as $vehicule)
                                <option value="{{ $vehicule->id }}" {{ in_array($vehicule->id, $collecteVehicules) ? 'selected' : '' }}>
                                    {{ $vehicule->marque }} - {{ $vehicule->immatriculation }} - Capacité: {{ $vehicule->capacite }} kg
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Maintenez Ctrl (Windows) ou Command (Mac) pour sélectionner plusieurs véhicules.</small>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary mt-2">Mettre à jour la Collecte</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
