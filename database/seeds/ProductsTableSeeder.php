<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'ProductA',
                'price' => 10000,
                'quantity' => 10,
                'decription' => 'Product A Adalah Product A'
            ],
            [
                'name' => 'ProductB',
                'price' => 20000,
                'quantity' => 10,
                'decription' => 'Product B Adalah Product B'
            ],
            [
                'name' => 'ProductC',
                'price' => 25000,
                'quantity' => 10,
                'decription' => 'Product C Adalah Product C'
            ],
        ];

        foreach ($data as $key => $d) {
            DB::table('products')->insert([
                'name' => $d['name'],
                'price' => $d['price'],
                'quantity' => $d['quantity'],
                'description' => $d['decription'],
            ]);
        }
    }
}
