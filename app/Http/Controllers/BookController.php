<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
//        $books = Book::all();

        $sql = 'SELECT
    books.id,
    books.book_isbn,
    books.book_title,
    authors.author_name,
    publishers.publisher_name,
    categories.category_name,
    subcategories.subcategory_name
    FROM books, authors, publishers, categories, subcategories
    WHERE books.author_id = authors.id
    AND books.publisher_id = publishers.id
    AND books.subcategory_id = subcategories.id
    AND subcategories.category_id = categories.id';
        $books = DB::select($sql);
        return view('book.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('book.create', compact('authors', 'publishers', 'categories'));
    }
}
