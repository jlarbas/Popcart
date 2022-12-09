<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderList;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(Order $order, Restaurant $restaurant){
        return view ('orders.index',compact('restaurant','order'));
    }

    public function show(Order $order, OrderList $orderlist){
    
    return view ('orders.show',compact('order','orderlist'));
    }


}
