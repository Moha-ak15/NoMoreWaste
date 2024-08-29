@extends('backoffice.layout')

@section('title', 'Modifier une Compétence')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Modifier la Compétence</h4>
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

            <form action="{{ route('skills_benevole.update', $skillBenevole->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="benevole_id">Bénévole</label>
                    <select name="benevole_id" class="form-control" required>
                        @foreach ($benevoles as $benevole)
                            <option value="{{ $benevole->benevole_id }}" {{ $benevole->benevole_id == $skillBenevole->benevole_id ? 'selected' : '' }}>
                                {{ $benevole->nom }} {{ $benevole->prenom }} : {{ $benevole->email }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="competence">Compétence</label>
                    <input type="text" name="competence" class="form-control" value="{{ $skillBenevole->competence }}" placeholder="Entrez la compétence" required>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Mettre à jour la Compétence</button>
            </form>
        </div>
    </div>
</div>
@endsection
