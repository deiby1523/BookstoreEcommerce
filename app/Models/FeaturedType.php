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



}
