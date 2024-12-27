<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeaturedType;
use App\Models\Featured;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeaturedController extends Controller
{
    public function index()
    {
        $featured_types = FeaturedType::all();
        return view('featured.index', compact('featured_types'));
    }

    public function create()
    {
        return view('featured.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'featured_type_name' => 'required | min:3',
        ]);

        FeaturedType::create([
            'featured_type_name' => $request->featured_type_name,
            'featured_type_description' => $request->featured_type_description,
            'active' => ($request->active == 'on'),
            'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
        ]);


        return redirect()->route('featured.index')->with('success', 'Seccion destacada creada exitosamente.');
    }

    public function edit($id): View
    {
        $featured = FeaturedType::findOrFail($id);

        return view('featured.edit', compact('featured'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'featured_type_name' => 'required | min:3 | max : 60',
            'featured_type_description' => 'required | min:3'
        ]);

        $featured = FeaturedType::findOrFail($id);

        $featured->update([
            'featured_type_name' => $request->featured_type_name,
            'featured_type_description' => $request->featured_type_description,
            'active' => ($request->active == 'on'),
            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('featured.index')->with('success', 'Sección destacada actualizada exitosamente.');
    }

    public function delete($id)
    {
        $featured = FeaturedType::findOrFail($id);
        $featured->delete();

        return redirect()->route('featured.index')->with('success', 'Sección destacada eliminada exitosamente.');
    }

    public function show($id)
    {
        $featured = FeaturedType::findOrFail($id);
        return view('featured.show', compact('featured'));
    }

    public function searchBook(Request $request): JsonResponse
    {
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
        books.book_title LIKE '%$request->search%' OR
        books.book_isbn LIKE '%$request->search%' OR
        authors.author_name LIKE '%$request->search%' OR
        publishers.publisher_name LIKE '%$request->search%')
        ORDER BY books.book_title ASC
        LIMIT 5";

        $books = DB::select($sql);
        return response()->json($books, 200);
    }

    public function addBook(Request $request)
    {
        $bId = $request->book_id;
        $tId = $request->featured_type_id;

        $exists = DB::select('SELECT id FROM featured WHERE type_id = ? AND book_id = ?', [$tId, $bId]);

        if (count($exists) > 0) {
            return redirect()->route('featured.edit', $request->featured_type_id)->with('danger', 'El libro ya pertenece a esta sección destacada');
        } else {
            $cAt = Carbon::now('UTC')->format('Y-m-d H:i:s');
            $uAt = Carbon::now('UTC')->format('Y-m-d H:i:s');

            DB::insert('INSERT INTO featured(book_id,type_id,created_at,updated_at) VALUES (?,?,?,?)', [$bId, $tId, $cAt, $uAt]);

            return redirect()->route('featured.edit', $request->featured_type_id)->with('success', 'Se añadió el libro exitosamente.');
        }
    }

    public function delBook($idF,$idB)
    {
        $featured = DB::select('SELECT * FROM featured WHERE type_id = ? AND book_id = ?', [$idF, $idB]);

        if (count($featured) > 0) {
            DB::delete('DELETE FROM featured WHERE id = ?',[$featured[0]->id]);
        } else {
            return redirect()->route('featured.edit', $idF)->with('danger', "Hubo un problema al eliminar el libro");

        }

        return redirect()->route('featured.edit', $idF)->with('success', 'Se eliminó el libro exitosamente.');

    }
}
