<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }


    public function save(Request $request)
    {
        $request->validate([
            'product_name' => 'required | max:60',
            'category_id' => 'required|min:1|integer',
            'subcategory_id' => 'required|min:1|integer',
            'product_image' => 'required|image',
            'product_price' => 'required|min:0',
            'product_stock' => 'required|integer',
            'product_discount' => 'integer|max:100'
        ]);

        $id = 0;
        $model = Product::latest('id')->first();

        if ($model == null) {
            $id = 1;
        } else {
            $id = intval($model->id) + 1;
        }

        // image upload script (edit)
        if ($request->hasFile("product_image")) {
            $image = $request->file("product_image");
            $imageName = Str::slug($request->product_name) . "_". $id. "." . $image->guessExtension();
            $route = public_path("img/products/");

            //$image->move($route, $imageName);
            copy($image->getRealPath(), $route . $imageName);

            Product::create([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'product_stock' => $request->product_stock,
                'product_discount' => $request->product_discount,
                'subcategory_id' => $request->subcategory_id,
                'product_image_url' => 'img/products/' . $imageName,
                'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            // Agrega más validaciones según sea necesario
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            // Completa con otros campos del producto
        ]);

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
