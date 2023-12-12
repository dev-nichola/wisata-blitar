<?php

namespace Database\Seeders;

use App\Imports\RegencyImport;
use App\Models\Regency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = Excel::toCollection(new RegencyImport, 'regency.csv', 'public', \Maatwebsite\Excel\Excel::CSV);


        foreach($data[0] as $row)
        {
            Regency::create([
                "id" => $row[0],
                "regency" => $row[1]
            ]);
        }
    }
}
