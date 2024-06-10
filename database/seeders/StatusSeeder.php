<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data   = [
            [
                "name"    => "Open Order",
            ],
            [
                "name"    => "Invoiced - No Editing",
            ],
            [
                "name"    => "Order Cancelled",
            ],
            [
                "name"    => "Complete Order",
            ],
        ];

        Status::insert($data);
    }
}
