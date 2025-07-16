<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_name' => 'Vela pequeña 1',
            'subcategory_id' => 49,
            'product_description' => 'Descripcion del producto',
            'product_price' => 10000,
            'product_stock' => 1,
            'product_discount' => 15,
            'created_at' => '2023-07-15 00:00:00',
            'updated_at' => '2023-07-15 00:00:00',
        ]);

        Product::create([
            'product_name' => 'Vela grande 2',
            'subcategory_id' => 50,
            'product_description' => 'Descripcion del producto',
            'product_price' => 100000,
            'product_stock' => 1,
            'product_discount' => 10,
            'created_at' => '2023-07-15 00:01:00',
            'updated_at' => '2023-07-15 00:01:00',
        ]);

        Product::create([
            'product_name' => 'Virgen guadalupe',
            'subcategory_id' => 51,
            'product_description' => 'Descripcion del producto',
            'product_price' => 25000,
            'product_stock' => 1,
            'product_discount' => 0,
            'created_at' => '2023-07-15 00:02:00',
            'updated_at' => '2023-07-15 00:02:00',
        ]);

        Product::create([
            'product_name' => 'Cristo crucificado Madera',
            'subcategory_id' => 52,
            'product_description' => 'Descripcion del producto',
            'product_price' => 50000,
            'product_stock' => 1,
            'product_discount' => 0,
            'created_at' => '2023-07-15 00:03:00',
            'updated_at' => '2023-07-15 00:03:00',
        ]);
    }
}
