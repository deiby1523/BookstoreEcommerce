<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['publisher_name'];

    // relations
    public function books() {
        return $this->hasMany(Book::class);
    }
}
