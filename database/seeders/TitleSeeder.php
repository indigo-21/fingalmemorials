<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data   = [
            [
                "name"    => "Mr.",
            ],
            [
                "name"    => "Mrs.",
            ],
            [
                "name"    => "Ms.",
            ],
            [
                "name"    => "Miss",
            ],
        ];

        Title::insert($data);
    }
}
