<?php

namespace App\Imports;

use App\Models\Society;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SocietiesImport implements ToModel, WithStartRow
{

    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Society([
            'nik' => fake()->unique()->nik(),
            'fullname' => $row[0],
            'photo' => $row[1],
            'gender' => $row[2],
            'pob' => $row[3],
            'dob' => $row[4],
            'address' => $row[5],
            'religion' => $row[6],
            'marital_status' => $row[7],
            'profession' => $row[8],
            'nationality' => $row[9],
        ]);
    }
}
