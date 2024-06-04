<?php

namespace Database\Seeders;

use App\Models\AccountType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $data   = [
            [
                "code"    => "PAY",
                "name"    => "Payment",
            ],
            [
                "code"    => "REF",
                "name"    => "Refund",
            ],
            [
                "code"    => "INV",
                "name"    => "Invoice",
            ],
            [
                "code"    => "CRED",
                "name"    => "Credits",
            ],
            [
                "code"    => "ADD",
                "name"    => "Additional",
            ],
        ];

        AccountType::insert($data);
    }
}
