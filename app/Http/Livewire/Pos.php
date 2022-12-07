<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderList;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;

class Pos extends Component
{
    public $restaurant, $quantityCount = 1, $cart,$totalPrice = 0,$restaurantId = 0;
    
    public function render()
    {
        $this->cart = Cart::latest()->get();
        return view('livewire.cart',[
            'restaurant' => $this->restaurant,
            'cart' => $this->cart,
            'product' => $this->product
            
        ]);
    }

    
    public function mount($restaurant,$cart,$product){
        $this->restaurant = $restaurant;
        $this->cart = $cart;
        $this->product = $product;
    }

    public function addToCart($productId){
        
        $restaurantId = DB::table('products')->where('id',$productId)->value('restaurant_id');
        
        if(Cart::where('product_id',$productId)->exists()){
            dd('temporary error message');
        }else{
        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $productId,
            'restaurant_id' => $restaurantId,
            'quantity' => $this->quantityCount,
            
        ]);
        }
    }

    public function decrementQuantity(int $cartId){
        $data = Cart::where('id',$cartId);
        if($data){
            
            $data->decrement('quantity');  
            
        }
        else{
            return back()->with('message','Failed to perform action!');
        }
        
    }

    public function incrementQuantity(int $cartId){
        $data = Cart::where('id',$cartId);
        if($data){
            $data->increment('quantity');
        }
        else{
            return back()->with('message','Failed to perform action!');
        }
    }

    public function destroyQuantity(int $cartId){
        Cart::where('id',$cartId)->delete();
    }
    
    public function submitCart(){
        $pending = 'pending';
        
        foreach($this->cart as $cartItem){
            $this->totalPrice += $cartItem->product->price * $cartItem->quantity;    
            $temp = $cartItem->restaurant_id;
        }
        $order = Order::create([
            
            'status' => $pending,
            'total' => $this->totalPrice,
            'restaurant_id' => $temp
            
        ]);
        foreach($this->cart as $cartItem){
            $orederItems = OrderList::create([
                'order_id'=> $order->id,
                'product_id' => $cartItem->product_id,
                'restaurant_id' => $cartItem->restaurant_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price * $cartItem->quantity
            ]);   
        }
        Cart::where('user_id',auth()->user()->id)->delete();
        $this->totalPrice = 0;
    }

    public function cancelCart(){
         Cart::where('user_id',auth()->user()->id)->delete();
    }
}
