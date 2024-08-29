@extends('backoffice.layout')

@section('title', 'Liste des Commerçants')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Commerçants</h3>
        <a href="{{ route('commercants.create') }}" class="btn btn-primary float-right">Ajouter un Commercant</a>
    </div>
    <div class="card-body">

        <form action="{{ route('commercants.index') }}" method="GET" class="form-inline mb-4">
            <div class="form-group mx-sm-3 mb-2">
                <label for="search" class="sr-only">Recherche</label>
                <input type="text" name="search" class="form-control" placeholder="Rechercher par nom, type, adresse..." value="{{ request()->input('search') }}">
                <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de l'entreprise</th>
                    <th>Nom du Responsable</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Type de Commerce</th>
                    <th>Date d'adhésion</th>
                    <th>Date de Renouvellement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commercants as $commercant)
                <tr>
                    <td>{{ $commercant->commercant_id }}</td>
                    <td>{{ $commercant->entreprise }}</td>
                    <td>{{ $commercant->responsable }}</td>
                    <td>{{ $commercant->adresse }}</td>
                    <td>{{ $commercant->email }}</td>
                    <td>{{ $commercant->telephone }}</td>
                    <td>{{ $commercant->type_commercant }}</td>
                    <td>{{ $commercant->date_adhesion }}</td>
                    <td>{{ $commercant->date_renouvellement }}</td>
                    <td>
                        <a href="{{ route('commercants.show', $commercant->commercant_id) }}" title="Voir" class="btn btn-outline-info btn-sm m-1">🔎</a>
                        <a href="{{ route('commercants.edit', $commercant->commercant_id) }}" title="Editer" class="btn btn-outline-warning btn-sm">📝</a>
                        <form action="{{ route('commercants.destroy', $commercant->commercant_id) }}"  method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Supprimer" class="btn btn-outline-danger btn-sm m-1" onclick="return confirm('Voulez-vous vraiment supprimer ce commerçant ?');">❌</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
