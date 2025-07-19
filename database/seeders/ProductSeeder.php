<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            Product::create([
                'name' => fake()->word() . '' . fake()->colorName(),
                'description' => fake()->paragraph(),
                'price' => fake()->randomFloat(2, 10000, 100000),
                'stock' => fake()->numberBetween(0, 500),
            ]);
        }
    }
}
