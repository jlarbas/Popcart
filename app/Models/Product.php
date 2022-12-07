<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeFilter($query,array $filters){
        if($filters['search'] ?? false){
            $query->where('name', 'like', '%' . request('search') . '%');
        }
    }

    protected $fillable = [
        'name',
        'price',
        'picture',
        'restaurant_id'
    ];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    


}
