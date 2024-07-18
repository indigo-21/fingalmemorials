<?php

namespace Database\Seeders;

use App\Models\Analysis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnalysisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'code' => 'Fees',
                'description' => 'Fees',
                'nominal' => 4002,
                'branch_id' => 3,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 2,
                'code' => 'Memorialcard',
                'description' => 'Memorialcards',
                'nominal' => 4004,
                'branch_id' => 3,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 3,
                'code' => 'NewMemorial',
                'description' => 'NewMemorial',
                'nominal' => 4000,
                'branch_id' => 3,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 4,
                'code' => 'RENOVATION',
                'description' => 'Renovation, inscriptions etc',
                'nominal' => 4003,
                'branch_id' => 3,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 5,
                'code' => 'SUNDRY',
                'description' => 'Hearts, plaques, vases etc',
                'nominal' => 4000,
                'branch_id' => 3,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 6,
                'code' => 'Fees',
                'description' => 'Fees',
                'nominal' => 4002,
                'branch_id' => 4,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 7,
                'code' => 'Memorialcard',
                'description' => 'Memorialcards',
                'nominal' => 4004,
                'branch_id' => 4,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 8,
                'code' => 'NewMemorial',
                'description' => 'NewMemorial',
                'nominal' => 4000,
                'branch_id' => 4,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 9,
                'code' => 'RENO',
                'description' => 'Renovation,inscription etc',
                'nominal' => 4003,
                'branch_id' => 4,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 10,
                'code' => 'Sundry',
                'description' => 'Sundry',
                'nominal' => 4000,
                'branch_id' => 4,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 11,
                'code' => 'NEW',
                'description' => 'New Memorial',
                'nominal' => 4000,
                'branch_id' => 5,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 12,
                'code' => 'CREMATION',
                'description' => 'Cremation products',
                'nominal' => 4005,
                'branch_id' => 3,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 13,
                'code' => 'CREMATION',
                'description' => 'Cremation products',
                'nominal' => 4005,
                'branch_id' => 5,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 14,
                'code' => 'FEES',
                'description' => 'Cemetery Fees',
                'nominal' => 4002,
                'branch_id' => 5,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 15,
                'code' => 'CARDS',
                'description' => 'Memorial Cards',
                'nominal' => 4004,
                'branch_id' => 5,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 16,
                'code' => 'RENO',
                'description' => 'Renovation,Inscriptions etc',
                'nominal' => 4000,
                'branch_id' => 5,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 17,
                'code' => 'SUNDRY',
                'description' => 'Hearts,Plaques,vases etc',
                'nominal' => 4000,
                'branch_id' => 5,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 18,
                'code' => 'CREMATION',
                'description' => 'Cremation products',
                'nominal' => 4005,
                'branch_id' => 4,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 19,
                'code' => 'DIS',
                'description' => 'Discounts',
                'nominal' => 4009,
                'branch_id' => 5,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 20,
                'code' => 'DIS',
                'description' => 'Discount Given',
                'nominal' => 4009,
                'branch_id' => 4,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 21,
                'code' => 'DIS',
                'description' => 'Discounts Given',
                'nominal' => 4009,
                'branch_id' => 3,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 22,
                'code' => 'ADDI',
                'description' => 'Additional Inscriptions',
                'nominal' => 4003,
                'branch_id' => 3,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 23,
                'code' => 'ADDI',
                'description' => 'Additional Inscriptions',
                'nominal' => 4003,
                'branch_id' => 6,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 24,
                'code' => 'CREMATION',
                'description' => 'Cremation products',
                'nominal' => 4005,
                'branch_id' => 6,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 25,
                'code' => 'DIS',
                'description' => 'Discounts Given',
                'nominal' => 4009,
                'branch_id' => 6,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 26,
                'code' => 'Fees',
                'description' => 'Fees',
                'nominal' => 4002,
                'branch_id' => 6,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 27,
                'code' => 'SUNDRY',
                'description' => 'Hearts, plaques, vases etc',
                'nominal' => 4000,
                'branch_id' => 6,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 28,
                'code' => 'Memorialcard',
                'description' => 'Memorialcards',
                'nominal' => 4004,
                'branch_id' => 6,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 29,
                'code' => 'NewMemorial',
                'description' => 'NewMemorial',
                'nominal' => 4000,
                'branch_id' => 6,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 30,
                'code' => 'RENOVATION',
                'description' => 'Renovation, inscriptions etc',
                'nominal' => 4003,
                'branch_id' => 6,
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ]



        ];

        Analysis::insert($data);
    }
}
