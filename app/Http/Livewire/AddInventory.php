<?php

namespace App\Http\Livewire;

use App\Models\Restaurant;
use App\Models\InventoryTicket;
use LivewireUI\Modal\ModalComponent;

class AddInventory extends ModalComponent
{

    public $restaurant;
    
    public $restaurantData;
    public $item_name,$quantity,$price,$measurement,$item_code,$quantity_used,$date_consumed,$description,$restaurant_id;
    
    public function render()
    {   
       
        $restaurant = Restaurant::all();
        return view('livewire.add-inventory',[
            'restaurant' => $restaurant,
        ]);
    }

    public function mount(){
        $this->restaurant = Restaurant::all();
    }

    public function storeInventory(){

        
        $data = new InventoryTicket();
        $data->user_id = auth()->user()->id;
        $data->item_name = $this->item_name;
        $data->quantity = $this->quantity;
        $data->price = $this->price;
        $data->measurement = $this->measurement;
        $data->item_code = $this->item_code;
        $data->quantity_used = $this->quantity_used;
        $data->date_consumed = $this->date_consumed;
        $data->description = $this->description;
        // $data->restaurant_id = $this->restaurantData;
        $data->save();        

        $this->item_name = '';
        $this->quantity= '';
        $this->price= '';
        $this->measurement= '';
        $this->item_code= '';
        $this->quantity_used= '';
        $this->date_consumed= '';
        $this->description= '';
        $this->restaurant_id= '';
        $this->closeModal();

        return redirect()->route('createInventory')->with('message','Record added!');
    }

    
}