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
            'book_isbn'=>'9789587783378',
            'book_title'=>'Libro de prueba 1',
            'author_id'=>2,
            'publisher_id'=>2,
            'subcategory_id'=>23,
            'book_number_pages'=>432,
            'book_publication_date'=>'2017-08-10',
            'book_description'=>'Programación orientada a objetos y estructura de datos a fondo es un libro pensado para extender los conocimientos que fueron adquiridos a lo largo de los cursos de las asignaturas iniciales de programación; principalmente de Programación estructurada. La finalidad de iniciar explicando Programación Orientada a Objetos (POO) es proveer una herramienta que permita encapsular la lógica y la complejidad de aquellos algoritmos; ocultándola para no verla. Y así concentrarse en el análisis, diseño y desarrollo de algoritmos con mayor grado de complejidad. Para quienes adquirieron sus conocimientos básicos programando en C, la obra comienza explicando los conceptos principales de encapsulamiento implementándolos con C++. Pero esto es solo el comienzo, ya que el curso de programación avanzada que se propone transita por los senderos del lenguaje Java. ¿Por qué Java? Porque hoy en día, y desde hace más de 20 años, Java es el lenguaje de programación con mayor nivel de aceptación en el ámbito profesional. La mayoría de las empresas desarrollan sus aplicaciones en Java. Y, aunque aquí el foco principal estará puesto sobre la lógica algorítmica, cuando implemente estos algoritmos con Java, el lector estará adquiriendo una destreza que le permitirá incorporarse a trabajar en proyectos de desarrollo que utilicen este lenguaje.',
            'book_image_url'=>'img/books/9789587783378.jpg',
            'book_price' => 60000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );

        Book::create( [
            'book_isbn'=>'9789587783379',
            'book_title'=>'Libro de prueba 2',
            'author_id'=>3,
            'publisher_id'=>3,
            'subcategory_id'=>22,
            'book_number_pages'=>123,
            'book_publication_date'=>'2017-08-10',
            'book_description'=>'Programación orientada a objetos y estructura de datos a fondo es un libro pensado para extender los conocimientos que fueron adquiridos a lo largo de los cursos de las asignaturas iniciales de programación; principalmente de Programación estructurada. La finalidad de iniciar explicando Programación Orientada a Objetos (POO) es proveer una herramienta que permita encapsular la lógica y la complejidad de aquellos algoritmos; ocultándola para no verla. Y así concentrarse en el análisis, diseño y desarrollo de algoritmos con mayor grado de complejidad. Para quienes adquirieron sus conocimientos básicos programando en C, la obra comienza explicando los conceptos principales de encapsulamiento implementándolos con C++. Pero esto es solo el comienzo, ya que el curso de programación avanzada que se propone transita por los senderos del lenguaje Java. ¿Por qué Java? Porque hoy en día, y desde hace más de 20 años, Java es el lenguaje de programación con mayor nivel de aceptación en el ámbito profesional. La mayoría de las empresas desarrollan sus aplicaciones en Java. Y, aunque aquí el foco principal estará puesto sobre la lógica algorítmica, cuando implemente estos algoritmos con Java, el lector estará adquiriendo una destreza que le permitirá incorporarse a trabajar en proyectos de desarrollo que utilicen este lenguaje.',
            'book_image_url'=>'img/books/9789587783379.jpg',
            'book_price' => 20000,
            'book_stock' => 1,
            'book_discount' => 0,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );

        Book::create( [
            'book_isbn'=>'9789587783370',
            'book_title'=>'Libro de prueba 3',
            'author_id'=>4,
            'publisher_id'=>4,
            'subcategory_id'=>21,
            'book_number_pages'=>643,
            'book_publication_date'=>'2017-08-10',
            'book_description'=>'Programación orientada a objetos y estructura de datos a fondo es un libro pensado para extender los conocimientos que fueron adquiridos a lo largo de los cursos de las asignaturas iniciales de programación; principalmente de Programación estructurada. La finalidad de iniciar explicando Programación Orientada a Objetos (POO) es proveer una herramienta que permita encapsular la lógica y la complejidad de aquellos algoritmos; ocultándola para no verla. Y así concentrarse en el análisis, diseño y desarrollo de algoritmos con mayor grado de complejidad. Para quienes adquirieron sus conocimientos básicos programando en C, la obra comienza explicando los conceptos principales de encapsulamiento implementándolos con C++. Pero esto es solo el comienzo, ya que el curso de programación avanzada que se propone transita por los senderos del lenguaje Java. ¿Por qué Java? Porque hoy en día, y desde hace más de 20 años, Java es el lenguaje de programación con mayor nivel de aceptación en el ámbito profesional. La mayoría de las empresas desarrollan sus aplicaciones en Java. Y, aunque aquí el foco principal estará puesto sobre la lógica algorítmica, cuando implemente estos algoritmos con Java, el lector estará adquiriendo una destreza que le permitirá incorporarse a trabajar en proyectos de desarrollo que utilicen este lenguaje.',
            'book_image_url'=>'img/books/9789587783370.jpg',
            'book_price' => 34000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );

        Book::create( [
            'book_isbn'=>'9789587783371',
            'book_title'=>'Libro de prueba 4',
            'author_id'=>5,
            'publisher_id'=>5,
            'subcategory_id'=>20,
            'book_number_pages'=>654,
            'book_publication_date'=>'2017-08-10',
            'book_description'=>'Programación orientada a objetos y estructura de datos a fondo es un libro pensado para extender los conocimientos que fueron adquiridos a lo largo de los cursos de las asignaturas iniciales de programación; principalmente de Programación estructurada. La finalidad de iniciar explicando Programación Orientada a Objetos (POO) es proveer una herramienta que permita encapsular la lógica y la complejidad de aquellos algoritmos; ocultándola para no verla. Y así concentrarse en el análisis, diseño y desarrollo de algoritmos con mayor grado de complejidad. Para quienes adquirieron sus conocimientos básicos programando en C, la obra comienza explicando los conceptos principales de encapsulamiento implementándolos con C++. Pero esto es solo el comienzo, ya que el curso de programación avanzada que se propone transita por los senderos del lenguaje Java. ¿Por qué Java? Porque hoy en día, y desde hace más de 20 años, Java es el lenguaje de programación con mayor nivel de aceptación en el ámbito profesional. La mayoría de las empresas desarrollan sus aplicaciones en Java. Y, aunque aquí el foco principal estará puesto sobre la lógica algorítmica, cuando implemente estos algoritmos con Java, el lector estará adquiriendo una destreza que le permitirá incorporarse a trabajar en proyectos de desarrollo que utilicen este lenguaje.',
            'book_image_url'=>'img/books/9789587783371.jpg',
            'book_price' => 56000,
            'book_stock' => 1,
            'book_discount' => 10,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );

        Book::create( [
            'book_isbn'=>'9789587783372',
            'book_title'=>'Libro de prueba 5',
            'author_id'=>6,
            'publisher_id'=>6,
            'subcategory_id'=>19,
            'book_number_pages'=>342,
            'book_publication_date'=>'2017-08-10',
            'book_description'=>'Programación orientada a objetos y estructura de datos a fondo es un libro pensado para extender los conocimientos que fueron adquiridos a lo largo de los cursos de las asignaturas iniciales de programación; principalmente de Programación estructurada. La finalidad de iniciar explicando Programación Orientada a Objetos (POO) es proveer una herramienta que permita encapsular la lógica y la complejidad de aquellos algoritmos; ocultándola para no verla. Y así concentrarse en el análisis, diseño y desarrollo de algoritmos con mayor grado de complejidad. Para quienes adquirieron sus conocimientos básicos programando en C, la obra comienza explicando los conceptos principales de encapsulamiento implementándolos con C++. Pero esto es solo el comienzo, ya que el curso de programación avanzada que se propone transita por los senderos del lenguaje Java. ¿Por qué Java? Porque hoy en día, y desde hace más de 20 años, Java es el lenguaje de programación con mayor nivel de aceptación en el ámbito profesional. La mayoría de las empresas desarrollan sus aplicaciones en Java. Y, aunque aquí el foco principal estará puesto sobre la lógica algorítmica, cuando implemente estos algoritmos con Java, el lector estará adquiriendo una destreza que le permitirá incorporarse a trabajar en proyectos de desarrollo que utilicen este lenguaje.',
            'book_image_url'=>'img/books/9789587783372.jpg',
            'book_price' => 78000,
            'book_stock' => 1,
            'book_discount' => 30,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );

        Book::create( [
            'book_isbn'=>'9789587783373',
            'book_title'=>'Libro de prueba 6',
            'author_id'=>7,
            'publisher_id'=>7,
            'subcategory_id'=>18,
            'book_number_pages'=>456,
            'book_publication_date'=>'2017-08-10',
            'book_description'=>'Programación orientada a objetos y estructura de datos a fondo es un libro pensado para extender los conocimientos que fueron adquiridos a lo largo de los cursos de las asignaturas iniciales de programación; principalmente de Programación estructurada. La finalidad de iniciar explicando Programación Orientada a Objetos (POO) es proveer una herramienta que permita encapsular la lógica y la complejidad de aquellos algoritmos; ocultándola para no verla. Y así concentrarse en el análisis, diseño y desarrollo de algoritmos con mayor grado de complejidad. Para quienes adquirieron sus conocimientos básicos programando en C, la obra comienza explicando los conceptos principales de encapsulamiento implementándolos con C++. Pero esto es solo el comienzo, ya que el curso de programación avanzada que se propone transita por los senderos del lenguaje Java. ¿Por qué Java? Porque hoy en día, y desde hace más de 20 años, Java es el lenguaje de programación con mayor nivel de aceptación en el ámbito profesional. La mayoría de las empresas desarrollan sus aplicaciones en Java. Y, aunque aquí el foco principal estará puesto sobre la lógica algorítmica, cuando implemente estos algoritmos con Java, el lector estará adquiriendo una destreza que le permitirá incorporarse a trabajar en proyectos de desarrollo que utilicen este lenguaje.',
            'book_image_url'=>'img/books/9789587783373.jpg',
            'book_price' => 500000,
            'book_stock' => 1,
            'book_discount' => 20,
            'created_at'=>'2023-11-06 00:00:29',
            'updated_at'=>'2023-11-06 01:07:15'
        ] );


    }
}
