<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryList;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Inventory $inventory, Restaurant $restaurant){
        return view ('inventory.index',compact('inventory','restaurant'));
    }
    public function show(Inventory $inventory, Restaurant $restaurant, InventoryList $inventorylist){
        return view ('inventory.show',compact('inventory','restaurant','inventorylist'));
    }
}
