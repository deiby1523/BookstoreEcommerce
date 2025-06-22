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
        $categories = Category::where('category_type', 0)->get();
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
                'book_discount' => $request->book_discount,
                'active' => ($request->active == 'on'),
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
        $categories = Category::where('category_type', 0)->get();

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
                'book_discount' => $request->book_discount,
                'active' => ($request->active == 'on'),
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
                'book_discount' => $request->book_discount,
                'active' => ($request->active == 'on'),
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
        $bookCategories = Category::where('category_type', 0)->get();
        $productCategories = Category::where('category_type', 1)->get();
        return view('book.view', compact('book', 'bookCategories','productCategories'));
    }

    public function search(): View
    {
        $bookCategories = Category::where('category_type', 0)->get();
        $productCategories = Category::where('category_type', 1)->get();

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

        return view('book.search', compact('bookCategories','productCategories', 'books'));
    }

    public function search2(Request $request): View
    {
        $filters = $request;
//        dump($request);
        dump($request['min_price'], $request['max_price']);

//         Validación de los parámetros de entrada
//         $filters = $request->validate([
//            'category' => 'nullable|integer|exists:categories,id',
//            'subcategory' => 'nullable|integer|exists:subcategories,id',
//            'min_price' => 'nullable|numeric|min:0',
//            'max_price' => 'nullable|numeric|min:0|gte:min_price',
//            'format' => 'nullable|in:paperback,hardcover,digital',
//            'rating' => 'nullable|integer|between:1,5',
//            'sort' => 'nullable|in:relevance,price_asc,price_desc,rating,newest'
//        ]);

        // Obtener categorías y subcategorías seleccionadas
        $categorySelected = $filters['category'] ? Category::find($filters['category']) : null;
        $subcategorySelected = $filters['subcategory'] ? Subcategory::find($filters['subcategory']) : null;

        // Construir la consulta usando Eloquent para mayor seguridad y legibilidad
        $query = Book::select([
            'books.id',
            'books.book_isbn',
            'books.book_title',
            'books.book_price',
            'books.book_price',
            'books.book_discount',
            'books.book_image_url',
            'books.updated_at',
            'authors.author_name',
            'publishers.publisher_name',
            'categories.category_name',
            'subcategories.subcategory_name'
        ])
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->join('subcategories', 'books.subcategory_id', '=', 'subcategories.id')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id');
//            ->with(['reviews']); // Cargar relaciones si existen

        // Aplicar filtros
        if ($filters['category']) {
            $query->where('categories.id', $filters['category']);
        }

        if ($filters['subcategory']) {
            $query->where('subcategories.id', $filters['subcategory']);
        }

        // Filtro por precio
        if ($filters['min_price']) {
            $query->whereRaw('(books.book_price * (1 - books.book_discount / 100)) >= ?', [$filters['min_price']]);
        }

        if ($filters['max_price']) {
            $query->whereRaw('(books.book_price * (1 - books.book_discount / 100)) <= ?', [$filters['max_price']]);
        }

        // Filtro por formato (asumiendo que tienes un campo book_format en tu modelo)
//        if ($validated['format']) {
//            $query->where('books.book_format', $validated['format']);
//        }

        // Filtro por rating (asumiendo que tienes relación con reviews)
//        if ($validated['rating']) {
//            $query->whereHas('reviews', function($q) use ($validated) {
//                $q->select(DB::raw('avg(rating) as average_rating'))
//                    ->having('average_rating', '>=', $validated['rating']);
//            });
//        }

        // Ordenación
        switch ($filters['sort'] ?? 'relevance') {
            case 'price_asc':
                $query->orderByRaw('(books.book_price * (1 - books.book_discount / 100)) asc');
                break;
            case 'price_desc':
                $query->orderByRaw('(books.book_price * (1 - books.book_discount / 100)) desc');
                break;
            case 'rating':
                $query->withAvg('reviews', 'rating')
                    ->orderBy('reviews_avg_rating', 'desc');
                break;
            case 'newest':
                $query->orderBy('books.updated_at', 'desc');
                break;
            default:
                // Orden por relevancia (podrías implementar tu lógica aquí)
                $query->orderBy('books.updated_at', 'desc');
        }

        // Paginación en lugar de límite fijo
        $books = $query->paginate(12); // 12 items por página

        // Obtener todas las categorías para los filtros
        $bookCategories = Category::where('category_type', 0)->with('subcategories')->get();
        $productCategories = Category::where('category_type', 1)->get();

        return view('book.search', [
            'bookCategories' => $bookCategories,
            'productCategories' => $productCategories,
            'categorySelected' => $categorySelected,
            'subcategorySelected' => $subcategorySelected,
            'books' => $books,
            'filters' => $filters // Pasar los filtros aplicados a la vista
        ]);
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
        $perPage = 20;
        $offset = ($page-1) * $perPage;

        if ($search != " ") {
            $sql = "SELECT
    books.id,
    books.book_isbn,
    books.book_title,
    books.book_price,
    books.active,
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
    books.active,
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
    books.active,
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
        books.active,
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
