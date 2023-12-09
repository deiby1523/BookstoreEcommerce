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
        Category::create([
            'id' => 1,
            'category_name' => 'Ficción',
            'category_description' => 'La categoría de ficción abarca una amplia gama de historias imaginativas. Desde mundos inventados de ciencia ficción y fantasía hasta relatos que exploran lo cotidiano a través de la novela contemporánea. La literatura en esta categoría despierta la imaginación y sumerge a los lectores en mundos ficticios o realidades alternativas.',
            'category_image_url' => 'img/categories/Ficción.jpg',
            'created_at' => '2023-11-04 02:39:18',
            'updated_at' => '2023-11-04 02:39:18'
        ]);


        Category::create([
            'id' => 2,
            'category_name' => 'No ficción',
            'category_description' => 'Libros basados en hechos reales y conocimientos. Desde biografías fascinantes hasta análisis históricos detallados, esta categoría ofrece una amplia gama de lecturas informativas. Incluye también obras de autoayuda, libros de viajes y otros temas que exploran la realidad desde diferentes perspectivas.',
            'category_image_url' => 'img/categories/No-ficción.jpg',
            'created_at' => '2023-11-04 02:39:47',
            'updated_at' => '2023-11-04 02:39:47'
        ]);


        Category::create([
            'id' => 3,
            'category_name' => 'Niños y jóvenes',
            'category_description' => 'Este segmento se enfoca en lectores jóvenes. Desde libros ilustrados para los más pequeños hasta novelas juveniles para adolescentes, esta categoría busca entretener, educar y fomentar la imaginación y el amor por la lectura desde edades tempranas.',
            'category_image_url' => 'img/categories/Niños-y-jóvenes.jpg',
            'created_at' => '2023-11-04 02:40:29',
            'updated_at' => '2023-11-04 02:40:29'
        ]);


        Category::create([
            'id' => 4,
            'category_name' => 'Ciencia y Tecnología',
            'category_description' => 'Esta categoría abarca libros que exploran y explican el mundo que nos rodea. Desde descubrimientos científicos hasta libros que analizan la informatica y lo digital, ofrece lecturas que buscan comprender mejor los fenómenos científicos y tecnológicos que impactan nuestra vida diaria.',
            'category_image_url' => 'img/categories/Ciencia-y-tecnologia.jpg',
            'created_at' => '2023-11-04 02:40:52',
            'updated_at' => '2023-11-04 02:40:52'
        ]);


        Category::create([
            'id' => 5,
            'category_name' => 'Arte y fotografía',
            'category_description' => 'Libros que celebran la expresión creativa y la estética visual. Desde libros que exploran la historia del arte y la arquitectura hasta obras que presentan la belleza a través de la fotografía, esta categoría invita a apreciar y comprender diversas manifestaciones artísticas.',
            'category_image_url' => 'img/categories/Arte-y-fotografía.jpg',
            'created_at' => '2023-11-04 02:41:17',
            'updated_at' => '2023-11-04 02:41:17'
        ]);


        Category::create([
            'id' => 6,
            'category_name' => 'Autoayuda y bienestar',
            'category_description' => 'Libros diseñados para el crecimiento personal y la mejora del bienestar emocional y físico. Desde consejos para el desarrollo personal hasta técnicas para alcanzar la paz mental, esta categoría se centra en el empoderamiento personal y la mejora de la calidad de vida.',
            'category_image_url' => 'img/categories/Autoayuda-y-bienestar.jpg',
            'created_at' => '2023-11-04 02:41:52',
            'updated_at' => '2023-11-04 02:41:52'
        ]);


        Category::create([
            'id' => 7,
            'category_name' => 'Negocios y economía',
            'category_description' => 'Esta categoría se enfoca en temas empresariales, desde libros sobre finanzas y estrategias de marketing hasta análisis económicos y liderazgo organizacional. Ofrece recursos para comprender mejor el mundo de los negocios y la economía.',
            'category_image_url' => 'img/categories/Negocios-y-economía.jpg',
            'created_at' => '2023-11-04 02:42:21',
            'updated_at' => '2023-11-04 02:42:21'
        ]);


        Category::create([
            'id' => 8,
            'category_name' => 'Religión y espiritualidad',
            'category_description' => 'Libros que exploran diferentes tradiciones religiosas, filosofías espirituales y reflexiones sobre el significado de la vida. Desde textos sagrados hasta obras de inspiración y reflexión, esta categoría invita a explorar la diversidad de creencias y prácticas espirituales.',
            'category_image_url' => 'img/categories/Religión-y-espiritualidad.jpg',
            'created_at' => '2023-11-04 02:42:44',
            'updated_at' => '2023-11-04 02:42:44'
        ]);
    }
}
