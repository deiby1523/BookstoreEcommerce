<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected static function boot()
    {
        parent::boot();

        // Escuchamos el evento "deleting" del modelo Banner
        static::deleting(function ($banner) {
            // Delete the banner image
            $imagePath = public_path($banner->banner_image_url);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        });
    }

}
