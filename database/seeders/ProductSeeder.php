<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Laptop Asus',
                'description' => 'Laptop Gaming',
                'price' => 12000000,
                'stock' => 10
            ],
            [
                'name' => 'Mouse Logitech',
                'description' => 'Mouse Wireless',
                'price' => 250000,
                'stock' => 30
            ]
        ]);
    }
}

