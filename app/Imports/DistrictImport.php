<?php

namespace App\Imports;

use App\Models\Regency;
use App\Models\District;
use Maatwebsite\Excel\Concerns\ToModel;

use function Laravel\Prompts\select;

class DistrictImport implements ToModel
{

    private $regency;
    public function __construct()
    {
        $this->regency = Regency::select('id')->get();
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $regency = $this->regency->where('id', $row[2])->first();
        return new District([
            "id" => $row[0],
            "district" => $row[1],
            "regency_id" => $regency->id ?? NULL
        ]);
    }
}
