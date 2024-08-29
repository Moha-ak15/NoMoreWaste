@extends('backoffice.layout')

@section('title', 'Gestion des Tournées')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Liste des Tournées</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('tournees.create') }}" class="btn btn-success mb-3">Ajouter une Tournée</a>

            @if ($tournees->isEmpty())
                <p>Aucune tournée trouvée.</p>
            @else
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Date de la Tournée</th>
                            <th>Destination</th>
                            <th>Responsable</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tournees as $tournee)
                            <tr>
                                <td>{{ $tournee->date_tournee }}</td>
                                <td>{{ $tournee->destination }}</td>
                                <td>{{ $tournee->responsable }}</td>
                                <td class="text-center">
                                    <a href="{{ route('tournees.edit', $tournee->tournee_id) }}" class="btn btn-warning btn-sm" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('tournees.destroy', $tournee->tournee_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tournée ?')">
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
