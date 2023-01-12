<?php

namespace App\Exports;

use App\Models\Society;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SocietiesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    public function headings(): array
    {
        return [
            "NIK",
            "Fullname",
            "Photo",
            "Gender",
            "Birth Of Place",
            "Birth Of Date",
            "Address",
            "Religion",
            "Marital Status",
            "Profession",
            "Nationality",
        ];
    }

    public function map($society): array
    {
        return [
            $society->nik,
            strtoupper($society->fullname),
            $society->photo,
            strtoupper($society->gender),
            strtoupper($society->pob),
            $society->dob,
            strtoupper($society->address),
            strtoupper($society->religion),
            strtoupper($society->marital_status),
            strtoupper($society->profession),
            strtoupper($society->nationality),
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Society::all();
    }
}
