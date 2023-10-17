<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategoriesData = [
            ['category_id' => 1,'subcategory_name' => 'Ciencia Ficcion', 'subcategory_description' => 'Libros de ciencia ficcion','created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ];

        Subcategory::insert($subcategoriesData);
    }
}
