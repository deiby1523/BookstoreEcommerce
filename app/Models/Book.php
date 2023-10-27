<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_isbn',
        'book_title',
        'author_id',
        'publisher_id',
        'subcategory_id',
        'book_publication_date',
        'book_description'];

    public function author()
    {
        return $this->hasOne(Author::class);
    }

    public function pusblisher()
    {
        return $this->hasOne(Publisher::class);
    }

    public function category()
    {
        return $this->hasOneThrough(Category::class, Subcategory::class);
    }

    public function subcategory()
    {
        return $this->hasOne(Subcategory::class);
    }
}
