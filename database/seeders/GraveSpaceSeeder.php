<?php

namespace Database\Seeders;

use App\Models\GraveSpace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GraveSpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Single',
            ],
            [
                'name' => 'Double',
            ],
            [
                'name' => 'Treble',
            ],
        ];

        GraveSpace::insert($data);
    }
}
