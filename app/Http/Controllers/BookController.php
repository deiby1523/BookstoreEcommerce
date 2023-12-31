<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    // in admin dashbhoard
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
            'book_isbn' => 'required|min:8|max:13',
            'category_id' => 'required|min:1|integer',
            'subcategory_id' => 'required|min:1|integer',
            'book_title' => 'required',
            'author_id'=> 'required|min:1|integer',
            'publisher_id'=> 'required|min:1|integer',
            'book_publication_date' => 'required|date',
            'book_image' => 'required|image',
            'book_number_pages' => 'required'
        ]);

        // script para subir la imagen
        if($request->hasFile("book_image")) {

            $image = $request->file("book_image");
            $imageName = Str::slug($request->book_isbn) . "." . $image->guessExtension();
            $route = public_path("img/books/");

            //$image->move($route, $imageName);
            copy($image->getRealPath(),$route.$imageName);

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
                'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('book.index')->with('success','libro creado exitosamente.');

    }

    public function edit($id) {
        $book = Book::findOrFail($id);
        $subcategory = Subcategory::findOrFail($book->subcategory_id);
        $category = Category::findOrFail($subcategory->category_id);
        $author = Author::findOrFail($book->author_id);
        $publisher = Publisher::findOrFail($book->publisher_id);

        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('book.edit',compact('book','subcategory','category','author','publisher','authors','publishers','categories'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'book_isbn' => 'required|min:8|max:13',
            'category_id' => 'required|min:1|integer',
            'subcategory_id' => 'required|min:1|integer',
            'book_title' => 'required',
            'author_id'=> 'required|min:1|integer',
            'publisher_id'=> 'required|min:1|integer',
            'book_publication_date' => 'required|date',
            'book_number_pages' => 'required'
        ]);

        $book = Book::findOrFail($id);

        if($request->hasFile("book_image")) {
            if(Storage::exists(public_path($book->book_image_url))) {
                Storage::delete(public_path($book->book_image_url));
            }

            $image = $request->file("book_image");
            $imageName = Str::slug($request->book_isbn) . "." . $image->guessExtension();
            $route = public_path("img/books/");

            //$image->move($route, $imageName);
            copy($image->getRealPath(),$route.$imageName);

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
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('book.index')->with('success','Libro actualizado exitosamente.');
    }

    public function delete($id) {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('book.index')->with('success', "Libro eliminado correctamente");
    }

}
