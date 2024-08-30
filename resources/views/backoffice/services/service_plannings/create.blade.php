@extends('backoffice.layout')

@section('title', 'Ajouter un Planning de Service')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Ajouter un Planning de Service</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('service_plannings.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="service_id">Service</label>
                    <select name="service_id" class="form-control" required>
                        @foreach ($services as $service)
                            <option value="{{ $service->service_id }}">{{ $service->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_debut">Date de Début</label>
                    <input type="datetime-local" name="date_debut" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="date_fin">Date de Fin (Optionnel)</label>
                    <input type="datetime-local" name="date_fin" class="form-control">
                </div>

                <div class="form-group">
                    <label for="lieu">Lieu</label>
                    <input type="text" name="lieu" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Créer le Planning</button>
            </form>
        </div>
    </div>
</div>
@endsection
