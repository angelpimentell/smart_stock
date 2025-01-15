<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MeasurementUnit;
use App\Models\Product;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
        ]);


        /* ------------------------ */

        $categories = [
            ['name' => 'Sports', 'description' => 'Sports equipment and accessories.'],
            ['name' => 'Beauty', 'description' => 'Beauty and personal care products.'],
            ['name' => 'Automotive', 'description' => 'Car and motorcycle accessories.'],
            ['name' => 'Groceries', 'description' => 'Everyday food and supplies.'],
            ['name' => 'Health', 'description' => 'Health and wellness products.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Electronics
        $products = [
            // Sports
            ["id" => 1, 'name' => 'Wilson Tennis Racket', 'description' => 'A high-quality racket for professional and casual players.', 'category_id' => Category::where('name', 'Sports')->first()->id],
            ["id" => 2, 'name' => 'Adidas Soccer Ball', 'description' => 'Durable soccer ball for all-weather play.', 'category_id' => Category::where('name', 'Sports')->first()->id],

            // Beauty
            ["id" => 3, 'name' => 'Maybelline Lipstick', 'description' => 'Long-lasting matte lipstick in vibrant colors.', 'category_id' => Category::where('name', 'Beauty')->first()->id],
            ["id" => 4, 'name' => 'L’Oreal Shampoo', 'description' => 'Nourishing shampoo for healthy, shiny hair.', 'category_id' => Category::where('name', 'Beauty')->first()->id],

            // Automotive
            ["id" => 5, 'name' => 'Michelin Car Tires', 'description' => 'Durable and reliable tires for all terrains.', 'category_id' => Category::where('name', 'Automotive')->first()->id],
            ["id" => 6, 'name' => 'Car Cover', 'description' => 'Protective cover for all-weather vehicle protection.', 'category_id' => Category::where('name', 'Automotive')->first()->id],

            // Groceries
            ["id" => 7, 'name' => 'Organic Apples', 'description' => 'Fresh, crisp organic apples.', 'category_id' => Category::where('name', 'Groceries')->first()->id],
            ["id" => 8, 'name' => 'Whole Grain Bread', 'description' => 'Healthy, freshly baked whole grain bread.', 'category_id' => Category::where('name', 'Groceries')->first()->id],

            // Health
            ["id" => 9, 'name' => 'Vitamin C Tablets', 'description' => 'Immune-boosting vitamin C supplements.', 'category_id' => Category::where('name', 'Health')->first()->id],
            ["id" => 10, 'name' => 'Yoga Mat', 'description' => 'Non-slip yoga mat for fitness and meditation.', 'category_id' => Category::where('name', 'Health')->first()->id],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        /* ------------------------ */

        $measurementUnits = [
            ['name' => 'Unidad'],
            ['name' => 'Caja'],
            ['name' => 'Paquete'],
        ];

        foreach ($measurementUnits as $measurementUnit) {
            MeasurementUnit::create($measurementUnit);
        }

    }


}
