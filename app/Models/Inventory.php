<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'restaurant_id',
    ];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
    public function inventorylist(){
        return $this->hasMany(InventoryList::class);
    }
}
