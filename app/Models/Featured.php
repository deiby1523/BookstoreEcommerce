<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Featured extends Model
{
    use HasFactory;

    protected $table = 'featured';
    public $incrementing = true;

//    protected $fillable = [
//        'book_id',
//        'type_id'
//    ];

    protected $guarded = [];

    public function FeaturedType(): BelongsTo
    {
        return $this->belongsTo(FeaturedType::class);
    }

    public function book(): hasOne
    {
        return $this->hasOne(Book::class);
    }


}
