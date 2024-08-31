<?php

namespace App\Exports;

use App\Models\Service;
use App\Models\ServiceProposal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ServicesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Service::with(['proposals', 'plannings'])->get();
    }

    public function headings(): array
    {
        return [
            'Nom du Service',
            'Description',
            'Proposé par',
            'Statut de la Proposition',
            'Date de Début du Planning',
            'Date de Fin du Planning',
            'Lieu du Planning'
        ];
    }

    public function map($service): array
    {
        $planning = $service->plannings->first(); // On prend le premier planning pour simplifier

        return [
            $service->nom,
            $service->description,
            optional($service->proposal)->proposeur, // Utilisation de `optional` pour gérer les valeurs nulles
            optional($service->proposal)->statut,
            optional($planning)->date_debut,
            optional($planning)->date_fin,
            optional($planning)->lieu
        ];
    }
}
