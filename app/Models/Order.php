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
       'restaurant_id',
       'user_id',
       'payment',
       'change',
       'vat',
    ];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function orderlist(){
        return $this->hasMany(OrderList::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
