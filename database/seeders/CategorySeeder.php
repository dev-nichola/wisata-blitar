<?php

namespace Database\Seeders;

use App\Imports\CategoryImport;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = Excel::toCollection(new CategoryImport, 'category.csv', 'public',\Maatwebsite\Excel\Excel::CSV);

        foreach($data[0] as $row)
        {
            Category::create([
                "id" => $row[0],
                "category" => $row[1]
            ]);
        }
    }
}
