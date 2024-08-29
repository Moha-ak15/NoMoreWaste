@extends('backoffice.layout')

@section('title', 'Liste des Véhicules')

@section('content')
<div class="container my-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Véhicules</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('vehicules.create') }}" class="btn btn-success mb-3">Ajouter un Véhicule</a>

            @if ($vehicules->isEmpty())
                <p>Aucun véhicule trouvé.</p>
            @else
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Immatriculation</th>
                            <th>Marque</th>
                            <th>Modèle</th>
                            <th>Type</th>
                            <th>Capacité</th>
                            <th>Statut</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehicules as $vehicule)
                            <tr>
                                <td>{{ $vehicule->immatriculation }}</td>
                                <td>{{ $vehicule->marque }}</td>
                                <td>{{ $vehicule->modele }}</td>
                                <td>{{ $vehicule->type }}</td>
                                <td>{{ $vehicule->capacite }} kg</td>
                                <td>{{ ucfirst($vehicule->statut) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('vehicules.edit', $vehicule->vehicule_id) }}" class="btn btn-warning btn-sm" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('vehicules.destroy', $vehicule->vehicule_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
