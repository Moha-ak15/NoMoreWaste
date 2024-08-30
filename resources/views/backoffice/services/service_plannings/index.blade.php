@extends('backoffice.layout')

@section('title', 'Plannings des Services')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Liste des Plannings des Services</h4>
            <a href="{{ route('service_plannings.create') }}" class="btn btn-success">Ajouter un Planning</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($plannings->isEmpty())
                <p>Aucun planning trouvé.</p>
            @else
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Service</th>
                            <th>Date de Début</th>
                            <th>Date de Fin</th>
                            <th>Lieu</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plannings as $planning)
                            <tr>
                                <td>{{ $planning->service->nom }}</td>
                                <td>{{ $planning->date_debut }}</td>
                                <td>{{ $planning->date_fin ?? 'N/A' }}</td>
                                <td>{{ $planning->lieu }}</td>
                                <td class="text-center">
                                    <a href="{{ route('service_plannings.show', $planning->planning_id) }}" class="btn btn-info btn-sm" title="Modifier">
                                        <i class="fas fa-show"></i>
                                    </a>
                                    <a href="{{ route('service_plannings.edit', $planning->planning_id) }}" class="btn btn-warning btn-sm" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('service_plannings.destroy', $planning->planning_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce planning ?')">
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

