<?php

namespace Database\Seeders;

use App\Models\VatCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VatCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'vat_description' => 'Standard 13.5%',
                'vat' => '13.50',
                'code' => 'T0'
            ],
            [
                'vat_description' => 'Zero Rated',
                'vat' => '0.00',
                'code' => 'T1'
            ],
            [
                'vat_description' => 'Sales VAT 23%',
                'vat' => '23.00',
                'code' => 'T5'
            ]
        ];

        VatCode::insert($data);
    }
}
