@extends('backoffice.layout')

@section('title', 'Modifier un Véhicule')

@section('content')
<div class="container my-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Modifier le Véhicule</h4>
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

            <form action="{{ route('vehicules.update', $vehicule->vehicule_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="immatriculation">Immatriculation</label>
                    <input type="text" name="immatriculation" class="form-control" value="{{ $vehicule->immatriculation }}" required>
                </div>

                <div class="form-group">
                    <label for="marque">Marque</label>
                    <input type="text" name="marque" class="form-control" value="{{ $vehicule->marque }}" required>
                </div>

                <div class="form-group">
                    <label for="modele">Modèle</label>
                    <input type="text" name="modele" class="form-control" value="{{ $vehicule->modele }}" required>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" class="form-control" value="{{ $vehicule->type }}" required>
                </div>

                <div class="form-group">
                    <label for="capacite">Capacité (kg)</label>
                    <input type="number" name="capacite" class="form-control" value="{{ $vehicule->capacite }}" required>
                </div>

                <div class="form-group">
                    <label for="statut">Statut</label>
                    <select name="statut" class="form-control">
                        <option value="disponible" {{ $vehicule->statut == 'disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="reservé" {{ $vehicule->statut == 'reservé' ? 'selected' : '' }}>Réservé</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Mettre à jour le Véhicule</button>
            </form>
        </div>
    </div>
</div>
@endsection
