<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
       'status',
       'total',
       'restaurant_id'
    ];

    public function restaurant(){
        $this->belongsTo(Restaurant::class);
    }

    public function orderlist(){
        $this->hasMany(OrderList::class);
    }
}
