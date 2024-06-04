<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data   = [
            [
                "code"    => "CREMATIO",
                "name"    => "Cremation products",
            ],
            [
                "code"    => "CARDS",
                "name"    => "Memorial Cards",
            ],
            [
                "code"    => "RENO",
                "name"    => "Renovations,inscriptions etc",
            ],
            [
                "code"    => "SUNDRY",
                "name"    => "Hearts,plaques,etc",
            ],
            [
                "code"    => "NEW MEM",
                "name"    => "New memorial, supply stone",
            ],
        ];

        Category::insert($data);
    }
}
