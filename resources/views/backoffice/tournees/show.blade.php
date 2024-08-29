@extends('backoffice.layout')

@section('title', 'Détails de la Tournée')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Détails de la Tournée</h4>
        </div>
        <div class="card-body">
            <p><strong>Date de la Tournée : </strong>{{ $tournee->date_tournee }}</p>
            <p><strong>Destination : </strong>{{ $tournee->destination }}</p>
            <p><strong>Responsable : </strong>{{ $tournee->responsable }}</p>
        </div>
    </div>
</div>
@endsection
