@extends('backoffice.layout')

@section('title', 'Modifier le Planning de Service')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Modifier le Planning de Service</h4>
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

            <form action="{{ route('service_plannings.update', $plannings->planning_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="service_id">Service</label>
                    <select name="service_id" class="form-control" required>
                        @foreach ($services as $service)
                            <option value="{{ $service->service_id }}" {{ $plannings->service_id == $service->service_id ? 'selected' : '' }}>
                                {{ $service->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_debut">Date de Début</label>
                    <input type="datetime-local" name="date_debut" class="form-control" value="{{ $plannings->date_debut }}" required>
                </div>

                <div class="form-group">
                    <label for="date_fin">Date de Fin (Optionnel)</label>
                    <input type="datetime-local" name="date_fin" class="form-control" value="{{ $plannings->date_fin }}">
                </div>

                <div class="form-group">
                    <label for="lieu">Lieu</label>
                    <input type="text" name="lieu" class="form-control" value="{{ $plannings->lieu }}" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Mettre à jour le Planning</button>
            </form>
        </div>
    </div>
</div>
@endsection
