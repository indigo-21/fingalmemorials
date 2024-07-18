<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'code' => 'B0',
                'name' => 'N/A',
                'address1' => '',
                'address2' => '',
                'address3' => '',
                'postcode' => '',
                'town' => '',
                'county' => '',
                'phone' => '',
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 2,
                'code' => 'DEFA',
                'name' => 'Default',
                'address1' => '',
                'address2' => '',
                'address3' => '',
                'postcode' => '',
                'town' => '',
                'county' => '',
                'phone' => '',
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 3,
                'code' => 'FING',
                'name' => 'Fingal Memorials',
                'address1' => 'Malahide Road',
                'address2' => 'Baligriffin',
                'address3' => '',
                'postcode' => 'DUBLIN 17',
                'town' => '',
                'county' => '',
                'phone' => '8484843',
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 4,
                'code' => 'TALL',
                'name' => 'Tallaght Stone Centre',
                'address1' => 'Belgard Road',
                'address2' => 'Tallaght',
                'address3' => '',
                'postcode' => 'DUBLIN 24',
                'town' => '',
                'county' => '',
                'phone' => '(01) 462 6200',
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 5,
                'code' => 'DAR',
                'name' => 'Fingal Mounuments Ltd',
                'address1' => 'Dardistown',
                'address2' => 'Collinstown Cross',
                'address3' => '',
                'postcode' => 'Co. Dublin',
                'town' => '',
                'county' => '',
                'phone' => '01 8427472',
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
            [
                'id' => 6,
                'code' => 'BAL',
                'name' => 'Balgriffin',
                'address1' => 'Carrs Lane',
                'address2' => 'Balgriffin',
                'address3' => 'Dublin 17.',
                'postcode' => '',
                'town' => '',
                'county' => '',
                'phone' => '',
                'created_at' => '2024-05-21 16:00:00',
                'updated_at' => '2024-05-21 16:00:00',
                'deleted_at' => NULL
            ],
        ];

        Branch::insert($data);
    }
}
