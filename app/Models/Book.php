<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Facades\File;

class Book extends Model
{
    protected $fillable = [
        'book_isbn',
        'book_title',
        'author_id',
        'publisher_id',
        'subcategory_id',
        'book_number_pages',
        'book_publication_date',
        'book_description',
        'book_image_url',
        'book_price',
        'book_stock',
        'book_discount'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function category(): HasOneThrough // TODO: Check this function later (edit)
    {
        return $this->hasOneThrough(
            Category::class,
            Subcategory::class,
            'category_id', // Foreign key on the subcategory table
            'id', // Foreign key on the country table...
            'id', // Local key on the category table...
            'category_id' // Local key on the product table...
        );
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        // Escuchamos el evento "deleting" del modelo Book
        static::deleting(function ($book) {

            // Delete the image associated with the book
            $imagePath = public_path($book->book_image_url);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        });
    }
}
