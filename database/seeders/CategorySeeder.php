<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

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
                    'icon' => 'gmdi-local-grocery-store-r',
                    'description' => 'Everyday food items',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Dining Out',
                    'icon' => 'ionicon-restaurant-sharp',
                    'description' => 'Restaurants and takeout',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Snacks',
                    'icon' => 'mdi-french-fries',
                    'description' => 'Chips, candies, and other snacks',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Coffee & Tea',
                    'icon' => 'gmdi-coffee-r',
                    'description' => 'Coffee shops and tea houses',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Breakfast',
                    'icon' => 'fas-burger',
                    'description' => 'Breakfast items and cafes',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Lunch',
                    'icon' => 'maki-restaurant-noodle',
                    'description' => 'Lunch items and cafes',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Dinner',
                    'icon' => 'ionicon-restaurant-sharp',
                    'description' => 'Dinner items and restaurants',
                    'is_system' => 1,
                ],
            ],
            'transportation' => [
                [
                    'name' => 'Public Transport',
                    'icon' => 'fas-bus',
                    'description' => 'Buses, trains, and subways',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Fuel',
                    'icon' => 'fas-gas-pump',
                    'description' => 'Gasoline and diesel for vehicles',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Taxis & Rideshares',
                    'icon' => 'fas-taxi',
                    'description' => 'Uber, Lyft, and other rideshare services',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Parking',
                    'icon' => 'fas-parking',
                    'description' => 'Parking fees and tickets',
                    'is_system' => 1,
                ],
            ],
            'investments' => [
                [
                    'name' => 'Stocks',
                    'icon' => 'iconpark-stockmarket',
                    'description' => 'Investments in stocks and shares',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Cryptocurrency',
                    'icon' => 'fab-bitcoin',
                    'description' => 'Investments in cryptocurrencies',
                    'is_system' => 1,
                ]
            ],
            'fashion' => [
                [
                    'name' => 'Clothing',
                    'icon' => 'maki-clothing-store',
                    'description' => 'Apparel and clothing items',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Shoes',
                    'icon' => 'phosphor-sneaker-fill',
                    'description' => 'Footwear and shoes',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Accessories',
                    'icon' => 'bi-watch',
                    'description' => 'Jewelry, watches, and accessories',
                    'is_system' => 1,
                ],
            ],
            'entertainment' => [
                [
                    'name' => 'Movies',
                    'icon' => 'maki-cinema',
                    'description' => 'Cinema and movie tickets',
                    'is_system' => 1,
                ],
            ],
            'health' => [
                [
                    'name' => 'Medical',
                    'icon' => 'gmdi-medical-services-r',
                    'description' => 'Doctor visits and medical expenses',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Pharmacy',
                    'icon' => 'vaadin-pill',
                    'description' => 'Medicines and pharmacy items',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Fitness',
                    'icon' => 'gmdi-fitness-center-r',
                    'description' => 'Gym memberships and fitness classes',
                    'is_system' => 1,
                ],
            ],
            'utilities' => [
                [
                    'name' => 'Electricity',
                    'icon' => 'cri-elec',
                    'description' => 'Electricity bills and charges',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Water',
                    'icon' => 'ionicon-water-sharp',
                    'description' => 'Water bills and charges',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Internet',
                    'icon' => 'heroicon-s-wifi',
                    'description' => 'Internet service provider charges',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Top-up Prepaid Phone',
                    'icon' => 'ri-mobile-download-fill',
                    'description' => 'Prepaid phone top-ups',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Gas',
                    'icon' => 'mdi-gas-burner',
                    'description' => 'Gas bills and charges',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Laundry',
                    'icon' => 'mdi-washing-machine',
                    'description' => 'Laundry services and expenses',
                    'is_system' => 1,
                ],
            ],
            'housing' => [
                [
                    'name' => 'Rent',
                    'icon' => 'gameicon-house-keys',
                    'description' => 'Monthly rent payments',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Furniture',
                    'icon' => 'maki-furniture',
                    'description' => 'Furniture purchases and expenses',
                    'is_system' => 1,
                ],
            ],
            'pets' => [
                [
                    'name' => 'Pet Food',
                    'icon' => 'emoji-dog-face',
                    'description' => 'Food for pets',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Vet Visits',
                    'icon' => 'si-petsathome',
                    'description' => 'Veterinary services and expenses',
                    'is_system' => 1,
                ],
            ],
            'gifts & donations' => [
                [
                    'name' => 'Gifts',
                    'icon' => 'heroicon-s-gift',
                    'description' => 'Gifts for others',
                    'is_system' => 1,
                ],
                [
                    'name' => 'Donations',
                    'icon' => 'iconoir-donate',
                    'description' => 'Charitable donations',
                    'is_system' => 1,
                ],
            ],
            'expenses' => [
                'name' => 'Other Expenses',
                'icon' => 'fas-money-bill-trend-up',
                'description' => 'Miscellaneous expenses',
                'is_system' => 1,
            ],
        ];

        $parentCategory = null;

        foreach ($baseCategories as $group => $categories) {
            $parentCategory = Category::updateOrCreate([
                'name' => $group,
                'description' => 'Parent category',
                'is_system' => 1,
            ]);

            if (is_string(Arr::first($categories))) {
                return;
            }

            foreach ($categories as $category) {
                Category::updateOrCreate(
                    [
                        'name' => $category['name'],
                    ],
                    [
                        'parent_id' => $parentCategory->id,
                        'icon' => $category['icon'],
                        'description' => $category['description'],
                        'is_system' => $category['is_system'],
                    ]
                );
            }
        }
    }
}
