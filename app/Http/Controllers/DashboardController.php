<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Banner;
use App\Models\Book;
use App\Models\Category;
use App\Models\FeaturedType;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\Section;
use App\Models\Visit;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        // ----------------------------------------------------------------------------------------------------------------------------------------------
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $visits = Visit::whereBetween('created_at', [$startDate, $endDate])->get()->groupBy(function ($visit) {
                return Carbon::parse($visit->created_at)->format('Y-m-d');
            });

        // Preparar los datos
        $visitsLabels = [];
        $visitsData = [];

        $period = CarbonPeriod::create($startDate, $endDate);

        foreach ($period as $date) {
            $day = $date->format('Y-m-d');
            $visitsLabels[] = $day;
            $visitsData[] = isset($visits[$day]) ? count($visits[$day]) : 0;
        }


        // ----------------------------------------------------------------------------------------------------------------------------------------------

        // Tamaño de la base de datos
        $size = DB::select("
        SELECT ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS size_mb
        FROM information_schema.tables
        WHERE table_schema = ?
    ", [env('DB_DATABASE')]);

        $databaseSize = $size[0]->size_mb ?? 0;

        function folderSize($path)
        {
            $size = 0;

            foreach (File::allFiles($path) as $file) {
                $size += $file->getSize();
            }

            return $size;
        }

        $bookImagesSizeBytes = folderSize('img/books');
        $bookImages = round($bookImagesSizeBytes / 1024 / 1024, 2);

        $productImagesSizeBytes = folderSize('img/products');
        $productImages = round($productImagesSizeBytes / 1024 / 1024, 2);

        $categoryImagesSizeBytes = folderSize('img/categories');
        $categoryImages = round($categoryImagesSizeBytes / 1024 / 1024, 2);

        $bannerImagesSizeBytes = folderSize('img/banners');
        $bannerImages = round($bannerImagesSizeBytes / 1024 / 1024, 2);

        $sectionImagesSizeBytes = folderSize('img/sections');
        $sectionImages = round($sectionImagesSizeBytes / 1024 / 1024, 2);

        $otherSpaceSizeBytes = folderSize('*');
        $otherSpace = round($otherSpaceSizeBytes / 1024 / 1024, 2);
        $otherSpace -= $bookImages + $productImages + $categoryImages + $bannerImages + $sectionImages;

        $totalSize = $bookImages + $productImages + $categoryImages + $bannerImages + $sectionImages + $otherSpace;

        $storageLabels = ['Base de Datos', 'Imágenes de Libros','Imágenes de Productos','Imágenes de Categorías','Imágenes de Banners','Imágenes de Secciones','Otro'];
        $storageData = [$databaseSize,$bookImages,$productImages,$categoryImages,$bannerImages,$sectionImages,$otherSpace];

        // ----------------------------------------------------------------------------------------------------------------------------------------------

        $nPCategories = Category::where('category_type', 1)->get()->count();
        $nPSubcategories = DB::table('categories')->join('subcategories', 'subcategories.category_id', '=', 'categories.id')->where('categories.category_type', 1)->count();
        $nProducts = Product::count();

        $nBCategories = Category::where('category_type', 0)->get()->count();
        $nBSubcategories = DB::table('categories')->join('subcategories', 'subcategories.category_id', '=', 'categories.id')->where('categories.category_type', 0)->count();
        $nBooks = Book::count();
        $nAuthors = Author::count();
        $nPublishers = Publisher::count();

        $nFeatured_types = FeaturedType::count();
        $nBanners = Banner::count();
        $nSections = Section::count();

        return view('dashboard', compact('totalSize','nPCategories', 'nPSubcategories', 'nProducts', 'nBCategories', 'nBSubcategories', 'nBooks', 'nAuthors', 'nPublishers', 'nFeatured_types', 'nBanners', 'nSections', 'visitsLabels', 'visitsData','storageLabels','storageData'));
    }

}
