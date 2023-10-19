<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::all();
        return view('author.index',compact('authors'));
    }

    public function create() {
        return view('author.create');
    }

    public function save(Request $request) {
        $request->validate([
            'author_name' => 'required'
        ]);

        Author::create([
            'author_name' => $request->author_name,
            'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('author.index')->with('succes','Autor creado exitosamente.');
    }
//
//    public function show($id) {
//
//        $author = Author::findOrFail($id);
//
//        return view('author.show',compact($author));
//    }
//
//    public function edit($id) {
//
//        $author = Author::findOrFail($id);
//
//        return view('author.edit',compact('author'));
//    }
//
//    public function update(Request $request,$id) {
//        $request->validate([
//            'auhtor_name' => 'min:3|required'
//        ]);
//
//        $author = Author::findOrFail($id);
//
//        $author->update([
//            'author_name' => $request->author_name,
//            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
//        ]);
//
//        return redirect()->route('author.index')->with('success','Autor actualizado correctamente');
//    }
//
//    public function delete($id) {
//        $author = Author::findOrFail($id);
//        $author->delete();
//
//        return redirect()->route('author.index')->with('success',"Autor eliminado correctamente");
//    }


}
