<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create( [
            'id'=>1,
            'book_isbn'=>'9780747532699',
            'book_title'=>'Harry Potter series',
            'author_id'=>1,
            'publisher_id'=>1,
            'subcategory_id'=>3,
            'book_number_pages'=>0,
            'book_publication_date'=>'1997-06-26',
            'book_description'=>'El día de su cumpleaños, Harry Potter descubre que es hijo de dos conocidos hechiceros, de los que ha heredado poderes mágicos. Debe asistir a una famosa escuela de magia y hechicería, donde entabla una amistad con dos jóvenes que se convertirán en sus compañeros de aventura. Durante su primer año en Hogwarts, descubre que un malévolo y poderoso mago llamado Voldemort está en busca de una piedra filosofal que alarga la vida de quien la posee.',
            'created_at'=>'2023-11-04 21:54:52',
            'updated_at'=>'2023-11-04 21:54:52'
        ] );



        Book::create( [
            'id'=>5,
            'book_isbn'=>'0609608444',
            'book_title'=>'El diablo en la ciudad blanca',
            'author_id'=>10,
            'publisher_id'=>10,
            'subcategory_id'=>8,
            'book_number_pages'=>447,
            'book_publication_date'=>'2003-01-01',
            'book_description'=>'The Devil In The White City cuenta la historia de Chicago a finales del siglo XIX y cómo tuvo la oportunidad de superar el terrible crimen y el malestar social cuando ganó la candidatura para albergar la Exposición Universal, pero en cambio terminó contribuyendo a la creación del mundo. Primer asesino en serie conocido.',
            'created_at'=>'2023-11-04 22:56:36',
            'updated_at'=>'2023-11-04 22:56:36'
        ] );


    }
}
