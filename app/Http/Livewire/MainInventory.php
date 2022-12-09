<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inventory;
use App\Models\Restaurant;
use App\Models\InventoryList;
use App\Models\InventoryTicket;

class MainInventory extends Component
{
    public $restaurantData;
    public $item_name, $quantity, $price, $measurement, $item_code, $quantity_used,$date_consumed,$description;
    public function render()
    {
        $restaurant = Restaurant::all();
        $this->list = InventoryTicket::latest()->where('user_id',auth()->user()->id)->get();
        return view('livewire.main-inventory',[
            'list' => $this->list,
            'restaurant' => $restaurant,
            ]);
    }

    public function submitTicket()
    {
        
        $newInventory = Inventory::create([
            'user_id' => auth()->user()->id,
            'restaurant_id' => $this->restaurantData
        ]);
        $newlist = InventoryTicket::latest()->where('user_id',auth()->user()->id)->get();
        foreach($newlist as $newdata){
            InventoryList::create([
            'user_id'=> auth()->user()->id,
            'inventory_id'=>  $newInventory->id,
            'item_name' => $newdata->item_name,
            'quantity' => $newdata->quantity,
            'price'=> $newdata->price,
            'measurement'=> $newdata->measurement,
            'item_code'=> $newdata->item_code,
            'quantity_used'=> $newdata->quantity_used,
            'date_consumed' => $newdata->date_consumed,
            'description' => $newdata->description,
            
            ]);
            InventoryTicket::where('user_id',auth()->user()->id)->delete();
        }
        
        
    }
}
