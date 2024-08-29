@extends('backoffice.layout')

@section('title', 'Gestion des Services')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Liste des Services</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('services.create') }}" class="btn btn-success mb-3">Ajouter un Service</a>

            @if ($services->isEmpty())
                <p>Aucun service trouvé.</p>
            @else
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $service->nom }}</td>
                                <td>{{ $service->description }}</td>
                                <td class="text-center">
                                    <a href="{{ route('services.edit', $service->service_id) }}" class="btn btn-warning btn-sm" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('services.destroy', $service->service_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')">
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
