<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'restaurant_id',
        'quantity',
        'price',
    ];

    public function restaurant(){
        $this->hasMany(Restaurant::class);
    }
    public function order(){
        $this->hasMany(Order::class);
    }

}
