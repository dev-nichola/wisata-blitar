<?php

namespace Database\Seeders;

use App\Imports\TourImport;
use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class TouristSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = Excel::toCollection(new TourImport, 'tour.csv', 'public', \Maatwebsite\Excel\Excel::CSV);

        foreach($data[0] as $row)
        {
            Tour::create([
                "id" => $row[0],
                "name" => $row[1],
                "description" => $row[2],
                "address" => $row[3],
                "category_id" => $row[4],
                "district_id" => $row[5]
            ]);
        }
    }
}
