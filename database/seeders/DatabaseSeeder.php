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


        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(PublisherSeeder::class);
        $this->call(BookSeeder::class);



        // Llama al seeder de productos
        //$this->call(ProductSeeder::class);

        // Agrega más llamadas a seeders según sea necesario
    }
}
