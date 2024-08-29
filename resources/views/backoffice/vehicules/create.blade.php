@extends('backoffice.layout')

@section('title', 'Ajouter un Véhicule')

@section('content')
<div class="container my-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Ajouter un Véhicule</h4>
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

            <form action="{{ route('vehicules.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="immatriculation">Immatriculation</label>
                    <input type="text" name="immatriculation" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="marque">Marque</label>
                    <input type="text" name="marque" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="modele">Modèle</label>
                    <input type="text" name="modele" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="capacite">Capacité (kg)</label>
                    <input type="number" name="capacite" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="statut">Statut</label>
                    <select name="statut" class="form-control">
                        <option value="disponible">Disponible</option>
                        <option value="reservé">Réservé</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Ajouter le Véhicule</button>
            </form>
        </div>
    </div>
</div>
@endsection
