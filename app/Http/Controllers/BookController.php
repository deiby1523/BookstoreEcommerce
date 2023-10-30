<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

    public function save(Request $request) {
        $request->validate([
            'book_isbn' => 'required|min:8|integer',
            'category_id' => 'required|min:1|integer',
            'subcategory_id' => 'required|min:1|integer',
            'book_title' => 'required',
            'author_id'=> 'required|min:1|integer',
            'publisher_id'=> 'required|min:1|integer',
            'book_publication_date' => 'required|date'
        ]);

        Book::create([
            'book_isbn' => $request->book_isbn,
            'book_title' => $request->book_title,
            'subcategory_id' => $request->subcategory_id,
            'author_id' => $request->author_id,
            'publisher_id' => $request->publisher_id,
            'book_publication_date' => $request->book_publication_date,
            'book_description' => $request->book_description,
            'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('book.index')->with('success','libro creado exitosamente.');

    }
}
