<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    public function run()
    {
        DB::table('transaction_details')->insert([
            [
                'transaction_id' => 1,
                'product_id' => 1,
                'qty' => 1,
                'price' => 12000000
            ],
            [
                'transaction_id' => 1,
                'product_id' => 2,
                'qty' => 2,
                'price' => 250000
            ]
        ]);
    }
}

