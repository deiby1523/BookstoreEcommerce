<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    public function toggleFavorite(Book $book)
    {
        $user = Auth::user();
        
        if($user->favoriteBooks()->where('book_id', $book->id)->exists()) {
            $user->favoriteBooks()->detach($book);
            return response()->json(['status' => 'removed']);
        } else {
            $user->favoriteBooks()->attach($book);
            return response()->json(['status' => 'added']);
        }
    }

    public function checkFavorite(Book $book)
    {
        $isFavorite = Auth::user()->favoriteBooks()
                            ->where('book_id', $book->id)
                            ->exists();
        
        return response()->json(['is_favorite' => $isFavorite]);
    }

    public function userFavorites()
    {
        $favoriteBooks = Auth::user()->favoriteBooks()
                        ->with(['author', 'publisher','subcategory'])
                        ->get();
                        $bookCategories = Category::where('category_type', 0)->get();
        $productCategories = Category::where('category_type', 1)->get();
        
                        return view('profile.favoriteBooks', compact('favoriteBooks','bookCategories','productCategories'));
    }
}