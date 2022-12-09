<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'inventory_id',
        'item_name',
        'quantity',
        'price',
        'measurement',
        'item_code',
        'quantity_used',
        'date_consumed',
        'description',
        'picture',
        ];
        
        public function inventory(){
            return $this->belongsTo(Inventory::class);
        }
}
