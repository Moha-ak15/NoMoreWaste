<?php

namespace App\Exports;

use App\Models\Collecte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CollectesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Collecte::with(['commercant', 'benevoles', 'vehicules'])->get();
    }

    public function headings(): array
    {
        return [
            'Date de Collecte',
            'Nom du Responsable',
            'Nom du Commerce',
            'type de Commerce',
            'Produit',
            'Quantité',
            'Statut',
            'Bénévoles',
            'Véhicules'
        ];
    }

    public function map($collecte): array
    {
        $benevoles = $collecte->benevoles->pluck('nom')->implode(', ');
        $vehicules = $collecte->vehicules->pluck('marque', 'modele')->map(function($marque, $modele) {
            return $marque . ' ' . $modele;
        })->implode(', ');

        return [
            $collecte->date_collecte,
            $collecte->commercant->responsable,
            $collecte->commercant->entreprise,
            $collecte->commercant->type_commercant,
            $collecte->produit_id,
            $collecte->quantite_collectee,
            ucfirst($collecte->statut_collecte),
            $benevoles,
            $vehicules
        ];
    }
}
