<?php

namespace App\Models;

use Znck\Eloquent\Traits\BelongsToThrough;
use Illuminate\Database\Eloquent\Model;

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
        'book_description'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function category()
    {
        return $this->hasManyThrough(
            Category::class,
            Subcategory::class,
            'category_id', // Foreign key on the subcategory table
            'id', // Foreign key on the country table...
            'id', // Local key on the category table...
            'category_id' // Local key on the product table...
        );
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
