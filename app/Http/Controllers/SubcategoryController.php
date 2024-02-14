<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('subcategory.index',compact('categories'));
    }

    public function create() {
        $categories = Category::all();
        return view('subcategory.create',compact('categories'));
    }

    public function save(Request $request) {
        $request->validate([
            'subcategory_name' => 'required',
            'subcategory_description' => 'required',
            'category_id' => 'integer|required'
        ]);

        Subcategory::create([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_description' => $request->subcategory_description,
            'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('subcategory.index')->with('success','subcategoria creada exitosamente.');
    }

    public function show($id) {
        $subcategory = Subcategory::findOrFail($id);
        $category = Category::findOrFail($subcategory->category_id);
        return view('subcategory.show',compact('subcategory','category'));
    }

    public function edit($id) {
        $subcategory = Subcategory::findOrFail($id);
        $category = Category::findOrFail($subcategory->category_id);
        $categories = Category::all();

        return view('subcategory.edit',compact('subcategory','category','categories'));
    }

    public function update(Request $request,$id) {
        $request->validate([
            'subcategory_name' => 'required',
            'subcategory_description' => 'required',
            'category_id' => 'integer|required'

        ]);

        $subcategory = Subcategory::findOrFail($id);

        $subcategory->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_description' => $request->subcategory_description,
            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('subcategory.index')->with('success','Subategoría actualizada exitosamente.');
    }

    public function delete($id) {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('subcategory.index')->with('success','Subategoría eliminada exitosamente.');
    }

}
