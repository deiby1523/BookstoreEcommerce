<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_description'];

    public function subcategories() {
        return $this->hasMany(Subcategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function books() {
        return $this->hasMany(Book::class);
    }
}
