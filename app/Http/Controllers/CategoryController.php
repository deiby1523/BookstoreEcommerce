<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'category_image' => 'required | image'
            // Agrega más validaciones según sea necesario
        ]);


        // script para subir la imagen
        if($request->hasFile("category_image")) {

            $image = $request->file("category_image");
            $imageName = Str::slug($request->category_name) . "." . $image->guessExtension();
            $route = public_path("img/categories/");

            //$image->move($route, $imageName);
            copy($image->getRealPath(),$route.$imageName);

            Category::create([
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
                'category_image_url' => 'img/categories/' . $imageName,
                'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        } else {
            return redirect()->route('category.index')->with('danger', 'Error al subir la imagen');
        }

        return redirect()->route('category.index')->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('category.show', compact('category','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required'
            // Agrega más validaciones según sea necesario
        ]);

        $category = Category::findOrFail($id);

        if($request->hasFile("category_image")) {
            if(File::exists(public_path($category->category_image_url))) {
                File::delete(public_path($category->category_image_url));
            }

            $image = $request->file("category_image");
            $imageName = Str::slug($request->category_name) . "." . $image->guessExtension();
            $route = public_path("img/categories/");

            //$image->move($route, $imageName);
            copy($image->getRealPath(),$route.$imageName);

            $category->update([
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
                'category_image_url' => 'img/categories/' . $imageName,
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);

        } else {
            $category->update([
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('category.index')->with('success', 'Categoria actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
