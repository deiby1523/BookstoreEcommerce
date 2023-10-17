<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        // Obtener productos en el carrito del usuario actual
        $cartItems = ShoppingCart::where('usuario_id', Auth::id())->get();

        return view('cart.index', compact('cartItems'));
    }

    public function addToCart($productId)
    {
        // Lógica para agregar un producto al carrito
    }

    public function updateCart(Request $request, $cartId)
    {
        // Lógica para actualizar la cantidad de un producto en el carrito
    }

    public function removeFromCart($cartId)
    {
        // Lógica para eliminar un producto del carrito
    }
}
