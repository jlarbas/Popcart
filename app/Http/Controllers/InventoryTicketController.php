<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\InventoryTicket;

class InventoryTicketController extends Controller
{

    public function createList(Restaurant $restaurant)
    {
        //
        $inventoryList = InventoryTicket::all();
        return view('inventory.create',compact('restaurant','inventoryList'));
    }
    
}
