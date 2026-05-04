<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,  // harus pertama (FoodSeeder butuh admin)
            TagSeeder::class,    // harus sebelum FoodSeeder
            FoodSeeder::class,
        ]);
    }
}