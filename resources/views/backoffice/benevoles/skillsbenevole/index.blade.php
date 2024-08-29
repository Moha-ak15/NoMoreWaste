@extends('backoffice.layout')

@section('title', 'Liste des Compétences des Bénévoles')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Compétences des Bénévoles</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('skills_benevole.create') }}" class="btn btn-success mb-3">Ajouter une Compétence</a>

            @if ($skillsBenevoles->isEmpty())
                <p>Aucune compétence trouvée.</p>
            @else
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Bénévole</th>
                            <th>Compétence</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skillsBenevoles as $skill)
                            <tr>
                                <td>{{ $skill->benevole->nom }} {{ $skill->benevole->prenom }}</td>
                                <td>{{ $skill->competence }}</td>
                                <td class="text-center">
                                    <a href="{{ route('skills_benevole.edit', $skill->id) }}" class="btn btn-warning btn-sm" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('skills_benevole.destroy', $skill->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette compétence ?')">
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
