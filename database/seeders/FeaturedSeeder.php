<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeaturedType;
use App\Models\Featured;



class FeaturedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        FeaturedType::create([
            'id' => 1,
            'featured_type_name' => 'Los más vendidos',
            'featured_type_description' => 'Los libros favoritos de nuestros lectores, los que todos piden. ¡Descubre por qué son un éxito!',
            'active' => 1,
            'created_at' => '2025-07-08 02:39:18',
            'updated_at' => '2025-07-08 02:39:18'
        ]);


        // -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        FeaturedType::create([
            'id' => 2,
            'featured_type_name' => 'Historias de miedo para Halloween',
            'featured_type_description' => 'Libros de terror psicológico, clásicos como Drácula o Frankenstein, antologías de cuentos de horror',
            'active' => 0,
            'created_at' => '2025-07-08 02:40:18',
            'updated_at' => '2025-07-08 02:40:18'
        ]);
        // -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        FeaturedType::create([
            'id' => 3,
            'featured_type_name' => 'Libros para el regreso a clases',
            'featured_type_description' => '¡Todo lo que necesitan estudiantes, padres y maestros! Desde guías de estudio, literatura juvenil, hasta lecturas recomendadas para el nuevo ciclo.',
            'active' => 1,
            'created_at' => '2025-07-08 02:41:18',
            'updated_at' => '2025-07-08 02:41:18'
        ]);

        
        // -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        FeaturedType::create([
            'id' => 4,
            'featured_type_name' => 'Lecturas para Celebrar la Navidad',
            'featured_type_description' => 'Descubre historias que capturan el espíritu de la Navidad: Desde cuentos navideños, villancicos ilustrados, Novenas tradicionales para reflexionar y más... ¡Perfectos leer junto al árbol!',
            'active' => 0,
            'created_at' => '2025-07-08 02:42:18',
            'updated_at' => '2025-07-08 02:42:18'
        ]);

        Featured::create([
            'id' => 1,
            'book_id' => 43,
            'type_id' => 4,
            'created_at' => '2025-07-08 02:43:18',
            'updated_at' => '2025-07-08 02:43:18'
        ]);
        
        Featured::create([
            'id' => 2,
            'book_id' => 59,
            'type_id' => 4,
            'created_at' => '2025-07-08 02:44:18',
            'updated_at' => '2025-07-08 02:44:18'
        ]);
        
        Featured::create([
            'id' => 3,
            'book_id' => 42,
            'type_id' => 4,
            'created_at' => '2025-07-08 02:45:18',
            'updated_at' => '2025-07-08 02:45:18'
        ]);
        
        Featured::create([
            'id' => 4,
            'book_id' => 41,
            'type_id' => 4,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 5,
            'book_id' => 41,
            'type_id' => 4,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 6,
            'book_id' => 41,
            'type_id' => 4,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);




        Featured::create([
            'id' => 7,
            'book_id' => 47,
            'type_id' => 3,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 8,
            'book_id' => 44,
            'type_id' => 3,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 9,
            'book_id' => 31,
            'type_id' => 3,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 10,
            'book_id' => 22,
            'type_id' => 3,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 11,
            'book_id' => 21,
            'type_id' => 3,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 12,
            'book_id' => 7,
            'type_id' => 3,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 13,
            'book_id' => 35,
            'type_id' => 3,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 14,
            'book_id' => 12,
            'type_id' => 2,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 15,
            'book_id' => 13,
            'type_id' => 2,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 16,
            'book_id' => 15,
            'type_id' => 2,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 17,
            'book_id' => 16,
            'type_id' => 2,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 18,
            'book_id' => 18,
            'type_id' => 2,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        Featured::create([
            'id' => 19,
            'book_id' => 20,
            'type_id' => 2,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        
        Featured::create([
            'id' => 20,
            'book_id' => 40,
            'type_id' => 2,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);

        Featured::create([
            'id' => 21,
            'book_id' => 2,
            'type_id' => 1,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);

        Featured::create([
            'id' => 22,
            'book_id' => 3,
            'type_id' => 1,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);

        Featured::create([
            'id' => 23,
            'book_id' => 4,
            'type_id' => 1,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);

        Featured::create([
            'id' => 24,
            'book_id' => 5,
            'type_id' => 1,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);

        Featured::create([
            'id' => 25,
            'book_id' => 6,
            'type_id' => 1,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);

        Featured::create([
            'id' => 26,
            'book_id' => 7,
            'type_id' => 1,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);

        Featured::create([
            'id' => 27,
            'book_id' => 8,
            'type_id' => 1,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);

        Featured::create([
            'id' => 28,
            'book_id' => 9,
            'type_id' => 1,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);

        Featured::create([
            'id' => 29,
            'book_id' => 10,
            'type_id' => 1,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);
        
        Featured::create([
            'id' => 30,
            'book_id' => 11,
            'type_id' => 1,
            'created_at' => '2025-07-08 02:46:18',
            'updated_at' => '2025-07-08 02:46:18'
        ]);




    }
}
