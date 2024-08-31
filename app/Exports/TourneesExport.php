<?php

namespace App\Exports;

use App\Models\Tournee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TourneesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Tournee::select('date_tournee', 'destination', 'responsable')->get();
    }

    public function headings(): array
    {
        return [
            'Date de Tournée',
            'Destination',
            'Responsable',
        ];
    }
}
