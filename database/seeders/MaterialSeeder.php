<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        $materials = [
            ['name' => 'PLA Basic White', 'type' => 'PLA', 'color' => 'White', 'price_per_gram' => 0.05, 'stock_grams' => 1000],
            ['name' => 'PLA Neon Green', 'type' => 'PLA', 'color' => 'Neon Green', 'price_per_gram' => 0.06, 'stock_grams' => 750],
            ['name' => 'PETG Stealth Black', 'type' => 'PETG', 'color' => 'Black', 'price_per_gram' => 0.07, 'stock_grams' => 2000],
            ['name' => 'PETG Translucent Blue', 'type' => 'PETG', 'color' => 'Blue', 'price_per_gram' => 0.07, 'stock_grams' => 1000],
            ['name' => 'ABS Industrial Grey', 'type' => 'ABS', 'color' => 'Grey', 'price_per_gram' => 0.08, 'stock_grams' => 1500],
            ['name' => 'TPU Flexible Red', 'type' => 'TPU', 'color' => 'Red', 'price_per_gram' => 0.12, 'stock_grams' => 500],
            ['name' => 'Wood Fill', 'type' => 'Special', 'color' => 'Brown', 'price_per_gram' => 0.15, 'stock_grams' => 800],
            ['name' => 'Silk Gold', 'type' => 'PLA', 'color' => 'Gold', 'price_per_gram' => 0.10, 'stock_grams' => 1000],
            ['name' => 'Carbon Fiber PETG', 'type' => 'PETG', 'color' => 'Dark Grey', 'price_per_gram' => 0.18, 'stock_grams' => 500],
            ['name' => 'ASA UV Resistant', 'type' => 'ASA', 'color' => 'White', 'price_per_gram' => 0.10, 'stock_grams' => 1000],
        ];

        foreach ($materials as $material) {
            Material::create($material);
        }
    }
}
