<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_name',
        'restaurant_id',
        'quantity',
        'price',
    ];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function product(){
        return $this->hasMany(Product::class);
    }

}
