<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Datos de ejemplo para productos
        $productsData = [
            [
                'nombre' => 'Teléfono móvil',
                'descripcion' => 'Un teléfono móvil moderno',
                'precio' => 500,
                'categoria_id' => 1, // Asocia con la categoría de Electrónica
                'stock' => 100,
            ],
            [
                'nombre' => 'Camiseta',
                'descripcion' => 'Una camiseta de algodón',
                'precio' => 20,
                'categoria_id' => 2, // Asocia con la categoría de Ropa
                'stock' => 200,
            ],
            // Agrega más productos según sea necesario
        ];

        // Inserta los datos en la tabla de productos
        Product::insert($productsData);
    }
}
