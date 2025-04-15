<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    public function save(Request $request)
    {
        $request->validate(['author_name' => 'min:3|required']);

        Author::create(['author_name' => $request->author_name, 'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')]);

        return redirect()->route('author.index')->with('success', 'Autor creado exitosamente.');
    }

    public function create()
    {
        return view('author.create');
    }

    public function show($id)
    {

        $author = Author::findOrFail($id);

        return view('author.show', compact('author'));
    }


    public function edit($id)
    {

        $author = Author::findOrFail($id);

        return view('author.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['author_name' => 'min:3|required']);

        $author = Author::findOrFail($id);

        $author->update(['author_name' => $request->author_name, 'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')]);

        return redirect()->route('author.index')->with('success', 'Autor actualizado correctamente');
    }

    public function delete($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('author.index')->with('success', "Autor eliminado correctamente");
    }

    public function searchSelect(Request $request)
    {
        $sql = "SELECT authors.id, authors.author_name FROM authors WHERE author_name LIKE '%$request->search%' LIMIT 5";
        $authors = DB::select($sql);
        return response()->json($authors, 200);
    }

    public function searchIndex(Request $request): JsonResponse
    {
        $search = $request->search;
        $page = $request->page;
        $perPage = 20;
        $offset = ($page - 1) * $perPage;

        if ($search != " ") {
            $sql = "SELECT
    authors.id,
    authors.author_name,
    authors.created_at,
    authors.updated_at
    FROM authors
    WHERE (authors.id LIKE '%$search%' OR
        authors.author_name LIKE '%$search%')
        ORDER BY authors.author_name ASC";

            $authors = DB::select($sql);
            $numAuthors = count($authors);
            $numPages = ceil($numAuthors / $perPage);

            $sql = "SELECT
    authors.id,
    authors.author_name,
    authors.created_at,
    authors.updated_at
    FROM authors
    WHERE (authors.id LIKE '%$search%' OR
        authors.author_name LIKE '%$search%')
       ORDER BY authors.id DESC
        LIMIT $offset,$perPage";
            $authors = DB::select($sql);
            return response()->json($authors, 200)->withHeaders(['numAuthors' => $numAuthors, 'numPages' => $numPages, 'page' => $page, 'perPage' => $perPage, 'display' => 'Mostrando del ' . ($offset + 1) . ' al ' . ($offset + $perPage)]);
        } else {
            $sql = "SELECT
    authors.id,
    authors.author_name,
    authors.created_at,
    authors.updated_at
    FROM authors
        ORDER BY authors.id ASC
        LIMIT $perPage
        OFFSET $offset";

            $authors = DB::select($sql);
            return response()->json($authors, 200)->withHeaders(['numPages' => 10]);
        }
    }


}
