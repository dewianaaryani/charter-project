<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CreateInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventoryItems = [
            [
                'name' => 'Vitamin C Supplement',
                'category' => 'supplement',
                'stock' => 50,
                'price' => 5000,
                'min_stock' => 10,
                'supplier' => 'Health Supplies Inc.',
                'last_restocked' => now()->subDays(30),
                'status' => 'available',
            ],
            [
                'name' => 'Bottled Water',
                'category' => 'drink',
                'stock' => 100,
                'price' => 4000,
                'min_stock' => 20,
                'supplier' => 'Aqua Distributors',
                'last_restocked' => now()->subDays(10),
                'status' => 'available',
            ],
            [
                'name' => 'Protein Bar',
                'category' => 'food',
                'stock' => 5,
                'price' => 15000,
                'min_stock' => 10,
                'supplier' => 'Nutrition Co.',
                'last_restocked' => now()->subDays(50),
                'status' => 'low_stock',
            ],
            [
                'name' => 'Yoga Mat',
                'category' => 'equipment',
                'stock' => 0,
                'price' => 60000,
                'min_stock' => 5,
                'supplier' => 'Fitness Gear Ltd.',
                'last_restocked' => now()->subDays(60),
                'status' => 'out_of_stock',
            ],
        ];

        foreach ($inventoryItems as $item) {
            DB::table('inventories')->insert($item);
        }
    }
}
