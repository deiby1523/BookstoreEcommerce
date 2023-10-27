<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class BookDashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        $books = Book::all();
        return view('books_dashboard', compact('categories','subcategories','authors','publishers','books'));
    }
}
