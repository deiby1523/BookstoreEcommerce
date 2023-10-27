<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $fillable = ['author_name'];

    // relations

    public function books() {
        $this->hasMany(Book::class);
    }


}
