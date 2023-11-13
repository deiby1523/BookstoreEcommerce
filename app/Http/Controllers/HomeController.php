<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function show()
    {
        $sql = 'SELECT
    books.id,
    books.book_isbn,
    books.book_title,
    books.book_image_url,
    authors.author_name,
    publishers.publisher_name,
    categories.category_name,
    subcategories.subcategory_name
    FROM books, authors, publishers, categories, subcategories
    WHERE books.author_id = authors.id
    AND books.publisher_id = publishers.id
    AND books.subcategory_id = subcategories.id
    AND subcategories.category_id = categories.id
    ORDER BY books.id DESC
    LIMIT 5';
        $latestBooks = DB::select($sql);
        return view('home', compact('latestBooks'));
    }
}
