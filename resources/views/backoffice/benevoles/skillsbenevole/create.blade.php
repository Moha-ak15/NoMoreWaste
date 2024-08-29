@extends('backoffice.layout')

@section('title', 'Ajouter une Compétence')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Ajouter une Compétence</h4>
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

            <form action="{{ route('skills_benevole.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="benevole_id">Bénévole</label>
                    <select name="benevole_id" class="form-control" required>
                        <option value="" disabled selected>Choisissez un bénévole</option>
                        @foreach ($benevoles as $benevole)
                            <option value="{{ $benevole->benevole_id }}">{{ $benevole->nom }} {{ $benevole->prenom }} : {{ $benevole->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="competence">Compétence</label>
                    <input type="text" name="competence" class="form-control" placeholder="Entrez la compétence" required>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Ajouter la Compétence</button>
            </form>
        </div>
    </div>
</div>
@endsection
