<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductDashboardController extends Controller
{
    public function index()
    {
        $categories = Category::where('category_type', 1)->get();
        $subcategories = Subcategory::all();
        return view('products_dashboard', compact('categories','subcategories'));
    }
}
