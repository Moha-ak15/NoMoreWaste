@extends('backoffice.layout')

@section('title', 'Liste des Collectes')

@section('content')
<div class="container my-3">
    <a href="{{ route('collectes.create') }}" class="btn btn-primary">Créer une Nouvelle Collecte</a>
    <div class="card shadow-sm mt-1">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Collectes pour le commerçant #{{ $commercants->commercant_id }}</h4>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('collectes.index', $commercants->commercant_id) }}" class="form-row align-items-end mb-4">
                <div class="col-md-4">
                    <label for="statut_collecte" class="form-label">Statut:</label>
                    <select name="statut_collecte" id="statut_collecte" class="form-control">
                        <option value="" {{ request('statut_collecte') == '' ? 'selected' : '' }}>Tous</option>
                        <option value="programmé" {{ request('statut_collecte') == 'programmé' ? 'selected' : '' }}>Programmé</option>
                        <option value="en cours" {{ request('statut_collecte') == 'en cours' ? 'selected' : '' }}>En cours</option>
                        <option value="terminé" {{ request('statut_collecte') == 'terminé' ? 'selected' : '' }}>Terminé</option>
                        <option value="annulé" {{ request('statut_collecte') == 'annulé' ? 'selected' : '' }}>Annulé</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="date_collecte" class="form-label">Date:</label>
                    <input type="date" name="date_collecte" id="date_collecte" class="form-control" value="{{ request('date_collecte') }}">
                </div>
                <div class="col-md-4 text-right">
                    <button type="submit" class="btn btn-primary mt-2">Filtrer</button>
                </div>
            </form>

            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Date de Collecte</th>
                        <th>Nom du Commerçant</th>
                        <th>Date et Heure</th>
                        <th>Statut</th>
                        <th>Quantité Collectée</th>
                        <th>Équipe Responsable</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($collectes as $collecte)
                        <tr>
                            <td>{{ $collecte->date_collecte }}</td>
                            <td>{{ $collecte->commercant->responsable }}</td>
                            <td>{{ $collecte->date_collecte }}</td>
                            <td>
                                <span class="badge
                                    @if($collecte->statut_collecte == 'programmé') badge-info
                                    @elseif($collecte->statut_collecte == 'en cours') badge-warning
                                    @elseif($collecte->statut_collecte == 'terminé') badge-success
                                    @else badge-danger @endif">
                                    {{ ucfirst($collecte->statut_collecte) }}
                                </span>
                            </td>
                            <td>{{ $collecte->quantite_collectee }} kg</td>
                            <td>{{ $collecte->equipe_responsable ?? 'N/A' }}</td>
                            <td class="text-center">
                                <a href="{{ route('collectes.show', $collecte->collecte_id) }}" class="btn btn-info btn-sm" title="Détails">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('collectes.edit', $collecte->collecte_id) }}" class="btn btn-warning btn-sm" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('collectes.destroy', $collecte->collecte_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Annuler" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette collecte ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $collectes->links() }} <!-- Pagination links -->
            </div>
        </div>
    </div>
</div>

@endsection
