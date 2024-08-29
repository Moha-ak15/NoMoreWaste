@extends('backoffice.layout')

@section('content')
    <div class="container my-3">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Créer une Nouvelle Collecte</h4>
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

                <form action="{{ route('collectes.store') }}" method="POST">
                    @csrf

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="date_collecte" class="form-label">Date de la Collecte</label>
                            <input type="date" name="date_collecte" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="commercant_id">Commerçant</label>
                            <select name="commercant_id" class="form-control" required>
                                @foreach ($commercants as $commercant)
                                    <option value="{{ $commercant->commercant_id }}">{{ $commercant->responsable }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-12">
                            <label for="benevoles" class="form-label">Sélectionner les Bénévoles</label>
                            <select name="benevoles[]" class="form-control" multiple required>
                                @foreach ($benevoles as $benevole)
                                    <option value="{{ $benevole->benevole_id  }}">
                                        {{ $benevole->nom }} {{ $benevole->prenom }} - {{ $benevole->competence }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Maintenez Ctrl (Windows) ou Command (Mac) pour sélectionner plusieurs bénévoles.</small>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="produit_id" class="form-label">Produit</label>
                            <select name="produit_id" class="form-control" required>
                                <option value="" disabled selected>Choisissez un produit</option>
                                @foreach ($produits as $produit)
                                    <option value="{{ $produit->produit_id }}">{{ $produit->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="quantite_collectee" class="form-label">Quantité à Collecter</label>
                            <input type="number" name="quantite_collectee" class="form-control" min="0" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="vehicules" class="form-label">Sélectionner les Véhicules</label>
                        <select name="vehicules[]" class="form-control" multiple required>
                            @foreach ($vehicules as $vehicule)
                                <option value="{{ $vehicule->vehicule_id }}" {{ in_array($vehicule->vehicule_id, $collecteVehicules ?? []) ? 'selected' : '' }}>
                                    {{ $vehicule->marque }} - {{ $vehicule->immatriculation }} - Capacité: {{ $vehicule->capacite }} kg
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Maintenez Ctrl (Windows) ou Command (Mac) pour sélectionner plusieurs véhicules.</small>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary m-2">Créer la Collecte</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
