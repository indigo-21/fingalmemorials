<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data   = [
            [
                "code"    => "ADVERT",
                "name"    => "Advertising",
            ],
            [
                "code"    => "GP",
                "name"    => "Goldern Pages",
            ],
            [
                "code"    => "INTERNET",
                "name"    => "Internet Enquiries",
            ],
            [
                "code"    => "PT",
                "name"    => "Passing Trade",
            ],
            [
                "code"    => "RETURNING",
                "name"    => "Returning Customer",
            ],
            [
                "code"    => "BAL",
                "name"    => "Balgriffin Headstone",
            ],
        ];

        Source::insert($data);
    }
}
