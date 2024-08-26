@extends('backoffice.layout')

@section('title', 'Liste des Bénévoles')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Bénévoles</h3>
        <a href="{{ route('benevoles.create') }}" class="btn btn-primary float-right">Ajouter un Bénévole</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($benevoles as $benevole)
                <tr>
                    <td>{{ $benevole->benevole_id }}</td>
                    <td>{{ $benevole->nom }} {{ $benevole->prenom }}</td>
                    <td>{{ $benevole->email }}</td>
                    <td>{{ $benevole->telephone }}</td>
                    <td>
                        <a href="{{ route('benevoles.show', ['benenoles', $benevole->benevole_id]) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('benevoles.edit', ['benenoles', $benevole->benevole_id]) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('benevoles.destroy', ['benenoles', $benevole->benevole_id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce bénévole ?');">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
