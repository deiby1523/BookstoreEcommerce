<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    public function index() {
        $publishers = Publisher::all();
        return view('publisher.index',compact('publishers'));
    }

    public function create() {
        return view('publisher.create');
    }

    public function save(Request $request) {
        $request->validate([
            'publisher_name' => 'required'
        ]);

        Publisher::create([
            'publisher_name' => $request->publisher_name,
            'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('publisher.index')->with('success','Editorial creada exitosamente');
    }

    public function show($id) {
        $publisher = Publisher::findOrFail($id);

        return view('publisher.show',compact('publisher'));
    }

    public function edit($id) {
        $publisher = Publisher::findOrFail($id);

        return view('publisher.edit',compact('publisher'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'publisher_name' => 'required'
        ]);

        $publisher = Publisher::findOrFail($id);

        $publisher->update([
            'publisher_name' => $request->publisher_name,
            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('publisher.index')->with('success','Editorial actualizada correctamente');
    }

    public function delete($id) {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return redirect()->route('publisher.index')->with('success','Editorial eliminada exitosamente.');
    }

    public function searchSelect(Request $request)
    {
        $sql = "SELECT publishers.id, publishers.publisher_name FROM publishers WHERE publisher_name LIKE '%$request->search%' LIMIT 5";
        $publishers = DB::select($sql);
        return response()->json($publishers,200);
    }

    public function searchIndex(Request $request): JsonResponse
    {
        $search = $request->search;
        $page = $request->page;
        $perPage = 20;
        $offset = ($page - 1) * $perPage;

        if ($search != " ") {
            $sql = "SELECT
    publishers.id,
    publishers.publisher_name,
    publishers.created_at,
    publishers.updated_at
    FROM publishers
    WHERE (publishers.id LIKE '%$search%' OR
        publishers.publisher_name LIKE '%$search%')
        ORDER BY publishers.publisher_name ASC";

            $publishers = DB::select($sql);
            $numPublishers = count($publishers);
            $numPages = ceil($numPublishers / $perPage);

            $sql = "SELECT
    publishers.id,
    publishers.publisher_name,
    publishers.created_at,
    publishers.updated_at
    FROM publishers
    WHERE (publishers.id LIKE '%$search%' OR
        publishers.publisher_name LIKE '%$search%')
       ORDER BY publishers.id DESC
        LIMIT $offset,$perPage";
            $publishers = DB::select($sql);
            return response()->json($publishers, 200)->withHeaders(['numPublishers' => $numPublishers, 'numPages' => $numPages, 'page' => $page, 'perPage' => $perPage, 'display' => 'Mostrando del ' . ($offset + 1) . ' al ' . ($offset + $perPage)]);
        } else {
            $sql = "SELECT
    publishers.id,
    publishers.publisher_name,
    publishers.created_at,
    publishers.updated_at
    FROM publishers
        ORDER BY publishers.id ASC
        LIMIT $perPage
        OFFSET $offset";

            $publishers = DB::select($sql);
            return response()->json($publishers, 200)->withHeaders(['numPages' => 10]);
        }
    }



}
