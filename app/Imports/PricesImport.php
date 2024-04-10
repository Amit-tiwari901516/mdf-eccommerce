<?php

namespace App\Imports;

use App\Models\BulkPrice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PricesImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new BulkPrice([
            'specie'     => $row[0],
            'thickness'  => $row[1],
            'width'     => (float)$row[2],
            'height'     => (float)$row[3],
            'depth'     => (float)$row[4],
            'price'     => (float)$row[5]
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
