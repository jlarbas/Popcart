<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'product_id',
        'quantity',
        'user_id',
        'restaurant_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}