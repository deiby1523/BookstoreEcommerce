<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = ['usuario_id', 'producto_id', 'cantidad', 'precio_unitario'];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'producto_id');
    }
}
