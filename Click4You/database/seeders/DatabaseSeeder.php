<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Shipment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Categorie::truncate();
        Product::truncate();
        Shipment::truncate();

        $this->call([
            UserSeeder::class,
            CategorieSeeder::class,
            ProductSeeder::class,
            ShipmentSeeder::class,
        ]);
    }
}
