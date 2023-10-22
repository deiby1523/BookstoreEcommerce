<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name("login.google");
Route::get('/login/callback', [GoogleLoginController::class, 'handleGoogleCallback']);


Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [ShoppingCartController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/update/{cartId}', [ShoppingCartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{cartId}', [ShoppingCartController::class, 'removeFromCart'])->name('cart.remove');


Route::middleware('UserAdmin')->group(function () {
    // Dashboards
    Route::get('/dashboard/books',[BookDashboardController::class, 'index'])->name('dashboard.books');

    // Categories
    Route::get('/category',[CategoryController::class,'index'])->name('category.index');
    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/category/save',[CategoryController::class,'save'])->name('category.save');
    Route::get('/category/edit/{category}',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('/category/update/{category}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/show/{category}',[CategoryController::class,'show'])->name('category.show');
    Route::delete('/category/delete/{category}',[CategoryController::class,'delete'])->name('category.delete');

    // Subcategories
    Route::get('/subcategory',[SubcategoryController::class,'index'])->name('subcategory.index');
    Route::get('/subcategory/create',[SubcategoryController::class,'create'])->name('subcategory.create');
    Route::post('/subcategory/save',[SubcategoryController::class,'save'])->name('subcategory.save');
    Route::get('/subcategory/edit/{category}',[SubcategoryController::class,'edit'])->name('subcategory.edit');
    Route::put('/subcategory/update/{category}',[SubcategoryController::class,'update'])->name('subcategory.update');
    Route::get('/subcategory/show/{category}',[SubcategoryController::class,'show'])->name('subcategory.show');
    Route::delete('/subcategory/delete/{category}',[SubcategoryController::class,'delete'])->name('subcategory.delete');

    // Authors
    Route::get('/author',[AuthorController::class,'index'])->name('author.index');
    Route::get('/author/create',[AuthorController::class,'create'])->name('author.create');
    Route::post('/author/save',[AuthorController::class,'save'])->name('author.save');
    Route::get('/author/edit/{author}',[AuthorController::class,'edit'])->name('author.edit');
    Route::put('/author/update/{author}',[AuthorController::class,'update'])->name('author.update');
    Route::get('/author/show/{author}',[AuthorController::class,'show'])->name('author.show');
    Route::delete('/author/delete/{author}',[AuthorController::class,'delete'])->name('author.delete'); // It is obligatory to call destroy

    // Publishers
    Route::get('/publisher',[PublisherController::class,'index'])->name('publisher.index');
    Route::get('/publisher/create',[PublisherController::class,'create'])->name('publisher.create');
    Route::post('/publisher/save',[PublisherController::class,'save'])->name('publisher.save');
    Route::get('/publisher/show/{publisher}',[PublisherController::class,'show'])->name('publisher.show');

});


require __DIR__.'/auth.php';
