<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\FeaturedType;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $sql = 'SELECT
    books.id,
    books.book_isbn,
    books.book_title,
    books.book_price,
    books.book_image_url,
    books.book_discount,
    authors.author_name,
    publishers.publisher_name,
    categories.category_name,
    subcategories.subcategory_name
    FROM books, authors, publishers, categories, subcategories
    WHERE books.author_id = authors.id
    AND books.publisher_id = publishers.id
    AND books.subcategory_id = subcategories.id
    AND subcategories.category_id = categories.id
    ORDER BY books.id DESC
    LIMIT 10';
        $latestBooks = DB::select($sql);

        $sql = 'SELECT * FROM banners WHERE active = 1';

        $banners = DB::select($sql);

        $featuredBooks = FeaturedType::all()->sortBy('updated_at');

        $sql = 'SELECT * FROM sections WHERE active = 1';

        $sections = DB::select($sql);

        $bookCategories = Category::where('category_type', 0)->get();
        $productCategories = Category::where('category_type', 1)->get();

        return view('home', compact('latestBooks', 'bookCategories','productCategories', 'featuredBooks', 'banners', 'sections'));
    }

    public function aboutUs() {
        $bookCategories = Category::where('category_type', 0)->get();
        $productCategories = Category::where('category_type', 1)->get();
        return view('about_us',compact('bookCategories','productCategories'));
    }
}
