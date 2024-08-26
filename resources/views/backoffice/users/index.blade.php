@extends('backoffice.layout')

@section('title', 'Liste des Utilisateurs')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Utilisateurs</h3>
        <a href="{{ route('users.create') }}" class="btn btn-primary float-right">Ajouter un Utilisateur</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->user_id) }}" class="btn btn-info btn-sm">Voir l'Utilisateurs</a>
                        <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-warning btn-sm">Éditer l'Utilisateur</a>
                        <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
