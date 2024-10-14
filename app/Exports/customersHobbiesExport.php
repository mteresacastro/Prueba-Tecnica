<?php

namespace App\Exports;

use App\Models\customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class customersHobbiesExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::with('hobbies')->get()->map(function($customer) {
            return [
                'Nombre del Cliente' => mb_convert_encoding($customer->name, 'UTF-8', 'auto'),
                'Apellidos del Cliente'=> mb_convert_encoding($customer->surname,'UTF-8', 'auto'),
                'Lista de Hobbies' => mb_convert_encoding($customer->hobbies->pluck('name')->implode(', '), 'UTF-8', 'auto')

            ];
        });

    }

// Esto añade nombre a las columnas
    public function headings(): array
    {
        return ['Nombre del Cliente', 'Apellidos del Cliente', 'Lista de Hobbies'];
    }

//Esto divide las columnas
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'enclosure' => '"',
            'line_ending' => "\r\n",
            'use_bom' => true,
        //para que se vean las tildes:
            'output_encoding' => 'UTF-8',
        //Si se siguen sin ver es por excel, abrir excel->datos->desde texto->65001: Unicode (UTF-8)->cargar y se verá bien.

        ];
    }

}
