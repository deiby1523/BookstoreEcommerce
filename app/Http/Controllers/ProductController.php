<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $categories = Category::where('category_type', 1)->get();
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
                'product_discount' => $request->product_discount,
                'active' => ($request->active == 'on'),
                'subcategory_id' => $request->subcategory_id,
                'product_image_url' => 'img/products/' . $imageName,
                'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('product.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function view($id): View
    {
        $product = Product::findOrFail($id);
        $bookCategories = Category::where('category_type', 0)->get();
        $productCategories = Category::where('category_type', 1)->get();
        return view('product.view', compact('product', 'bookCategories','productCategories'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $subcategory = Subcategory::findOrFail($product->subcategory_id);
        $category = Category::findOrFail($subcategory->category_id);
        $categories = Category::where('category_type', 1)->get();
        return view('product.edit', compact('product','categories','subcategory','category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required | max:60',
            'category_id' => 'required|min:1|integer',
            'subcategory_id' => 'required|min:1|integer',
            'product_price' => 'required|min:0',
            'product_discount' => 'integer|max:100'
        ]);

        $product = Product::findOrFail($id);

        $id = 0;
        $model = Product::latest('id')->first();

        if ($model == null) {
            $id = 1;
        } else {
            $id = intval($model->id) + 1;
        }

        if ($request->hasFile("product_image")) {
            if (File::exists(public_path($product->product_image_url))) {
                File::delete(public_path($product->product_image_url));
            }

            $image = $request->file("product_image");
            $imageName = Str::slug($request->product_name) . "_" . $id . "_1" . "." . $image->guessExtension();
            $route = public_path("img/products/");

            //$image->move($route, $imageName);
            copy($image->getRealPath(), $route . $imageName);

            $product->update([
                'product_name' => $request->product_name,
                'subcategory_id' => $request->subcategory_id,
                'product_description' => $request->product_description,
                'product_image_url' => 'img/products/' . $imageName,
                'product_price' => $request->product_price,
                'product_discount' => $request->product_discount,
                'active' => ($request->active == 'on'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);

        } else {
            $product->update([
                'product_name' => $request->product_name,
                'subcategory_id' => $request->subcategory_id,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'product_stock' => $request->product_stock,
                'product_discount' => $request->product_discount,
                'active' => ($request->active == 'on'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('product.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function search2(Request $request): View
    {
        $filters = $request;
//        dump($request);
//        dump($request['min_price'], $request['max_price']);

        // Obtener categorías y subcategorías seleccionadas
        $categorySelected = $filters['category'] ? Category::find($filters['category']) : null;
        $subcategorySelected = $filters['subcategory'] ? Subcategory::find($filters['subcategory']) : null;

        // Construir la consulta usando Eloquent para mayor seguridad y legibilidad
        $query = Product::select([
            'products.id',
            'products.product_name',
            'products.product_price',
            // 'products.product_price',
            'products.product_discount',
            'products.product_image_url',
            'products.updated_at',
            'categories.category_name',
            'subcategories.subcategory_name'
        ])
            ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
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
            $query->whereRaw('(products.product_price * (1 - products.product_discount / 100)) >= ?', [$filters['min_price']]);
        }

        if ($filters['max_price']) {
            $query->whereRaw('(products.product_price * (1 - products.product_discount / 100)) <= ?', [$filters['max_price']]);
        }

        // Ordenación
        switch ($filters['sort'] ?? 'newest') {
            case 'price_asc':
                $query->orderByRaw('(products.product_price * (1 - products.product_discount / 100)) asc');
                break;
            case 'price_desc':
                $query->orderByRaw('(products.product_price * (1 - products.product_discount / 100)) desc');
                break;
            case 'newest':
                $query->orderBy('products.updated_at', 'desc');
                break;
            default:
                // Orden por relevancia (podrías implementar tu lógica aquí)
                $query->orderBy('products.updated_at', 'desc');
        }

        // Paginación en lugar de límite fijo
        $products = $query->paginate(12); // 12 items por página

        // Obtener todas las categorías para los filtros
        $bookCategories = Category::where('category_type', 0)->with('subcategories')->get();
        $productCategories = Category::where('category_type', 1)->get();

        return view('product.search', [
            'bookCategories' => $bookCategories,
            'productCategories' => $productCategories,
            'categorySelected' => $categorySelected,
            'subcategorySelected' => $subcategorySelected,
            'products' => $products,
            'filters' => $filters // Pasar los filtros aplicados a la vista
        ]);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Producto eliminado exitosamente.');
    }

    public function searchSelect(Request $request): JsonResponse
    {
        $search = $request->search;
        $page = $request->page;
        $perPage = 20;
        $offset = ($page-1) * $perPage;

        if ($search != " ") {
            $sql = "SELECT
    products.id,
    products.product_name,
    products.product_price,
    products.active,
    categories.category_name,
    subcategories.subcategory_name
    FROM products, categories, subcategories
    WHERE products.subcategory_id = subcategories.id
    AND subcategories.category_id = categories.id
    AND(
        products.product_name LIKE '%$search%' OR
        products.id LIKE '%$search%' )
        ORDER BY products.product_name ASC";

            $products = DB::select($sql);
            $numProducts = count($products);
            $numPages = ceil($numProducts / $perPage);

            $sql = "SELECT
    products.id,
    products.product_name,
    products.product_price,
    products.active,
    categories.category_name,
    subcategories.subcategory_name
    FROM products, categories, subcategories
    WHERE products.subcategory_id = subcategories.id
    AND subcategories.category_id = categories.id
    AND(
        products.product_name LIKE '%$search%' OR
        products.id LIKE '%$search%')
        ORDER BY products.created_at DESC
        LIMIT $offset,$perPage";
            $products = DB::select($sql);
            return response()->json($products, 200)->withHeaders(['numProducts' => $numProducts,'numPages' => $numPages,'page' => $page, 'perPage' => $perPage,'display'=>'Mostrando del '.($offset+1).' al '.($offset+$perPage)]);
        } else {
            $sql = "SELECT
    products.id,
    products.product_name,
    products.product_price,
    products.active,
    categories.category_name,
    subcategories.subcategory_name
    FROM products, categories, subcategories
    WHERE products.subcategory_id = subcategories.id
    AND subcategories.category_id = categories.id
        ORDER BY products.created_at DESC
        LIMIT $perPage
        OFFSET $offset";

            $products = DB::select($sql);
            return response()->json($products, 200)->withHeaders(['numPages' => 10]);
        }
    }
}
