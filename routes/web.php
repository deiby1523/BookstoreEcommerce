<?php

use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeaturedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterfaceDashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'show'])->name('home');


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
    Route::get('/dashboard/books', [BookDashboardController::class, 'index'])->name('dashboard.books');
    Route::get('/dashboard/interface', [InterfaceDashboardController::class, 'index'])->name('dashboard.interface');
    Route::get('/dashboard/products',[ProductDashboardController::class, 'index'])->name('dashboard.products');

    // Featured
    Route::get('/featured', [FeaturedController::class, 'index'])->name('featured.index');
    Route::get('/featured/create',[FeaturedController::class,'create'])->name('featured.create');
    Route::post('/featured/save', [FeaturedController::class, 'save'])->name('featured.save');
    Route::get('/featured/edit/{featured}', [FeaturedController::class, 'edit'])->name('featured.edit');
    Route::put('/featured/update/{featured}',[FeaturedController::class,'update'])->name('featured.update');
    Route::delete('/featured/delete/{featured}', [FeaturedController::class, 'delete'])->name('featured.delete');
    Route::get('/featured/show/{featured}',[FeaturedController::class,'show'])->name('featured.show');
    Route::post('/featured/searchBook', [FeaturedController::class, 'searchBook'])->name('featured.searchBook');
    Route::post('/featured/addBook', [FeaturedController::class, 'addBook'])->name('featured.addBook');
    Route::delete('/featured/delBook/{featured}/{book}',[FeaturedController::class,'delBook'])->name('featured.delBook');

    // Banners
    Route::get('/banner',[BannerController::class, 'index'])->name('banner.index');
    Route::get('/banner/create',[BannerController::class,'create'])->name('banner.create');
    Route::post('/banner/save', [BannerController::class, 'save'])->name('banner.save');
    Route::get('/banner/edit/{banner}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/banner/update/{banner}',[BannerController::class,'update'])->name('banner.update');
    Route::delete('/banner/delete/{banner}', [BannerController::class, 'delete'])->name('banner.delete');
    Route::get('/banner/show/{banner}',[BannerController::class,'show'])->name('banner.show');

    // Sections
    Route::get('/section', [SectionController::class,'index'])->name('section.index');
    Route::get('/section/create',[SectionController::class,'create'])->name('section.create');
    Route::post('/section/save', [SectionController::class,'save'])->name('section.save');
    Route::get('/section/edit/{section}', [SectionController::class,'edit'])->name('section.edit');
    Route::put('/section/update/{section}', [SectionController::class,'update'])->name('section.update');
    Route::delete('/section/delete/{section}', [SectionController::class,'delete'])->name('section.delete');
    Route::get('/section/show/{section}',[SectionController::class,'show'])->name('section.show');

    // Categories
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/save', [CategoryController::class, 'save'])->name('category.save');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/show/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::delete('/category/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');

    // Subcategories
    Route::get('/subcategory', [SubcategoryController::class, 'index'])->name('subcategory.index');
    Route::get('/subcategory/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/subcategory/save', [SubcategoryController::class, 'save'])->name('subcategory.save');
    Route::get('/subcategory/edit/{category}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::put('/subcategory/update/{category}', [SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/show/{category}', [SubcategoryController::class, 'show'])->name('subcategory.show');
    Route::delete('/subcategory/delete/{category}', [SubcategoryController::class, 'delete'])->name('subcategory.delete');

    // Authors
    Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
    Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/author/save', [AuthorController::class, 'save'])->name('author.save');
    Route::get('/author/edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::put('/author/update/{author}', [AuthorController::class, 'update'])->name('author.update');
    Route::get('/author/show/{author}', [AuthorController::class, 'show'])->name('author.show');
    Route::delete('/author/delete/{author}', [AuthorController::class, 'delete'])->name('author.delete');
    Route::get('/author/delete/{author}', [AuthorController::class, 'delete'])->name('author.delete');
    Route::POST('/author/search', [AuthorController::class, 'searchSelect'])->name('author.searchSelect');
    Route::get('/author/search/{search}', [AuthorController::class, 'searchIndex'])->name('author.searchIndex');

    // Publishers
    Route::get('/publisher', [PublisherController::class, 'index'])->name('publisher.index');
    Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
    Route::post('/publisher/save', [PublisherController::class, 'save'])->name('publisher.save');
    Route::get('/publisher/edit/{publisher}', [PublisherController::class, 'edit'])->name('publisher.edit');
    Route::put('/publisher/update/{publisher}', [PublisherController::class, 'update'])->name('publisher.update');
    Route::get('/publisher/show/{publisher}', [PublisherController::class, 'show'])->name('publisher.show');
    Route::delete('/publisher/delete/{publisher}', [PublisherController::class, 'delete'])->name('publisher.delete');
    Route::get('/publisher/delete/{publisher}', [PublisherController::class, 'delete'])->name('publisher.delete');
    Route::POST('/publisher/search', [PublisherController::class, 'searchSelect'])->name('publisher.searchSelect');
    Route::get('/publisher/search/{search}', [PublisherController::class, 'searchIndex'])->name('author.searchIndex');

    // Books
    Route::get('/book', [BookController::class, 'index'])->name('book.index');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book/save', [BookController::class, 'save'])->name('book.save');
    Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/update/{book}', [BookController::class, 'update'])->name('book.update');
    Route::get('/book/show/{book}',[BookController::class, 'show'])->name('book.show');
    Route::delete('/book/delete/{book}', [BookController::class, 'delete'])->name('book.delete');
    Route::get('/book/delete/{book}', [BookController::class, 'delete'])->name('book.delete');
    Route::get('/book/search/{search}', [BookController::class, 'searchSelect'])->name('book.searchSelect');    // TODO: cambiar el nombre de esta ruta

    // Products
    Route::get('/product',[ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class, 'create'])->name('product.create');
    Route::post('/product/save',[ProductController::class, 'save'])->name('product.save');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::delete('/product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/product/search/{search}', [ProductController::class, 'searchSelect'])->name('product.searchSelect');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// TODO: Arreglar esta mrd
// V.2 Fix this shit
    Route::POST('/product/search', [BookController::class, 'searchNav'])->name('book.searchNav');

//public books
Route::get('/book/view/{book}',[BookController::class,'view'])->name('book.view');
Route::get('/book/search',[BookController::class,'search'])->name('book.search');
Route::POST('/book/search',[BookController::class,'search2'])->name('book.search2');

require __DIR__ . '/auth.php';
