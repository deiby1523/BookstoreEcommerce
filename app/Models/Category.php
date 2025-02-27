<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_description', 'category_image_url','category_type'];

    public function subcategories() {
        return $this->hasMany(Subcategory::class);
    }

    public function books() {
        return $this->hasMany(Book::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Escuchamos el evento "deleting" del modelo Category
        static::deleting(function ($category) {

            // Delete the image associated with the category
            $imagePath = public_path($category->category_image_url);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        });
    }
}
