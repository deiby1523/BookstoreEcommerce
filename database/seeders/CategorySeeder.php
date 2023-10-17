<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Datos de ejemplo para categorías
        $categoriesData = [
            ['category_name' => 'Literatura','category_description' => 'Una de las categorias mas populares entre un publico joven','created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['category_name' => 'Comedia','category_description' => 'En esta categoria vas a encontrar libros de comedia entre otros','created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['category_name' => 'Informatica','category_description' => 'Esta categoria es para las personas apasionadas por la informatica','created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Agrega más categorías según sea necesario
        ];

        // Inserta los datos en la tabla de categorías
        Category::insert($categoriesData);
    }
}
