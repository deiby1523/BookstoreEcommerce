<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Mockery\Undefined;

class BookController extends Controller
{
    public function index(): View
    {
        $sql = 'SELECT
        books.id,
        books.book_isbn,
        books.book_title,
        books.book_price,
        authors.author_name,
        publishers.publisher_name,
        categories.category_name,
        subcategories.subcategory_name
        FROM books, authors, publishers, categories, subcategories
        WHERE books.author_id = authors.id
        AND books.publisher_id = publishers.id
        AND books.subcategory_id = subcategories.id
        AND subcategories.category_id = categories.id
        ORDER BY books.updated_at DESC
        LIMIT 30';

        $books = DB::select($sql);
        return view('book.index', compact('books'));
    }

    public function create(): View
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('book.create', compact('authors', 'publishers', 'categories'));
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'book_isbn' => 'required|min:8|max:13',
            'category_id' => 'required|min:1|integer',
            'subcategory_id' => 'required|min:1|integer',
            'book_title' => 'required',
            'author_id' => 'required|min:1|integer',
            'publisher_id' => 'required|min:1|integer',
            'book_publication_date' => 'required|date',
            'book_image' => 'required|image',
            'book_number_pages' => 'required|integer|min:1',
            'book_price' => 'required|min:0',
            'book_stock' => 'required|integer',
            'book_discount' => 'integer|max:100'
        ]);

        // image upload script (edit)
        if ($request->hasFile("book_image")) {
            $image = $request->file("book_image");
            $imageName = Str::slug($request->book_isbn) . "." . $image->guessExtension();
            $route = public_path("img/books/");

            //$image->move($route, $imageName);
            copy($image->getRealPath(), $route . $imageName);

            Book::create([
                'book_isbn' => $request->book_isbn,
                'book_title' => $request->book_title,
                'subcategory_id' => $request->subcategory_id,
                'author_id' => $request->author_id,
                'publisher_id' => $request->publisher_id,
                'book_number_pages' => $request->book_number_pages,
                'book_publication_date' => $request->book_publication_date,
                'book_description' => $request->book_description,
                'book_image_url' => 'img/books/' . $imageName,
                'book_price' => $request->book_price,
                'book_stock' => $request->book_stock,
                'book_discount' => $request->book_discount,
                'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('book.index')->with('success', 'libro creado exitosamente.');

    }

    public function edit($id): View
    {
        $book = Book::findOrFail($id);
        $subcategory = Subcategory::findOrFail($book->subcategory_id);
        $category = Category::findOrFail($subcategory->category_id);
        $author = Author::findOrFail($book->author_id);
        $publisher = Publisher::findOrFail($book->publisher_id);

        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('book.edit', compact('book', 'subcategory', 'category', 'author', 'publisher', 'authors', 'publishers', 'categories'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'book_isbn' => 'required|min:8|max:13',
            'category_id' => 'required|min:1|integer',
            'subcategory_id' => 'required|min:1|integer',
            'book_title' => 'required',
            'author_id' => 'required|min:1|integer',
            'publisher_id' => 'required|min:1|integer',
            'book_publication_date' => 'required|date',
            'book_number_pages' => 'required|integer|min:1',
            'book_price' => 'required|min:0',
            'book_stock' => 'required|integer',
            'book_discount' => 'integer|max:100'
        ]);

        $book = Book::findOrFail($id);

        if ($request->hasFile("book_image")) {
            if (File::exists(public_path($book->book_image_url))) {
                File::delete(public_path($book->book_image_url));
            }

            $image = $request->file("book_image");
            $imageName = Str::slug($request->book_isbn) . "." . $image->guessExtension();
            $route = public_path("img/books/");

            //$image->move($route, $imageName);
            copy($image->getRealPath(), $route . $imageName);

            $book->update([
                'book_isbn' => $request->book_isbn,
                'book_title' => $request->book_title,
                'subcategory_id' => $request->subcategory_id,
                'author_id' => $request->author_id,
                'publisher_id' => $request->publisher_id,
                'book_number_pages' => $request->book_number_pages,
                'book_publication_date' => $request->book_publication_date,
                'book_description' => $request->book_description,
                'book_image_url' => 'img/books/' . $imageName,
                'book_price' => $request->book_price,
                'book_stock' => $request->book_stock,
                'book_discount' => $request->book_discount,
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);

        } else {
            $book->update([
                'book_isbn' => $request->book_isbn,
                'book_title' => $request->book_title,
                'subcategory_id' => $request->subcategory_id,
                'author_id' => $request->author_id,
                'publisher_id' => $request->publisher_id,
                'book_number_pages' => $request->book_number_pages,
                'book_publication_date' => $request->book_publication_date,
                'book_description' => $request->book_description,
                'book_price' => $request->book_price,
                'book_stock' => $request->book_stock,
                'book_discount' => $request->book_discount,
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('book.index')->with('success', 'Libro actualizado exitosamente.');
    }

    public function show($id): View
    {
        $book = Book::findOrFail($id);
        return view('book.show', compact('book'));
    }

    public function view($id): View
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('book.view', compact('book', 'categories'));
    }

    public function search(): View
    {
        $categories = Category::all();

        $sql = 'SELECT
        books.id,
        books.book_isbn,
        books.book_title,
        books.book_price,
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
        ORDER BY books.updated_at DESC
        LIMIT 30';
        $books = DB::select($sql);

        return view('book.search', compact('categories', 'books'));
    }

    public function search2(Request $request): View
    {
        $categorySelected = null;
        if (isset($request->category)) {
            $categorySelected = Category::findOrFail($request->category);
        }

        $subcategorySelected = null;
        if (isset($request->subcategory)) {
            $subcategorySelected = Subcategory::findOrFail($request->subcategory);
        }

        $categories = Category::all();
        $sql = 'SELECT
        books.id,
        books.book_isbn,
        books.book_title,
        books.book_price,
        books.book_image_url,
        authors.author_name,
        publishers.publisher_name,
        categories.category_name,
        subcategories.subcategory_name
        FROM books, authors, publishers, categories, subcategories
        WHERE books.author_id = authors.id
        AND books.publisher_id = publishers.id
        AND books.subcategory_id = subcategories.id
        AND subcategories.category_id = categories.id';

        if (isset($request->category)) {
            $sql = $sql . " AND categories.id = " . $request->category;
        }

        if (isset($request->subcategory)) {
            $sql = $sql . " AND subcategories.id = " . $request->subcategory;
        }

        $sql = $sql . ' ORDER BY books.updated_at DESC LIMIT 50';
        $books = DB::select($sql);

        return view('book.search', compact('categories', 'categorySelected', 'subcategorySelected', 'books'));
    }

    public function delete($id): RedirectResponse
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('book.index')->with('success', "Libro eliminado correctamente");
    }

    public function searchSelect(Request $request): JsonResponse
    {
        $search = $request->search;
        $page = $request->page;
        $perPage = 30;
        $offset = ($page-1) * $perPage;

        if ($search != " ") {
            $sql = "SELECT
    books.id,
    books.book_isbn,
    books.book_title,
    books.book_price,
    authors.author_name,
    publishers.publisher_name,
    categories.category_name,
    subcategories.subcategory_name
    FROM books, authors, publishers, categories, subcategories
    WHERE books.author_id = authors.id
    AND books.publisher_id = publishers.id
    AND books.subcategory_id = subcategories.id
    AND subcategories.category_id = categories.id
    AND(
        books.book_title LIKE '%$search%' OR
        books.book_isbn LIKE '%$search%' OR
        categories.category_name LIKE '%$search%' OR
        authors.author_name LIKE '%$search%' OR
        publishers.publisher_name LIKE '%$search%')
        ORDER BY books.book_title ASC";

            $books = DB::select($sql);
            $numBooks = count($books);
            $numPages = ceil($numBooks / $perPage);

            $sql = "SELECT
    books.id,
    books.book_isbn,
    books.book_title,
    books.book_price,
    authors.author_name,
    publishers.publisher_name,
    categories.category_name,
    subcategories.subcategory_name
    FROM books, authors, publishers, categories, subcategories
    WHERE books.author_id = authors.id
    AND books.publisher_id = publishers.id
    AND books.subcategory_id = subcategories.id
    AND subcategories.category_id = categories.id
    AND(
        books.book_title LIKE '%$search%' OR
        books.book_isbn LIKE '%$search%' OR
        categories.category_name LIKE '%$search%' OR
        authors.author_name LIKE '%$search%' OR
        publishers.publisher_name LIKE '%$search%')
       ORDER BY books.created_at DESC
        LIMIT $offset,$perPage";
            $books = DB::select($sql);
            return response()->json($books, 200)->withHeaders(['numBooks' => $numBooks,'numPages' => $numPages,'page' => $page, 'perPage' => $perPage,'display'=>'Mostrando del '.($offset+1).' al '.($offset+$perPage)]);
        } else {
            $sql = "SELECT
    books.id,
    books.book_isbn,
    books.book_title,
    books.book_price,
    authors.author_name,
    publishers.publisher_name,
    categories.category_name,
    subcategories.subcategory_name
    FROM books, authors, publishers, categories, subcategories
    WHERE books.author_id = authors.id
    AND books.publisher_id = publishers.id
    AND books.subcategory_id = subcategories.id
    AND subcategories.category_id = categories.id
        ORDER BY books.created_at DESC
        LIMIT $perPage
        OFFSET $offset";

            $books = DB::select($sql);
            return response()->json($books, 200)->withHeaders(['numPages' => 10]);
        }
    }

    public function searchNav(Request $request): JsonResponse
    {
        $max = 8;   // límite de libros para mostrar
        if ($request->search == "" || $request->search == " ") {
            $max = 0;   // si la cadena de busqueda esta vacia no devuelve nada
        }

        $sql = "SELECT
        books.id,
        books.book_isbn,
        books.book_title,
        books.book_price,
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
        AND(books.book_title LIKE '%$request->search%' OR
            books.book_isbn LIKE '%$request->search%' OR
            authors.author_name LIKE '%$request->search%' OR
            publishers.publisher_name LIKE '%$request->search%')
        ORDER BY books.book_title ASC
        LIMIT $max";

        $books = DB::select($sql);
        return response()->json($books, 200);
    }
}
