<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create( [
            'id'=>1,
            'author_name'=>'J.K. Rowling',
            'created_at'=>'2023-11-04 21:12:48',
            'updated_at'=>'2023-11-04 21:12:48'
        ] );

        Author::create( [
            'id'=>2,
            'author_name'=>'Gabriel García Márquez',
            'created_at'=>'2023-11-04 21:13:02',
            'updated_at'=>'2023-11-04 21:13:02'
        ] );

        Author::create( [
            'id'=>3,
            'author_name'=>'Agatha Christie',
            'created_at'=>'2023-11-04 21:13:16',
            'updated_at'=>'2023-11-04 21:13:16'
        ] );

        Author::create( [
            'id'=>4,
            'author_name'=>'George R.R. Martin',
            'created_at'=>'2023-11-04 21:13:36',
            'updated_at'=>'2023-11-04 21:13:36'
        ] );

        Author::create( [
            'id'=>5,
            'author_name'=>'Jane Austen',
            'created_at'=>'2023-11-04 21:13:48',
            'updated_at'=>'2023-11-04 21:13:48'
        ] );

        Author::create( [
            'id'=>6,
            'author_name'=>'Malcolm Gladwell',
            'created_at'=>'2023-11-04 21:14:01',
            'updated_at'=>'2023-11-04 21:14:01'
        ] );

        Author::create( [
            'id'=>7,
            'author_name'=>'Michelle Obama',
            'created_at'=>'2023-11-04 21:14:29',
            'updated_at'=>'2023-11-04 21:14:29'
        ] );

        Author::create( [
            'id'=>8,
            'author_name'=>'Yuval Noah Harari',
            'created_at'=>'2023-11-04 21:14:47',
            'updated_at'=>'2023-11-04 21:14:47'
        ] );

        Author::create( [
            'id'=>9,
            'author_name'=>'Stephen Hawking',
            'created_at'=>'2023-11-04 21:15:01',
            'updated_at'=>'2023-11-04 21:15:01'
        ] );

        Author::create( [
            'id'=>10,
            'author_name'=>'Erik Larson',
            'created_at'=>'2023-11-04 21:15:12',
            'updated_at'=>'2023-11-04 21:15:12'
        ] );

        Author::create( [
            'id'=>11,
            'author_name'=>'J.R.R. Tolkien',
            'created_at'=>'2023-11-04 21:15:25',
            'updated_at'=>'2023-11-04 21:15:25'
        ] );

        Author::create( [
            'id'=>12,
            'author_name'=>'Roald Dahl',
            'created_at'=>'2023-11-04 21:15:38',
            'updated_at'=>'2023-11-04 21:15:38'
        ] );

        Author::create( [
            'id'=>13,
            'author_name'=>'Rick Riordan',
            'created_at'=>'2023-11-04 21:16:01',
            'updated_at'=>'2023-11-04 21:16:01'
        ] );

        Author::create( [
            'id'=>14,
            'author_name'=>'Dr. Seuss',
            'created_at'=>'2023-11-04 21:16:42',
            'updated_at'=>'2023-11-04 21:16:42'
        ] );

        Author::create( [
            'id'=>15,
            'author_name'=>'Neil deGrasse Tyson',
            'created_at'=>'2023-11-04 21:16:55',
            'updated_at'=>'2023-11-04 21:16:55'
        ] );

        Author::create( [
            'id'=>16,
            'author_name'=>'Richard Dawkins',
            'created_at'=>'2023-11-04 21:17:13',
            'updated_at'=>'2023-11-04 21:17:13'
        ] );

        Author::create( [
            'id'=>17,
            'author_name'=>'Rachel Carson',
            'created_at'=>'2023-11-04 21:17:31',
            'updated_at'=>'2023-11-04 21:17:31'
        ] );

        Author::create( [
            'id'=>18,
            'author_name'=>'Stephen Jay Gould',
            'created_at'=>'2023-11-04 21:17:44',
            'updated_at'=>'2023-11-04 21:17:44'
        ] );

        Author::create( [
            'id'=>19,
            'author_name'=>'Carl Sagan',
            'created_at'=>'2023-11-04 21:17:58',
            'updated_at'=>'2023-11-04 21:17:58'
        ] );

        Author::create( [
            'id'=>20,
            'author_name'=>'Susan Sontag',
            'created_at'=>'2023-11-04 21:18:10',
            'updated_at'=>'2023-11-04 21:18:10'
        ] );

        Author::create( [
            'id'=>21,
            'author_name'=>'John Berger',
            'created_at'=>'2023-11-04 21:18:24',
            'updated_at'=>'2023-11-04 21:18:24'
        ] );

        Author::create( [
            'id'=>22,
            'author_name'=>'Ansel Adams',
            'created_at'=>'2023-11-04 21:19:01',
            'updated_at'=>'2023-11-04 21:19:01'
        ] );

        Author::create( [
            'id'=>23,
            'author_name'=>'Grayson Perry',
            'created_at'=>'2023-11-04 21:19:14',
            'updated_at'=>'2023-11-04 21:19:14'
        ] );

        Author::create( [
            'id'=>24,
            'author_name'=>'Kehinde Wiley',
            'created_at'=>'2023-11-04 21:19:29',
            'updated_at'=>'2023-11-04 21:19:29'
        ] );

        Author::create( [
            'id'=>25,
            'author_name'=>'Brené Brown',
            'created_at'=>'2023-11-04 21:19:45',
            'updated_at'=>'2023-11-04 21:19:45'
        ] );

        Author::create( [
            'id'=>26,
            'author_name'=>'Eckhart Tolle',
            'created_at'=>'2023-11-04 21:19:59',
            'updated_at'=>'2023-11-04 21:19:59'
        ] );

        Author::create( [
            'id'=>27,
            'author_name'=>'Dale Carnegie',
            'created_at'=>'2023-11-04 21:20:11',
            'updated_at'=>'2023-11-04 21:20:11'
        ] );

        Author::create( [
            'id'=>28,
            'author_name'=>'Louise Hay',
            'created_at'=>'2023-11-04 21:20:24',
            'updated_at'=>'2023-11-04 21:20:24'
        ] );

        Author::create( [
            'id'=>29,
            'author_name'=>'Mark Manson',
            'created_at'=>'2023-11-04 21:20:42',
            'updated_at'=>'2023-11-04 21:20:42'
        ] );

        Author::create( [
            'id'=>30,
            'author_name'=>'Peter Drucker',
            'created_at'=>'2023-11-04 21:20:57',
            'updated_at'=>'2023-11-04 21:20:57'
        ] );

        Author::create( [
            'id'=>31,
            'author_name'=>'Sheryl Sandberg',
            'created_at'=>'2023-11-04 21:21:12',
            'updated_at'=>'2023-11-04 21:21:12'
        ] );

        Author::create( [
            'id'=>32,
            'author_name'=>'Daniel Kahneman',
            'created_at'=>'2023-11-04 21:21:25',
            'updated_at'=>'2023-11-04 21:21:25'
        ] );

        Author::create( [
            'id'=>33,
            'author_name'=>'Michael E. Porter',
            'created_at'=>'2023-11-04 21:21:57',
            'updated_at'=>'2023-11-04 21:21:57'
        ] );

        Author::create( [
            'id'=>34,
            'author_name'=>'Simon Sinek',
            'created_at'=>'2023-11-04 21:22:13',
            'updated_at'=>'2023-11-04 21:22:13'
        ] );

        Author::create( [
            'id'=>35,
            'author_name'=>'C.S. Lewis',
            'created_at'=>'2023-11-04 21:22:29',
            'updated_at'=>'2023-11-04 21:22:29'
        ] );

        Author::create( [
            'id'=>36,
            'author_name'=>'Karen Armstrong',
            'created_at'=>'2023-11-04 21:22:46',
            'updated_at'=>'2023-11-04 21:22:46'
        ] );

        Author::create( [
            'id'=>37,
            'author_name'=>'Thich Nhat Hanh',
            'created_at'=>'2023-11-04 21:22:58',
            'updated_at'=>'2023-11-04 21:22:58'
        ] );

        Author::create( [
            'id'=>38,
            'author_name'=>'Eckhart Tolle',
            'created_at'=>'2023-11-04 21:23:09',
            'updated_at'=>'2023-11-04 21:23:09'
        ] );

        Author::create( [
            'id'=>39,
            'author_name'=>'Paulo Coelho',
            'created_at'=>'2023-11-04 21:23:21',
            'updated_at'=>'2023-11-04 21:23:21'
        ] );
    }
}
