@extends('backoffice.layout')

@section('title', 'Détails du Service')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Détails du Service</h4>
        </div>
        <div class="card-body">
            <p><strong>Nom : </strong>{{ $service->nom }}</p>
            <p><strong>Description : </strong>{{ $service->description }}</p>
        </div>
    </div>
</div>
@endsection
