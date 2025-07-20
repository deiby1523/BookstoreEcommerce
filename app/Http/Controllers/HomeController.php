<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\FeaturedType;
use App\Models\Section;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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

    public function contactUs() {
        $bookCategories = Category::where('category_type', 0)->get();
        $productCategories = Category::where('category_type', 1)->get();
        return view('contact_us',compact('bookCategories','productCategories'));
    }

    public function contactUsSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'newsletter' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('danger','Ocurrió un error al enviar el formulario');
        }

        // Guardar en base de datos
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'newsletter' => $request->has('newsletter'),
        ]);

        return redirect()->route('contact-us')
            ->with('success', '¡Gracias por tu mensaje! Lo hemos recibido correctamente.');
    }
}
