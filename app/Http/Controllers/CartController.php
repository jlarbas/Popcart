<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index(Restaurant $restaurant, Cart $cart, Product $product){
        return view ('carts.index',compact('restaurant','cart','product'));
    }
}
