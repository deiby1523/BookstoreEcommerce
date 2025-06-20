<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create( [
            'book_isbn'=>'9789587783377',
            'book_title'=>'Programación Orientada a Objetos y Estructura de Datos a Fondo',
            'author_id'=>1,
            'publisher_id'=>1,
            'subcategory_id'=>24,
            'book_number_pages'=>336,
            'book_publication_date'=>'2017-08-10',
            'book_description'=>'Programación orientada a objetos y estructura de datos a fondo es un libro pensado para extender los conocimientos que fueron adquiridos a lo largo de los cursos de las asignaturas iniciales de programación; principalmente de Programación estructurada. La finalidad de iniciar explicando Programación Orientada a Objetos (POO) es proveer una herramienta que permita encapsular la lógica y la complejidad de aquellos algoritmos; ocultándola para no verla. Y así concentrarse en el análisis, diseño y desarrollo de algoritmos con mayor grado de complejidad. Para quienes adquirieron sus conocimientos básicos programando en C, la obra comienza explicando los conceptos principales de encapsulamiento implementándolos con C++. Pero esto es solo el comienzo, ya que el curso de programación avanzada que se propone transita por los senderos del lenguaje Java. ¿Por qué Java? Porque hoy en día, y desde hace más de 20 años, Java es el lenguaje de programación con mayor nivel de aceptación en el ámbito profesional. La mayoría de las empresas desarrollan sus aplicaciones en Java. Y, aunque aquí el foco principal estará puesto sobre la lógica algorítmica, cuando implemente estos algoritmos con Java, el lector estará adquiriendo una destreza que le permitirá incorporarse a trabajar en proyectos de desarrollo que utilicen este lenguaje.',
            'book_image_url'=>'img/books/9789587783377.jpg',
            'book_price' => 55000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );

        Book::create( [
            'book_isbn'=>'9789587783378', // Numero de 13 digitos
            'book_title'=>'The Cooper Violin', // Nombre al azar
            'author_id'=>4, // del 1 al 38 al azar
            'publisher_id'=>13, // del 1 al 33 al azar
            'subcategory_id'=>1,
            'book_number_pages'=>201, // del 1 al 300 al azar
            'book_publication_date'=>'2020-07-15', // fechas pasadas al azar
            'book_description'=>'Resumen del libro', // Deja simplemente 'Resumen del libro'
            'book_price' => 95000, // Numero entre 10000 y 200000
            'book_stock' => 1, // Dejalo en 1
            'book_discount' => 0,// al azar entre 0 y 40, solo decenas 0,10,20,30...
            'created_at'=>'2023-11-06 00:00:29', // fecha al azar
            'updated_at'=>'2023-11-06 01:07:15' // fecha al azar
        ] );

        Book::create( [
            'book_isbn'=>'9789587783379',
            'book_title'=>'El Codigo Da Vinci',
            'author_id'=>3,
            'publisher_id'=>3,
            'subcategory_id'=>7,
            'book_number_pages'=>125,
            'book_publication_date'=>'2014-02-13',
            'book_description'=>'Resumen del libro',
            'book_image_url'=>'img/books/9789587783379.jpg',
            'book_price' => 120000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );

        Book::create( [
            'book_isbn'=>'9789587783370',
            'book_title'=>'Todo Vuelve',
            'author_id'=>4,
            'publisher_id'=>4,
            'subcategory_id'=>33,
            'book_number_pages'=>643,
            'book_publication_date'=>'2017-08-10',
            'book_description'=>'Resumen de libro',
            'book_image_url'=>'img/books/9789587783370.jpg',
            'book_price' => 34000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );

        Book::create( [
            'book_isbn'=>'9789587783371',
            'book_title'=>'A Teaspoon of Eart and Sea',
            'author_id'=>5,
            'publisher_id'=>5,
            'subcategory_id'=>20,
            'book_number_pages'=>90,
            'book_publication_date'=>'2017-08-10',
            'book_description'=>'Resumen del libro',
            'book_image_url'=>'img/books/9789587783371.jpg',
            'book_price' => 56000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );

        Book::create( [
            'book_isbn'=>'9789587783372',
            'book_title'=>'La Historia de Rondha',
            'author_id'=>6,
            'publisher_id'=>6,
            'subcategory_id'=>19,
            'book_number_pages'=>342,
            'book_publication_date'=>'2015-07-10',
            'book_description'=>'Resumen de libro',
            'book_image_url'=>'img/books/9789587783372.jpg',
            'book_price' => 78000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );

        Book::create( [
            'book_isbn'=>'9789587783373',
            'book_title'=>'El primer picnic de jane',
            'author_id'=>7,
            'publisher_id'=>7,
            'subcategory_id'=>18,
            'book_number_pages'=>456,
            'book_publication_date'=>'2016-10-10',
            'book_description'=>'Resumen de libro',
            'book_image_url'=>'img/books/9789587783373.jpg',
            'book_price' => 500000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );

        Book::create([
            'book_isbn' => '9788498387462',
            'book_title' => 'Echoes of Eternity',
            'author_id' => 17,
            'publisher_id' => 7,
            'subcategory_id' => 3,
            'book_number_pages' => 287,
            'book_publication_date' => '2018-03-22',
            'book_description' => 'Resumen del libro',
            'book_price' => 120000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-11-07 10:15:42',
            'updated_at' => '2023-11-07 12:23:55',
        ]);

        Book::create([
            'book_isbn' => '9780143127741',
            'book_title' => 'Shadows of the Past',
            'author_id' => 9,
            'publisher_id' => 21,
            'subcategory_id' => 4,
            'book_number_pages' => 164,
            'book_publication_date' => '2015-11-10',
            'book_description' => 'Resumen del libro',
            'book_price' => 85000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-11-08 08:45:30',
            'updated_at' => '2023-11-08 09:50:12',
        ]);

        Book::create([
            'book_isbn' => '9780307279460',
            'book_title' => 'Dreams of Tomorrow',
            'author_id' => 23,
            'publisher_id' => 5,
            'subcategory_id' => 24,
            'book_number_pages' => 312,
            'book_publication_date' => '2012-05-19',
            'book_description' => 'Resumen del libro',
            'book_price' => 175000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at' => '2023-11-09 14:22:11',
            'updated_at' => '2023-11-09 15:30:00',
        ]);

        Book::create([
            'book_isbn' => '9780670020553',
            'book_title' => 'The Hidden Path',
            'author_id' => 31,
            'publisher_id' => 29,
            'subcategory_id' => 31,
            'book_number_pages' => 242,
            'book_publication_date' => '2019-09-05',
            'book_description' => 'Resumen del libro',
            'book_price' => 105000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at' => '2023-11-10 07:05:27',
            'updated_at' => '2023-11-10 08:16:33',
        ]);

        Book::create([
            'book_isbn' => '9780307588371',
            'book_title' => 'Beyond the Horizon',
            'author_id' => 14,
            'publisher_id' => 2,
            'subcategory_id' => 19,
            'book_number_pages' => 178,
            'book_publication_date' => '2016-01-14',
            'book_description' => 'Resumen del libro',
            'book_price' => 99000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-11-11 11:11:11',
            'updated_at' => '2023-11-11 12:12:12',
        ]);

        Book::create([
            'book_isbn' => '9780525569980',
            'book_title' => 'Whispers in the Wind',
            'author_id' => 27,
            'publisher_id' => 16,
            'subcategory_id' => 26,
            'book_number_pages' => 133,
            'book_publication_date' => '2014-06-30',
            'book_description' => 'Resumen del libro',
            'book_price' => 68000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-11-12 16:40:00',
            'updated_at' => '2023-11-12 17:45:21',
        ]);

        Book::create([
            'book_isbn' => '9780553418026',
            'book_title' => 'Canvas of Dreams',
            'author_id' => 36,
            'publisher_id' => 10,
            'subcategory_id' => 25,
            'book_number_pages' => 290,
            'book_publication_date' => '2017-12-01',
            'book_description' => 'Resumen del libro',
            'book_price' => 142000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at' => '2023-11-13 09:00:00',
            'updated_at' => '2023-11-13 10:15:45',
        ]);

        Book::create([
            'book_isbn' => '9780307760235',
            'book_title' => 'The Last Melody',
            'author_id' => 8,
            'publisher_id' => 33,
            'subcategory_id' => 29,
            'book_number_pages' => 157,
            'book_publication_date' => '2013-04-21',
            'book_description' => 'Resumen del libro',
            'book_price' => 78000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at' => '2023-11-14 18:20:00',
            'updated_at' => '2023-11-14 19:25:30',
        ]);

        Book::create([
            'book_isbn' => '9780140449136',
            'book_title' => 'Winds of Change',
            'author_id' => 2,
            'publisher_id' => 9,
            'subcategory_id' => 2,
            'book_number_pages' => 220,
            'book_publication_date' => '2011-08-10',
            'book_description' => 'Resumen del libro',
            'book_price' => 88000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-11-15 10:10:10',
            'updated_at' => '2023-11-15 11:11:11',
        ]);

        Book::create([
            'book_isbn' => '9780307269751',
            'book_title' => 'Echoes of Silence',
            'author_id' => 12,
            'publisher_id' => 4,
            'subcategory_id' => 5,
            'book_number_pages' => 145,
            'book_publication_date' => '2014-02-14',
            'book_description' => 'Resumen del libro',
            'book_price' => 102000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at' => '2023-11-16 12:00:00',
            'updated_at' => '2023-11-16 13:05:05',
        ]);

        Book::create([
            'book_isbn' => '9780679783268',
            'book_title' => 'Paths Uncharted',
            'author_id' => 19,
            'publisher_id' => 18,
            'subcategory_id' => 6,
            'book_number_pages' => 199,
            'book_publication_date' => '2010-11-11',
            'book_description' => 'Resumen del libro',
            'book_price' => 113000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-11-17 14:14:14',
            'updated_at' => '2023-11-17 15:15:15',
        ]);

        Book::create([
            'book_isbn' => '9780143127796',
            'book_title' => 'Voyage to the Unknown',
            'author_id' => 28,
            'publisher_id' => 22,
            'subcategory_id' => 10,
            'book_number_pages' => 275,
            'book_publication_date' => '2013-07-07',
            'book_description' => 'Resumen del libro',
            'book_price' => 134000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at' => '2023-11-18 16:16:16',
            'updated_at' => '2023-11-18 17:17:17',
        ]);

        Book::create([
            'book_isbn' => '9780307474278',
            'book_title' => 'Whispers of the Past',
            'author_id' => 33,
            'publisher_id' => 3,
            'subcategory_id' => 12,
            'book_number_pages' => 158,
            'book_publication_date' => '2012-09-09',
            'book_description' => 'Resumen del libro',
            'book_price' => 72000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-11-19 18:18:18',
            'updated_at' => '2023-11-19 19:19:19',
        ]);

        Book::create([
            'book_isbn' => '9780679732761',
            'book_title' => 'Dreams of Destiny',
            'author_id' => 7,
            'publisher_id' => 11,
            'subcategory_id' => 16,
            'book_number_pages' => 230,
            'book_publication_date' => '2015-03-03',
            'book_description' => 'Resumen del libro',
            'book_price' => 99000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-11-20 20:20:20',
            'updated_at' => '2023-11-20 21:21:21',
        ]);

        Book::create([
            'book_isbn' => '9780140449181',
            'book_title' => 'Voices of the Wind',
            'author_id' => 16,
            'publisher_id' => 14,
            'subcategory_id' => 18,
            'book_number_pages' => 260,
            'book_publication_date' => '2011-05-05',
            'book_description' => 'Resumen del libro',
            'book_price' => 148000,
            'book_stock' => 1,
            'book_discount' => 40,
            'created_at' => '2023-11-21 22:22:22',
            'updated_at' => '2023-11-21 23:23:23',
        ]);

        Book::create([
            'book_isbn' => '9780307271033',
            'book_title' => 'Reflections of Time',
            'author_id' => 5,
            'publisher_id' => 20,
            'subcategory_id' => 20,
            'book_number_pages' => 187,
            'book_publication_date' => '2010-10-10',
            'book_description' => 'Resumen del libro',
            'book_price' => 84000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at' => '2023-11-22 01:01:01',
            'updated_at' => '2023-11-22 02:02:02',
        ]);

        Book::create([
            'book_isbn' => '9780679417392',
            'book_title' => 'Songs of Solitude',
            'author_id' => 21,
            'publisher_id' => 8,
            'subcategory_id' => 23,
            'book_number_pages' => 145,
            'book_publication_date' => '2012-12-12',
            'book_description' => 'Resumen del libro',
            'book_price' => 91000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-11-23 03:03:03',
            'updated_at' => '2023-11-23 04:04:04',
        ]);

        Book::create([
            'book_isbn' => '9780307949486',
            'book_title' => 'Lights of Eternity',
            'author_id' => 29,
            'publisher_id' => 25,
            'subcategory_id' => 24,
            'book_number_pages' => 275,
            'book_publication_date' => '2013-06-06',
            'book_description' => 'Resumen del libro',
            'book_price' => 136000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at' => '2023-11-24 05:05:05',
            'updated_at' => '2023-11-24 06:06:06',
        ]);

        Book::create([
            'book_isbn' => '9780140449273',
            'book_title' => 'Shadows of Tomorrow',
            'author_id' => 13,
            'publisher_id' => 28,
            'subcategory_id' => 26,
            'book_number_pages' => 160,
            'book_publication_date' => '2014-04-04',
            'book_description' => 'Resumen del libro',
            'book_price' => 76000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-11-25 07:07:07',
            'updated_at' => '2023-11-25 08:08:08',
        ]);

        Book::create([
            'book_isbn' => '9780307055438',
            'book_title' => 'Journey Through Shadows',
            'author_id' => 11,
            'publisher_id' => 12,
            'subcategory_id' => 7,
            'book_number_pages' => 210,
            'book_publication_date' => '2017-02-10',
            'book_description' => 'Resumen del libro',
            'book_price' => 88000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-11-26 09:10:10',
            'updated_at' => '2023-11-26 10:11:11',
        ]);

        Book::create([
            'book_isbn' => '9780140449277',
            'book_title' => 'Echoes in the Mist',
            'author_id' => 6,
            'publisher_id' => 30,
            'subcategory_id' => 8,
            'book_number_pages' => 175,
            'book_publication_date' => '2016-04-18',
            'book_description' => 'Resumen del libro',
            'book_price' => 102000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-11-27 11:12:13',
            'updated_at' => '2023-11-27 12:13:14',
        ]);

        Book::create([
            'book_isbn' => '9780307949484',
            'book_title' => 'The Silent Voyage',
            'author_id' => 18,
            'publisher_id' => 5,
            'subcategory_id' => 9,
            'book_number_pages' => 242,
            'book_publication_date' => '2014-09-25',
            'book_description' => 'Resumen del libro',
            'book_price' => 110000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at' => '2023-11-28 13:14:15',
            'updated_at' => '2023-11-28 14:15:16',
        ]);

        Book::create([
            'book_isbn' => '9780679732765',
            'book_title' => 'Winds of the Forgotten',
            'author_id' => 25,
            'publisher_id' => 17,
            'subcategory_id' => 11,
            'book_number_pages' => 198,
            'book_publication_date' => '2013-12-12',
            'book_description' => 'Resumen del libro',
            'book_price' => 97000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at' => '2023-11-29 15:16:17',
            'updated_at' => '2023-11-29 16:17:18',
        ]);

        Book::create([
            'book_isbn' => '9780143127727',
            'book_title' => 'Labyrinth of Dreams',
            'author_id' => 3,
            'publisher_id' => 8,
            'subcategory_id' => 15,
            'book_number_pages' => 303,
            'book_publication_date' => '2011-11-01',
            'book_description' => 'Resumen del libro',
            'book_price' => 125000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-11-30 17:18:19',
            'updated_at' => '2023-11-30 18:19:20',
        ]);

        Book::create([
            'book_isbn' => '9780307271035',
            'book_title' => 'Secrets of the Atlas',
            'author_id' => 29,
            'publisher_id' => 27,
            'subcategory_id' => 22,
            'book_number_pages' => 189,
            'book_publication_date' => '2012-07-07',
            'book_description' => 'Resumen del libro',
            'book_price' => 79000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at' => '2023-12-01 19:20:21',
            'updated_at' => '2023-12-01 20:21:22',
        ]);

        Book::create([
            'book_isbn' => '9780553418030',
            'book_title' => 'Beyond the Veil',
            'author_id' => 20,
            'publisher_id' => 31,
            'subcategory_id' => 23,
            'book_number_pages' => 223,
            'book_publication_date' => '2010-02-20',
            'book_description' => 'Resumen del libro',
            'book_price' => 93000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-12-02 21:22:23',
            'updated_at' => '2023-12-02 22:23:24',
        ]);

        Book::create([
            'book_isbn' => '9780307588373',
            'book_title' => 'Mirrors of the Soul',
            'author_id' => 1,
            'publisher_id' => 6,
            'subcategory_id' => 31,
            'book_number_pages' => 158,
            'book_publication_date' => '2015-05-15',
            'book_description' => 'Resumen del libro',
            'book_price' => 86000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-12-03 23:24:25',
            'updated_at' => '2023-12-04 00:25:26',
        ]);

        Book::create([
            'book_isbn' => '9780525569982',
            'book_title' => 'Echoes of Time',
            'author_id' => 14,
            'publisher_id' => 9,
            'subcategory_id' => 33,
            'book_number_pages' => 274,
            'book_publication_date' => '2014-08-08',
            'book_description' => 'Resumen del libro',
            'book_price' => 118000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at' => '2023-12-04 01:26:27',
            'updated_at' => '2023-12-04 02:27:28',
        ]);

        Book::create([
            'book_isbn' => '9780670020555',
            'book_title' => 'Paths of Light',
            'author_id' => 24,
            'publisher_id' => 17,
            'subcategory_id' => 35,
            'book_number_pages' => 204,
            'book_publication_date' => '2013-03-03',
            'book_description' => 'Resumen del libro',
            'book_price' => 98000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at' => '2023-12-05 03:28:29',
            'updated_at' => '2023-12-05 04:29:30',
        ]);

        Book::create([
            'book_isbn' => '9780307949488',
            'book_title' => 'Wonders of the Mind',
            'author_id' => 32,
            'publisher_id' => 4,
            'subcategory_id' => 32,
            'book_number_pages' => 265,
            'book_publication_date' => '2012-12-12',
            'book_description' => 'Resumen del libro',
            'book_price' => 112000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-12-06 05:30:31',
            'updated_at' => '2023-12-06 06:31:32',
        ]);

        Book::create([
            'book_isbn' => '9780140449185',
            'book_title' => 'Realms of Reflection',
            'author_id' => 27,
            'publisher_id' => 2,
            'subcategory_id' => 36,
            'book_number_pages' => 182,
            'book_publication_date' => '2011-06-06',
            'book_description' => 'Resumen del libro',
            'book_price' => 94000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-12-07 07:32:33',
            'updated_at' => '2023-12-07 08:33:34',
        ]);

        Book::create([
            'book_isbn' => '9780307279462',
            'book_title' => 'Echoes of the Beyond',
            'author_id' => 19,
            'publisher_id' => 15,
            'subcategory_id' => 38,
            'book_number_pages' => 240,
            'book_publication_date' => '2010-10-10',
            'book_description' => 'Resumen del libro',
            'book_price' => 99000,
            'book_stock' => 1,
            'book_discount' => 40,
            'created_at' => '2023-12-08 09:34:35',
            'updated_at' => '2023-12-08 10:35:36',
        ]);

        Book::create([
            'book_isbn' => '9780140449279',
            'book_title' => 'Mirrors of Fate',
            'author_id' => 5,
            'publisher_id' => 28,
            'subcategory_id' => 41,
            'book_number_pages' => 196,
            'book_publication_date' => '2013-01-01',
            'book_description' => 'Resumen del libro',
            'book_price' => 85000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-12-09 11:36:37',
            'updated_at' => '2023-12-09 12:37:38',
        ]);

        Book::create([
            'book_isbn' => '9780307588380',
            'book_title' => 'Whispers of Time',
            'author_id' => 38,
            'publisher_id' => 6,
            'subcategory_id' => 44,
            'book_number_pages' => 210,
            'book_publication_date' => '2012-02-02',
            'book_description' => 'Resumen del libro',
            'book_price' => 92000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at' => '2023-12-10 13:38:39',
            'updated_at' => '2023-12-10 14:39:40',
        ]);

        Book::create([
            'book_isbn' => '9780679732770',
            'book_title' => 'Songs of Tomorrow',
            'author_id' => 17,
            'publisher_id' => 23,
            'subcategory_id' => 47,
            'book_number_pages' => 170,
            'book_publication_date' => '2015-05-05',
            'book_description' => 'Resumen del libro',
            'book_price' => 89000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-12-11 15:40:41',
            'updated_at' => '2023-12-11 16:41:42',
        ]);

        Book::create([
            'book_isbn' => '9780143127800',
            'book_title' => 'Dreams of the Ancients',
            'author_id' => 9,
            'publisher_id' => 32,
            'subcategory_id' => 48,
            'book_number_pages' => 237,
            'book_publication_date' => '2014-03-03',
            'book_description' => 'Resumen del libro',
            'book_price' => 106000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at' => '2023-12-12 17:42:43',
            'updated_at' => '2023-12-12 18:43:44',
        ]);

        Book::create([
            'book_isbn' => '9780307269997',
            'book_title' => 'Waves of Infinity',
            'author_id' => 15,
            'publisher_id' => 19,
            'subcategory_id' => 17,
            'book_number_pages' => 189,
            'book_publication_date' => '2018-10-10',
            'book_description' => 'Resumen del libro',
            'book_price' => 102000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-12-13 09:44:45',
            'updated_at' => '2023-12-13 10:45:46',
        ]);
        Book::create([
            'book_isbn' => '9780140449202',
            'book_title' => 'Echoes Beyond',
            'author_id' => 26,
            'publisher_id' => 24,
            'subcategory_id' => 21,
            'book_number_pages' => 276,
            'book_publication_date' => '2012-08-08',
            'book_description' => 'Resumen del libro',
            'book_price' => 118000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-12-14 11:46:47',
            'updated_at' => '2023-12-14 12:47:48',
        ]);
        Book::create([
            'book_isbn' => '9780307679075',
            'book_title' => 'Paths of the Soul',
            'author_id' => 8,
            'publisher_id' => 14,
            'subcategory_id' => 33,
            'book_number_pages' => 223,
            'book_publication_date' => '2014-04-04',
            'book_description' => 'Resumen del libro',
            'book_price' => 92000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at' => '2023-12-15 13:48:49',
            'updated_at' => '2023-12-15 14:49:50',
        ]);
        Book::create([
            'book_isbn' => '9780553296983',
            'book_title' => 'Dreamers of Tomorrow',
            'author_id' => 33,
            'publisher_id' => 11,
            'subcategory_id' => 16,
            'book_number_pages' => 256,
            'book_publication_date' => '2011-05-15',
            'book_description' => 'Resumen del libro',
            'book_price' => 97000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at' => '2023-12-16 15:50:51',
            'updated_at' => '2023-12-16 16:51:52',
        ]);
        Book::create([
            'book_isbn' => '9780140449363',
            'book_title' => 'Shadows of the Deep',
            'author_id' => 12,
            'publisher_id' => 6,
            'subcategory_id' => 24,
            'book_number_pages' => 198,
            'book_publication_date' => '2013-07-07',
            'book_description' => 'Resumen del libro',
            'book_price' => 109000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-12-17 17:52:53',
            'updated_at' => '2023-12-17 18:53:54',
        ]);
        Book::create([
            'book_isbn' => '9780307949482',
            'book_title' => 'Whispers of Eternity',
            'author_id' => 28,
            'publisher_id' => 30,
            'subcategory_id' => 30,
            'book_number_pages' => 175,
            'book_publication_date' => '2016-09-09',
            'book_description' => 'Resumen del libro',
            'book_price' => 85000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-12-18 19:54:55',
            'updated_at' => '2023-12-18 20:55:56',
        ]);
        Book::create([
            'book_isbn' => '9780679732762',
            'book_title' => 'Realm of Reflections',
            'author_id' => 19,
            'publisher_id' => 2,
            'subcategory_id' => 36,
            'book_number_pages' => 210,
            'book_publication_date' => '2015-03-03',
            'book_description' => 'Resumen del libro',
            'book_price' => 104000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at' => '2023-12-19 21:56:57',
            'updated_at' => '2023-12-19 22:57:58',
        ]);
        Book::create([
            'book_isbn' => '9780143127734',
            'book_title' => 'Echoes of Wonder',
            'author_id' => 5,
            'publisher_id' => 3,
            'subcategory_id' => 27,
            'book_number_pages' => 287,
            'book_publication_date' => '2012-11-11',
            'book_description' => 'Resumen del libro',
            'book_price' => 99000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-12-20 23:58:59',
            'updated_at' => '2023-12-21 00:00:00',
        ]);
        Book::create([
            'book_isbn' => '9780307271038',
            'book_title' => 'Mirrors of Destiny',
            'author_id' => 1,
            'publisher_id' => 22,
            'subcategory_id' => 41,
            'book_number_pages' => 176,
            'book_publication_date' => '2014-01-01',
            'book_description' => 'Resumen del libro',
            'book_price' => 87000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at' => '2023-12-21 02:01:01',
            'updated_at' => '2023-12-21 03:02:02',
        ]);
        Book::create([
            'book_isbn' => '9780553418032',
            'book_title' => 'Voyage of the Lost',
            'author_id' => 35,
            'publisher_id' => 29,
            'subcategory_id' => 5,
            'book_number_pages' => 239,
            'book_publication_date' => '2013-05-05',
            'book_description' => 'Resumen del libro',
            'book_price' => 100000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-12-22 04:03:03',
            'updated_at' => '2023-12-22 05:04:04',
        ]);
        Book::create([
            'book_isbn' => '9780679783269',
            'book_title' => 'Dreams in the Mist',
            'author_id' => 32,
            'publisher_id' => 16,
            'subcategory_id' => 29,
            'book_number_pages' => 194,
            'book_publication_date' => '2011-12-12',
            'book_description' => 'Resumen del libro',
            'book_price' => 94000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-12-23 06:05:05',
            'updated_at' => '2023-12-23 07:06:06',
        ]);
        Book::create([
            'book_isbn' => '9780140449199',
            'book_title' => 'Secrets of the Ancients',
            'author_id' => 23,
            'publisher_id' => 7,
            'subcategory_id' => 39,
            'book_number_pages' => 259,
            'book_publication_date' => '2010-02-02',
            'book_description' => 'Resumen del libro',
            'book_price' => 96000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at' => '2023-12-24 08:07:07',
            'updated_at' => '2023-12-24 09:08:08',
        ]);
        Book::create([
            'book_isbn' => '9780307949489',
            'book_title' => 'Beyond the Edge',
            'author_id' => 29,
            'publisher_id' => 13,
            'subcategory_id' => 6,
            'book_number_pages' => 202,
            'book_publication_date' => '2016-06-06',
            'book_description' => 'Resumen del libro',
            'book_price' => 98000,
            'book_stock' => 1,
            'book_discount' => 40,
            'created_at' => '2023-12-25 10:09:09',
            'updated_at' => '2023-12-25 11:10:10',
        ]);
        Book::create([
            'book_isbn' => '9780143127749',
            'book_title' => 'Reflections in Time',
            'author_id' => 10,
            'publisher_id' => 25,
            'subcategory_id' => 22,
            'book_number_pages' => 213,
            'book_publication_date' => '2012-03-03',
            'book_description' => 'Resumen del libro',
            'book_price' => 93000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at' => '2023-12-26 12:11:11',
            'updated_at' => '2023-12-26 13:12:12',
        ]);
        Book::create([
            'book_isbn' => '9780307279465',
            'book_title' => 'Mirrors of the Mind',
            'author_id' => 4,
            'publisher_id' => 17,
            'subcategory_id' => 35,
            'book_number_pages' => 248,
            'book_publication_date' => '2015-04-04',
            'book_description' => 'Resumen del libro',
            'book_price' => 89000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at' => '2023-12-27 14:13:13',
            'updated_at' => '2023-12-27 15:14:14',
        ]);
        Book::create([
            'book_isbn' => '9780140449285',
            'book_title' => 'Whispers of Fate',
            'author_id' => 18,
            'publisher_id' => 20,
            'subcategory_id' => 47,
            'book_number_pages' => 166,
            'book_publication_date' => '2013-01-15',
            'book_description' => 'Resumen del libro',
            'book_price' => 86000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at' => '2023-12-28 16:15:15',
            'updated_at' => '2023-12-28 17:16:16',
        ]);


    }
}
