<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected static function boot()
    {
        parent::boot();

        // Escuchamos el evento "deleting" del modelo Category
        static::deleting(function ($section) {

            // Delete the image associated with the section
            $image1Path = public_path($section->section_image_1_url);

            if (File::exists($image1Path)) {
                File::delete($image1Path);
            }

            $image2Path = public_path($section->section_image_2_url);

            if (File::exists($image2Path)) {
                File::delete($image2Path);
            }

        });
    }

}
