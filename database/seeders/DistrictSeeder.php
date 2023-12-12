<?php

namespace Database\Seeders;

use App\Imports\DistrictImport;
use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = Excel::toCollection(new DistrictImport, 'district.csv', 'public', \Maatwebsite\Excel\Excel::CSV);

       foreach($data[0] as $row)
       {
            District::create([
                "id" => $row[0],
                "district" => $row[1],
                "regency_id" => $row[2]
            ]);
       }
    }
}
