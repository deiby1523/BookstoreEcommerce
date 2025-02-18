<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Facades\File;

class Product extends Model
{
    protected $guarded = [];

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

//    public function category(): HasOneThrough // TODO: Check this function later (edit)
//    {
//        return $this->hasOneThrough(
//            Category::class,
//            Subcategory::class,
//            'category_id', // Foreign key on the subcategory table
//            'id', // Foreign key on the country table...
//            'id', // Local key on the category table...
//            'category_id' // Local key on the product table...
//        );
//    }

    protected static function boot(): void
    {
        parent::boot();

        // Escuchamos el evento "deleting" del modelo Product
        static::deleting(function ($product) {

            // Delete the image associated with the product
            $imagePath = public_path($product->product_image_url);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        });
    }

}
