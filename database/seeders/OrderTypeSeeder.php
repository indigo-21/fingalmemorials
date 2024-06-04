<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "New Memorial",
                "active" => "0",
            ],
            [
                "name" => "Renovation",
                "active" => "0",
            ],
            [
                "name" => "Sundries",
                "active" => "0",
            ],
            [
                "name" => "Cremation Products",
                "active" => "0",
            ],
            [
                "name" => "Monumental",
                "active" => "1",
            ],
            [
                "name" => "Other",
                "active" => "0",
            ],
        ];

        OrderType::insert($data);
        
    }
}
