<?php

namespace App\Imports;

use App\Models\Tour;
use Maatwebsite\Excel\Concerns\ToModel;

class TourImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tour([
            "id" => $row[0],
            "name" => $row[1],
            "description" => $row[2],
            "address" => $row[3],
            "category_id" => $row[4],
            "district_id" => $row[5]
        ]);
    }
}
