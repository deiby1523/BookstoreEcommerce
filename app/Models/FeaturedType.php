<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedType extends Model
{
    use HasFactory;

    protected $fillable = [
        'featured_type_name',
        'featured_type_description',
        'active'
    ];

    public function books()
    {
//        return $this->hasManyThrough(Book::class, Featured::class);
        return $this->hasManyThrough(
            Book::class,
            Featured::class,
            'type_id', // Foreign key on the types table...
            'id', // Foreign key on the items table...
            'id', // Local key on the users table...
            'book_id'); // Local key on the categories table...
    }



}
