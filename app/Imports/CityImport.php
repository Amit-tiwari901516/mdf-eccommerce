<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CityImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new City([
            'city'     => $row[1],
            'courier'  => $row[0],
            'min'     => (float)$row[2],
            'zero'     => (float)$row[3],
            '500'     => (float)$row[4],
            '1000'     => (float)$row[5],
            '2000'     => (float)$row[6],
            '5000'     => (float)$row[7],
            '10000'     => (float)$row[8]
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
