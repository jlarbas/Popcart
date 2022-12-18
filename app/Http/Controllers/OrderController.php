<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderList;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index(Order $order, Restaurant $restaurant){
        if(auth()->user()->role != 1 && auth()->user()->restaurant_id != $restaurant->id){
            abort(404);    
            }
        return view ('orders.index',compact('restaurant','order'));
    }

    public function show(Restaurant $restaurant, Order $order, OrderList $orderlist,Product $product){
    
    return view ('orders.show',compact('order','orderlist','product'));
    }

    public function print(Restaurant $restaurant, Order $order, OrderList $orderlist,Product $product){
        $dummy = $order->restaurant_id;
        $name = Restaurant::find($dummy);
        
        return view ('orders.print',compact('order','orderlist','product','dummy','name'));
        }

    public function destroyOrder(Restaurant $restaurant, Order $order){
        
        if($order->restaurant_id == $restaurant->id){
            $order->delete();
            
        }
        return redirect()->route('orders',$restaurant->id)->with('message','Order cancelled successfully!');
    }

    public function update(Request $request,Order $order){
        
        $request->validate([
            'payment'=>'required',
        ]);

        $vat = $order->total * 0.12;
        $payment = $request->payment;
        $change = $payment - $order->total;
        
        
        //If the form has a file attached then store the file in the db
        $order->payment = $payment;
        $order->vat = $vat;
        $order->status = "completed";
        $order->change = $change;
        $order->save();
        //Stores the entry to the db 
        
        

        return redirect()->route('printOrder',$order->id)->with('message','Restaurant updated successfully!');
    }


}
