<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Llama al seeder de categorías
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);

        // Llama al seeder de productos
        //$this->call(ProductSeeder::class);

        // Agrega más llamadas a seeders según sea necesario
    }
}
