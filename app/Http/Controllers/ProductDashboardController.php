<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDashboardController extends Controller
{
    public function index()
    {
        $nCategories = Category::where('category_type', 1)->get()->count();
        $sql = "SELECT count(*) FROM categories,subcategories WHERE subcategories.category_id = categories.id AND categories.category_type = 1";
        $nSubCategories = DB::select($sql);
        $nProducts = Product::count();

        return view('products_dashboard', compact('nCategories','nSubCategories','nProducts'));
    }
}
