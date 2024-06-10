<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StatusSeeder::class);
        $this->call(TitleSeeder::class);
        $this->call(SourceSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(OrderTypeSeeder::class);
        $this->call(VatCodeSeeder::class);
        $this->call(AccountTypeSeeder::class);
        $this->call(PaymentTypeSeeder::class);
        $this->call(AccessLevelSeeder::class);
        $this->call(GraveSpaceSeeder::class);
        $this->call(DocumentTypeSeeder::class);
        $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
