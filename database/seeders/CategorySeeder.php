<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseCategories = [
            'food' => [
                [
                    'name' => 'Groceries',
                    'description' => 'Everyday food items',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Dining Out',
                    'description' => 'Restaurants and takeout',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Snacks',
                    'description' => 'Chips, candies, and other snacks',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Coffee & Tea',
                    'description' => 'Coffee shops and tea houses',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Breakfast',
                    'description' => 'Breakfast items and cafes',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Lunch',
                    'description' => 'Lunch items and cafes',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Dinner',
                    'description' => 'Dinner items and restaurants',
                    'is_system' => 1,
                ],
            ],
            'transportation' => [
                [
                    'name' => 'Public Transport',
                    'description' => 'Buses, trains, and subways',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Fuel',
                    'description' => 'Gasoline and diesel for vehicles',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Taxis & Rideshares',
                    'description' => 'Uber, Lyft, and other rideshare services',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Parking',
                    'description' => 'Parking fees and tickets',
                    'is_system' => 1,
                ],
            ],
            'investments' => [
                [
                    'name' => 'Stocks',
                    'description' => 'Investments in stocks and shares',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Cryptocurrency',
                    'description' => 'Investments in cryptocurrencies',
                    'is_system' => 1,
                ]
            ],
            'fashion' => [
                [
                    'name' => 'Clothing',
                    'description' => 'Apparel and clothing items',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Shoes',
                    'description' => 'Footwear and shoes',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Accessories',
                    'description' => 'Jewelry, watches, and accessories',
                    'is_system' => 1,
                ],
            ],
            'entertainment' => [
                [
                    'name' => 'Movies',
                    'description' => 'Cinema and movie tickets',
                    'is_system' => 1,
                ],
            ],
            'health' => [
                [
                    'name' => 'Medical',
                    'description' => 'Doctor visits and medical expenses',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Pharmacy',
                    'description' => 'Medicines and pharmacy items',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Fitness',
                    'description' => 'Gym memberships and fitness classes',
                    'is_system' => 1,
                ],
            ],
        ];

        $parentCategory = null;

        foreach ($baseCategories as $group => $categories) {
            $parentCategory = Category::firstOrCreate([
                'name' => $group,
                'description' => 'Parent category',
                'is_system' => 1,
            ]);

            foreach ($categories as $category) {
                Category::firstOrCreate([
                    'parent_id' => $parentCategory->id,
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'is_system' => $category['is_system'],
                ]);
            }
        }
    }
}
