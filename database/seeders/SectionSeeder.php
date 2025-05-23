<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            'id' => 1,
            'section_name' => 'Recomendación Libro de Java',
            'section_main_title' => 'Lecturas que Compilan',
            'section_secondary_title' => 'Libros para programadores',
            'section_sub_title' => 'Porque aprender Java?',
            'section_secondary_sub_title' => 'El mundo de Java',
            'section_text_1' => 'Java es uno de los lenguajes de programación más sólidos y demandados del mundo. Su versatilidad le permite estar presente en una amplia gama de aplicaciones: desde el desarrollo web y aplicaciones móviles, hasta sistemas empresariales y soluciones en la nube. Si buscas estabilidad, demanda profesional y una comunidad activa, Java es una excelente elección para comenzar tu camino como desarrollador, tenemos un libro que es perfecto para empezar a aprender este lenguaje de programación',
            'section_text_2' => 'Si buscas estabilidad, demanda profesional y una comunidad activa, Java es una excelente elección para comenzar tu camino como desarrollador, tenemos un libro que es perfecto para empezar a aprender este lenguaje de programación',
            'section_color' => 1,
            'section_image_1_url' => 'img/sections/recomendacion-libro-de-java_1_1.jpg',
            'section_image_2_url' => null,
            'section_btn_link' => 'http://localhost:8000/book/view/1',
            'section_style' => 5,
            'active' => 1,
            'created_at' => Carbon::parse('2025-05-23 01:27:46'),
            'updated_at' => Carbon::parse('2025-05-23 01:30:32'),
        ]);
    }
}
