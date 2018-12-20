<?php

namespace App\Exports;
use App\Estados;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EstatusExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Estados::all();
    }


       public function headings(): array
    {
        return [
            '# Transito',
            'Lugar',
        ];
    }
}
