<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "firstname"         => "Indigo21",
                "lastname"          => "Administrator",
                "username"          => "admin",
                "email"             => "suppor@indigo21.com",
                "access_level_id"   => "1",
                "password"          => Hash::make('indigo21'),
            ]
        ];

        User::insert($data);
    }
}
